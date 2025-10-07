<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Auctions;
use App\Models\AutoBasic;
use App\Models\AutoAdvance;
use App\Models\AutoPrice;
use App\Models\AutoLegal;
use App\Models\AuctionPlatform;
use App\Models\AuctionCenter;
use App\Models\Notification;
use App\Models\Interest; 
use App\Models\VehicleType;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\ModelVariant;
use App\Models\Year;
use App\Models\BodyType;
use App\Models\Color;
use App\Models\Vehicle;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class ReauctionController extends Controller
{





public function index(Request $request)
{
    if ($request->ajax()) {

        DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $today = now()->toDateString();
        $auctionFilter = $request->auction_filter ?? 'Today';

        // ✅ Select auction IDs based on filter
        $auctionIds = DB::table('auctions')
            ->when($auctionFilter === 'Upcoming', function ($q) use ($today) {
                $q->whereDate('auction_date', '>', $today);
            }, function ($q) use ($today) {
                $q->whereDate('auction_date', '=', $today);
            })
            ->pluck('id');

        // ✅ Base vehicle query
        $query = DB::table('vehicles')
            ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
            ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
            ->whereIn('vehicles.auction_id', $auctionIds)
            
            // ✅ If Today → include only vehicles that have previous record before today
            // ✅ If Upcoming → include only vehicles that have any record before the upcoming date
            ->whereExists(function ($subQuery) use ($today, $auctionFilter) {
                $subQuery->select(DB::raw(1))
                    ->from('vehicles as v2')
                    ->join('auctions as a2', 'a2.id', '=', 'v2.auction_id')
                    ->whereColumn('v2.reg', 'vehicles.reg')
                    ->when($auctionFilter === 'Upcoming', function ($q) use ($today) {
                        $q->whereDate('a2.auction_date', '<=', $today);
                    }, function ($q) use ($today) {
                        $q->whereDate('a2.auction_date', '<', $today);
                    });
            })
            
            // ✅ Always pick latest entry per reg (based on filter)
            ->whereIn('vehicles.id', function ($sub) use ($today, $auctionFilter) {
                $sub->select(DB::raw('MAX(v3.id)'))
                    ->from('vehicles as v3')
                    ->join('auctions as a3', 'a3.id', '=', 'v3.auction_id')
                    ->when($auctionFilter === 'Upcoming', function ($q) use ($today) {
                        $q->whereDate('a3.auction_date', '>', $today);
                    }, function ($q) use ($today) {
                        $q->whereDate('a3.auction_date', '=', $today);
                    })
                    ->groupBy('v3.reg');
            })
            ->select(
                'vehicles.*',
                'auctions.auction_date',
                'auction_platform.name as platform_name',
                'auction_center.name as center_name',
                'make.name as make_name',
                'model.name as model_name',
                'model_variant.name as model_variant_name'
            );

        // 🔍 Filter by interest
        if ($request->filled('interest_id')) {
            $interest = Interest::find($request->interest_id);
            if ($interest) {
                $query->when($interest->make_id, fn($q) => $q->where('vehicles.make_id', $interest->make_id))
                      ->when($interest->model_id, fn($q) => $q->where('vehicles.model_id', $interest->model_id))
                      ->when($interest->variant_id, fn($q) => $q->where('vehicles.variant_id', $interest->variant_id));
            }
        }

        // 🔍 Search
        if ($request->filled('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('vehicles.reg', 'LIKE', "%{$search}%")
                    ->orWhere('make.name', 'LIKE', "%{$search}%")
                    ->orWhere('model.name', 'LIKE', "%{$search}%")
                    ->orWhere('model_variant.name', 'LIKE', "%{$search}%")
                    ->orWhere('auction_center.name', 'LIKE', "%{$search}%")
                    ->orWhere('auction_platform.name', 'LIKE', "%{$search}%");
            });
        }

        // ✅ Filter in-progress
        if ($request->inprogress_check == 1) {
            $query->where('vehicles.bidding_status', 'inprogress');
        }

        $totalRecords = (clone $query)->count();
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $vehicles = $query->skip($start)->take($length)->get();

        // Platforms & Centers (same)
        $platforms = DB::table('auctions')
            ->join('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->whereIn('auctions.id', $auctionIds)
            ->distinct()
            ->pluck('auction_platform.name')
            ->filter()
            ->values();

        $centers = DB::table('vehicles')
            ->join('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
            ->whereIn('vehicles.auction_id', $auctionIds)
            ->distinct()
            ->pluck('auction_center.name')
            ->filter()
            ->values();

        // 🔁 Format Data
        $data = $vehicles->map(function ($vehicle) use ($today) {
            $bids = DB::table('vehicles')
                ->join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
                ->where('vehicles.reg', $vehicle->reg)
                ->orderBy('auctions.auction_date', 'asc')
                ->pluck('vehicles.last_bid')
                ->toArray();

            $diff = (end($bids) ?? 0) - ($bids[0] ?? 0);
            $diffText = $diff > 0
                ? "<span style='color:green;'>+{$diff}</span>"
                : "<span style='color:red;'>{$diff}</span>";

            $vehicleName = '
                <div style="max-width:220px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                    <p class="mb-1 text-truncate" title="' . strtoupper($vehicle->make_name) . ' - ' . $vehicle->model_name . '">
                        ' . strtoupper($vehicle->make_name) . ' - ' . $vehicle->model_name . '
                    </p>
                </div>
                <p class="text-muted mb-0 small text-truncate" title="' . $vehicle->model_variant_name . '">
                    ' . $vehicle->model_variant_name . '
                </p>';

            $actions = '
                <a href="' . url("/auction-finder/vehicle/{$vehicle->id}") . '" class="btn btn-sm btn-primary me-1">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-sm btn-danger add-notification" data-auction-id="' . $vehicle->id . '">
                    <i class="fas fa-bell"></i>
                </a>';

            $previousCount = DB::table('vehicles')
                ->join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
                ->where('vehicles.reg', $vehicle->reg)
                ->whereDate('auctions.auction_date', '<', $today)
                ->count();

            $PreviousBtn = '
                <div class="PreviousBtnRec d-flex justify-content-center">
                    <button type="button" class="btn btn-sm btn-primary PreviousBtnRec" data-ref="' . $vehicle->reg . '">
                        ' . $previousCount . ' ↑
                    </button>
                </div>';

            return [
                $vehicleName,
                $vehicle->reg ?? 'N/A',
                $PreviousBtn,
                $vehicle->platform_name ?? 'N/A',
                $vehicle->center_name ?? 'N/A',
                $vehicle->last_bid ?? 'N/A',
                $vehicle->bidding_status ?? 'N/A',
                $diffText,
                \Carbon\Carbon::parse($vehicle->auction_date)->format('Y-m-d H:i'),
                $actions
            ];
        });

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
            'platforms' => $platforms,
            'centers' => $centers
        ]);
    }

    $userId = Auth::id();
    $interests = Interest::where('user_id', $userId)->get();
    $vehicleCountToday = Vehicle::whereDate('created_at', now()->toDateString())->count();

    return view('user.reauction.index', compact('interests', 'vehicleCountToday'));
}








public function information(Request $request)
{
    $reg = str_replace('+', ' ', $request->input('reg'));
    $upcoming = $request->input('upcoming'); // 1 = upcoming checked
    $today = now()->toDateString();

    $vehicles = Vehicle::query()
        ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
        ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
        ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
        ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
        ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
        ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
        ->where('vehicles.reg', 'LIKE', "%{$reg}%")
        ->when($upcoming == 1, function ($q) use ($today) {
            // ✅ Show today's and future auctions
            $q->whereDate('auctions.auction_date', '>=', $today);
        }, function ($q) use ($today) {
            // ✅ Show only previous auctions
            $q->whereDate('auctions.auction_date', '<', $today);
        })
        ->select(
            'vehicles.*',
            'make.name as make_name',
            'model.name as model_name',
            'model_variant.name as model_variant_name',
            'auction_platform.name as platform_name',
            'auction_center.name as center_name',
            'auctions.auction_date'
        )
        ->orderBy('auctions.auction_date', 'desc')
        ->get();

    if ($vehicles->isEmpty()) {
        return response()->json([]);
    }

    $response = [];
    foreach ($vehicles as $vehicle) {
        $response[] = [
            'name'       => strtoupper($vehicle->make_name) . ' - ' . $vehicle->model_name,
            'variant'    => $vehicle->model_variant_name,
            'reg'        => $vehicle->reg,
            'platform'   => $vehicle->platform_name,
            'center'     => $vehicle->center_name,
            'last_bid'   => $vehicle->last_bid,
            'status'     => $vehicle->bidding_status,
            'difference' => 'Waiting',
            'time'       => \Carbon\Carbon::parse($vehicle->auction_date)->format('Y-m-d H:i'),
        ];
    }

    return response()->json($response);
}

public function interest(Request $request)
{
    
    DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

    $userId = Auth::id();
    $today = now()->toDateString();


    $interestId = $request->input('secondary');


    $interests = DB::table('interest')
        ->where('user_id', $userId)
        ->get();

    $results = [];

 
    $todayVehicles = DB::table('vehicles')
        ->join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
        ->whereDate('auctions.auction_date', $today)
        ->select(
            'vehicles.reg',
            'vehicles.make_id',
            'vehicles.model_id',
            'vehicles.variant_id',
            'vehicles.year',
            'vehicles.mileage',
            'vehicles.fuel_type',
            'vehicles.cc',
            'vehicles.buy_now_price',
            'vehicles.transmission',
            'vehicles.grade',
            'vehicles.former_keepers'
        )
        ->groupBy(
            'vehicles.reg',
            'vehicles.make_id',
            'vehicles.model_id',
            'vehicles.variant_id',
            'vehicles.year',
            'vehicles.mileage',
            'vehicles.fuel_type',
            'vehicles.cc',
            'vehicles.buy_now_price',
            'vehicles.transmission',
            'vehicles.grade',
            'vehicles.former_keepers'
        )
        ->get();

    // Get all previous auctions' reg numbers
    $previousRegs = DB::table('vehicles')
        ->join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
        ->whereDate('auctions.auction_date', '<', $today)
        ->pluck('vehicles.reg')
        ->unique();

    // Get today's reauctioned cars
    $reauctionedToday = $todayVehicles->whereIn('reg', $previousRegs);

    // Loop through each interest and find matched cars
    foreach ($interests as $interest) {
        $matched = collect($reauctionedToday)->filter(function ($vehicle) use ($interest, $interestId) {

            // 🔹 Primary filters (always applied)
            if (!empty($interest->make_id) && $vehicle->make_id != $interest->make_id) return false;
            if (!empty($interest->model_id) && $vehicle->model_id != $interest->model_id) return false;
            if (!empty($interest->variant_id) && $vehicle->variant_id != $interest->variant_id) return false;

            if (!empty($interest->year_from) && !empty($interest->year_to)) {
                $year = (int)$vehicle->year;
                if ($year < (int)$interest->year_from || $year > (int)$interest->year_to) return false;
            }

            if (!empty($interest->mileage_from) && !empty($interest->mileage_to)) {
                $mileage = (int)$vehicle->mileage;
                if ($mileage < (int)$interest->mileage_from || $mileage > (int)$interest->mileage_to) return false;
            }

            // 🔹 Secondary filters (only for selected interest)
            if ($interestId == $interest->id) {
                
                if (!empty($interest->fuel_type) && $vehicle->fuel_type != $interest->fuel_type) return false;
                if (!empty($interest->transmission) && $vehicle->transmission != $interest->transmission) return false;
                if (!empty($interest->grade) && $vehicle->grade != $interest->grade) return false;
                if (!empty($interest->former_keeper) && $vehicle->former_keepers != $interest->former_keeper) return false;

                if (!empty($interest->cc_from) && !empty($interest->cc_to)) {
                    $cc = (float)$vehicle->cc;
                    if ($cc < (float)$interest->cc_from || $cc > (float)$interest->cc_to) return false;
                }

                if (!empty($interest->price_from) && !empty($interest->price_to)) {
                    $price = (int)$vehicle->buy_now_price;
                    if ($price < (int)$interest->price_from || $price > (int)$interest->price_to) return false;
                }
            }

            return true;
        });

        $results[] = [
            'interest_id' => $interest->id,
            'title' => $interest->title,
            'matched_reauction_cars' => $matched->count(),
        ];
    }

    return response()->json($results);
}



public function notification(Request $request)
{
    $exists = Notification::where('user_id', Auth::id())
        ->where('vehicle_id', $request->auction_id)
        ->exists();

    if ($exists) {
        return response()->json([
            'status' => 'exists',
            'message' => 'You have already created a notification.'
        ]);
    }

    Notification::create([
        'user_id'    => Auth::id(),
        'vehicle_id' => $request->auction_id,
        'is_read'    => 0
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Notification created.'
    ]);
}



}

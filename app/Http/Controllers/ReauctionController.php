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
        $auctionFilter = $request->auction_filter ?? 'Today'; // 'Today' or 'Upcoming'

        // 🔹 Base auctions filter
        $auctionQuery = DB::table('auctions');
        if ($auctionFilter === 'Upcoming') {
            $auctionQuery->whereDate('auction_date', '>=', $today);
        } else {
            $auctionQuery->whereDate('auction_date', '=', $today);
        }
        $auctionIds = $auctionQuery->pluck('id');

        // 🔹 Base vehicle query
        $query = DB::table('vehicles')
            ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
            ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
            ->whereIn('vehicles.auction_id', $auctionIds)
            ->select(
                'vehicles.*',
                'auctions.auction_date',
                'auction_platform.name as platform_name',
                'auction_center.name as center_name',
                'make.name as make_name',
                'model.name as model_name',
                'model_variant.name as model_variant_name'
            );

        // 🔹 Apply Interest Filter
        if (!empty($request->interest_id)) {
            $interest = Interest::find($request->interest_id);
            if ($interest) {
                if (!empty($interest->make_id)) {
                    $query->where('vehicles.make_id', $interest->make_id);
                }
                if (!empty($interest->model_id)) {
                    $query->where('vehicles.model_id', $interest->model_id);
                }
                if (!empty($interest->variant_id)) {
                    $query->where('vehicles.variant_id', $interest->variant_id);
                }
            }
        }

        // 🔹 Search by Registration Number or other fields
        $search = $request->input('search.value');
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('vehicles.reg', 'LIKE', "%{$search}%")
                    ->orWhere('make.name', 'LIKE', "%{$search}%")
                    ->orWhere('model.name', 'LIKE', "%{$search}%")
                    ->orWhere('model_variant.name', 'LIKE', "%{$search}%")
                    ->orWhere('auction_center.name', 'LIKE', "%{$search}%")
                    ->orWhere('auction_platform.name', 'LIKE', "%{$search}%");
            });
        }

        // 🔹 Apply In-progress Filter
        if ($request->inprogress_check == 1) {
            $query->where('vehicles.bidding_status', 'inprogress');
        }

        // 🔹 Only include vehicles that have appeared before (previous auctions)
        $query->whereExists(function ($subQuery) use ($today) {
            $subQuery->select(DB::raw(1))
                ->from('vehicles as v2')
                ->join('auctions as a2', 'a2.id', '=', 'v2.auction_id')
                ->whereColumn('v2.reg', 'vehicles.reg')
                ->whereDate('a2.auction_date', '<', $today);
        });

        // 🔹 DataTables server-side parameters
        $start = $request->input('start') ?? 0;
        $length = $request->input('length') ?? 10;

        // 🔹 Total records count before pagination
        $totalRecords = (clone $query)->count();

        // 🔹 Fetch paginated data
        $vehicles = $query
            ->skip($start)
            ->take($length)
            ->get();

        // 🔹 Prepare Data for DataTables
        $data = $vehicles->map(function ($vehicle) use ($today) {

            // Calculate bid difference
            $bids = DB::table('vehicles')
                ->join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
                ->where('vehicles.reg', $vehicle->reg)
                ->orderBy('auctions.auction_date', 'asc')
                ->pluck('vehicles.last_bid')
                ->toArray();

            $firstBid = $bids[0] ?? 0;
            $lastBid = end($bids) ?? 0;
            $diff = $lastBid - $firstBid;

            $diffText = $diff > 0
                ? "<span style='color:green;'>+{$diff}</span>"
                : "<span style='color:red;'>{$diff}</span>";

            // Vehicle Name
            $vehicleName = '
                <div style="max-width:220px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"
                    title="' . strtoupper($vehicle->make_name) . ' - ' . $vehicle->model_name . '">
                    <p class="mb-1 text-truncate">' . strtoupper($vehicle->make_name) . ' - ' . $vehicle->model_name . '</p>
                </div>
                <p class="text-muted mb-0 small text-truncate"
                    style="max-width:220px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"
                    title="' . $vehicle->model_variant_name . '">
                    ' . $vehicle->model_variant_name . '
                </p>';

            // Platform
            $platform = '<p class="text-primary">' . ($vehicle->platform_name ?? 'N/A') . '</p>';

            // Action buttons
            $actions = '
                <a href="' . url("/auction-finder/vehicle/{$vehicle->id}") . '" 
                   class="btn btn-sm btn-primary me-1">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-sm btn-danger add-notification"
                   data-auction-id="' . $vehicle->id . '"
                   style="background-color:#570303; border-color:#8000;">
                    <i class="fas fa-bell"></i>
                </a>';

            // Previous record count
            $previousCount = DB::table('vehicles')
                ->join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
                ->where('vehicles.reg', $vehicle->reg)
                ->whereDate('auctions.auction_date', '<', $today)
                ->count();

            $PreviousBtn = '
                <div class="PreviousBtnRec d-flex justify-content-center">
                    <button type="button"
                        class="btn btn-sm btn-primary PreviousBtnRec"
                        data-ref="' . $vehicle->reg . '">
                        ' . $previousCount . ' ↑
                    </button>
                </div>';

            return [
                $vehicleName ?? 'N/A',
                $vehicle->reg ?? 'N/A',
                $PreviousBtn,
                $platform ?? 'N/A',
                $vehicle->center_name ?? 'N/A',
                $vehicle->last_bid ?? 'N/A',
                $vehicle->bidding_status ?? 'N/A',
                $diffText,
                \Carbon\Carbon::parse($vehicle->created_at)->format('Y-m-d H:i'),
                $actions
            ];
        });

        // 🔹 Return DataTables Response
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data
        ]);
    }

    // -------- Non-AJAX section (view) ----------
    $userId = Auth::id();
    $interests = Interest::where('user_id', $userId)->get();

    $auctionPlatform = DB::table('auction_platform')
        ->leftJoin('auctions', 'auctions.platform_id', '=', 'auction_platform.id')
        ->leftJoin('vehicles', 'vehicles.auction_id', '=', 'auctions.id')
        ->select('auction_platform.id', 'auction_platform.name')
        ->groupBy('auction_platform.id', 'auction_platform.name')
        ->pluck('auction_platform.name', 'auction_platform.id');

    $auctionCenter = DB::table('auction_center')
        ->leftJoin('vehicles', 'vehicles.center_id', '=', 'auction_center.id')
        ->select('auction_center.id', 'auction_center.name')
        ->groupBy('auction_center.id', 'auction_center.name')
        ->pluck('auction_center.name', 'auction_center.id');

    $today = Carbon::today();
    $vehicleCountToday = Vehicle::whereDate('created_at', $today)->count();

    return view('user.reauction.index', compact('auctionPlatform', 'auctionCenter', 'interests', 'vehicleCountToday'));
}







public function information(Request $request)
{
    $reg = str_replace('+', ' ', $request->input('reg'));

    $vehicles = Vehicle::query()
        ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
        ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
        ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
        ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
        ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
        ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
        ->where('vehicles.reg', 'LIKE', "%{$reg}%")
        ->select(
            'vehicles.*',
            'make.name as make_name',
            'model.name as model_name',
            'model_variant.name as model_variant_name',
            'auction_platform.name as platform_name',
            'auction_center.name as center_name'
        )
        ->get();

    if ($vehicles->isEmpty()) {
        return response()->json(['error' => 'Vehicle not found'], 404);
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
            'time' => \Carbon\Carbon::parse($vehicle->created_at)->format('Y-m-d H:i'),
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

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

        $search = $request->input('search.value');
        $start = $request->input('start') ?? 0;
        $length = $request->input('length') ?? 10;

        DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");



        $query = Vehicle::query()
            ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
            ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
            ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
   
            ;

        if (!empty($search)) {
      
            $query->where(function ($q) use ($search) {
                $q->where('vehicles.title', 'like', "%{$search}%")
                    ->orWhere('vehicles.reg', 'like', "%{$search}%")
                    ->orWhere('vehicles.last_bid', 'like', "%{$search}%")
                    ->orWhere('vehicles.bidding_status', 'like', "%{$search}%")
                    ->orWhere('vehicles.created_at', 'like', "%{$search}%")
                    ->orWhere('make.name', 'like', "%{$search}%")
                    ->orWhere('model.name', 'like', "%{$search}%")
                    ->orWhere('model_variant.name', 'like', "%{$search}%")
                    ->orWhere('auction_platform.name', 'like', "%{$search}%")
                    ->orWhere('auction_center.name', 'like', "%{$search}%");
            });
        }
        if(!empty($request->inprogress_check) && $request->inprogress_check == 1){
            $query->where('auctions.status', 'In Progress');
        }

        if (!empty($request->interest_id)) 
        {
            $intrest_id = $request->interest_id;
            $intrest = Interest::where('id', $intrest_id)->first();
            // dd($intrest);
                    if($intrest){
                        $query->where('vehicles.make_id',$intrest->make_id);
                        $query->where('vehicles.model_id',$intrest->model_id);
                        $query->where('vehicles.variant_id',$intrest->variant_id);
                    }
        }

        $totalData = clone $query;

        $data = $query->select(
                'vehicles.*',
                'auction_platform.name AS platform_name',
                'auction_center.name AS center_name',
                'make.name AS make_name',
                'model.name AS model_name',
                'model_variant.name AS model_variant_name',
                'auctions.auction_date',
                DB::raw('(
                    SELECT COUNT(DISTINCT v2.auction_id)
                    FROM vehicles v2
                    WHERE v2.reg = vehicles.reg
                    ) AS auction_count')
                )
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($vehicle) {
                $vehicleName = '
                    <div>
                        <p class="mb-1">'.strtoupper($vehicle->make_name) . " - " . $vehicle->model_name.'</p>
                        <p class="text-muted mb-0 small">'.$vehicle->model_variant_name.'</p>
                    </div>';

                $platefrom = '<p class="text-primary">'.$vehicle->platform_name.'</p>';
                $deff = '<p class="text-danger" style="color:#570303;">Waiting</p>';

           $actions = '
                <a href="' . url("/auction-finder/vehicle/{$vehicle->id}") . '" class="btn btn-sm btn-primary me-1">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-sm btn-danger" style="background-color:#570303 ; border-color: #8000;">
                 <i class="fas fa-bell"></i>

                </a>';


                $PreviousBtn = '
                    <div class="PreviousBtnRec d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-primary PreviousBtnRec" data-ref="' . $vehicle->reg . '">
                            ' . $vehicle->auction_count . ' ↑
                        </button>
                    </div>
                ';



                return [
                    $vehicleName ?? 'N/A',
                    $vehicle->reg ?? 'N/A',
                    $PreviousBtn,
                    $platefrom ?? 'N/A',
                    $vehicle->center_name ?? 'N/A',
                    $vehicle->last_bid ?? 'N/A',
                    $vehicle->bidding_status ?? 'N/A',
                    $deff,
                   \Carbon\Carbon::parse($vehicle->created_at)->format('Y-m-d H:i'),
                    $actions
                ];
            });

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData->count(),
            "recordsFiltered" => $totalData->count(),
            "data" => $data
        ]);
    }
    $userId = Auth::id();
    $interests = Interest::where('user_id', $userId)->get();
    $auctionPlatform = AuctionPlatform::pluck('name');
    $auctionCenter = AuctionCenter::pluck('name');
    $today = Carbon::today();
    $vehicleCountToday = Vehicle::whereDate('created_at', $today)->count();
    return view('user.reauction.index', compact('auctionPlatform', 'auctionCenter', 'interests','vehicleCountToday'));
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

    $userInterest = DB::table('interest')
        ->leftJoin('vehicles', function ($join) {
            $join->on('vehicles.make_id', '=', 'interest.make_id')
                ->on('vehicles.model_id', '=', 'interest.model_id')
                ->on('vehicles.variant_id', '=', 'interest.variant_id');
        })
        ->select(
            'interest.*',
            DB::raw("
                COUNT(CASE 
                    WHEN 
                        CAST(vehicles.mileage AS UNSIGNED) BETWEEN 
                            COALESCE(interest.mileage_from, 0) AND 
                            COALESCE(interest.mileage_to, 999999)
                    AND CAST(vehicles.year AS UNSIGNED) BETWEEN 
                            COALESCE(interest.year_from, 1940) AND 
                            COALESCE(interest.year_to, YEAR(CURDATE()))
                    THEN 1 
                END) AS primary_count
            "),
            DB::raw("
                    COUNT(CASE 
                        WHEN 
                            (interest.fuel_type IS NULL OR interest.fuel_type = vehicles.fuel_type)
                        AND (interest.transmission IS NULL OR interest.transmission = vehicles.transmission)
                        AND (interest.grade IS NULL OR interest.grade = vehicles.grade)
                        AND (interest.former_keeper IS NULL OR interest.former_keeper = vehicles.former_keepers)
                        AND CAST(vehicles.cc AS UNSIGNED) BETWEEN 
                            COALESCE(interest.cc_from, 0.9) AND 
                            COALESCE(interest.cc_to, 5.5)
                        AND CAST(vehicles.buy_now_price AS UNSIGNED) BETWEEN 
                            COALESCE(interest.price_from, 0) AND 
                            COALESCE(interest.price_to, 9999999)
                        THEN 1 
                    END) AS secondary_count
                    ")
        )
        ->where('interest.user_id', $userId)
        ->groupBy('interest.id')
        ->get();

    return response()->json($userInterest);
}




}

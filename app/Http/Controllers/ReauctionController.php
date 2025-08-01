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
            ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auction_center.auction_platform_id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
   
            ;

        // if (!empty($search)) {
        //     $query->where(function ($q) use ($search) {
        //         $q->where('vehicles.title', 'like', "%{$search}%")
        //             ->orWhere('make.name', 'like', "%{$search}%")
        //             ->orWhere('model.name', 'like', "%{$search}%")
        //             ->orWhere('model_variant.name', 'like', "%{$search}%")
        //             ->orWhere('vehicles.year', 'like', "%{$search}%")
        //             ->orWhere('auction_platform.name', 'like', "%{$search}%");
        //     });
        // }

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
                <a href="' . url("/vehicles/{$vehicle->id}") . '" class="btn btn-sm btn-primary me-1">
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
                    \Carbon\Carbon::parse($vehicle->auction_date)->format('H:i'),
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
    $auctionPlatform = AuctionPlatform::pluck('name');
    $auctionCenter = AuctionCenter::pluck('name');
    return view('user.reauction.index',compact('auctionPlatform','auctionCenter'));
}


public function information(Request $request)
{
    $reg = str_replace('+', ' ', $request->input('reg'));

    $vehicles = Vehicle::query()
        ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
        ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
        ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auction_center.auction_platform_id')
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
            'time'       => \Carbon\Carbon::parse($vehicle->auction_date)->format('H:i'),
        ];
    }

    return response()->json($response);
}





}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\Make;
use App\Models\Model;
use App\Models\ModelVariant;
use App\Models\BodyType;
use App\Models\Year;
use App\Models\Auctions;
use App\Models\AuctionPlatform;
use App\Models\AuctionCenter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
public function index(Request $request)
{
    if ($request->ajax()) {
        $search = $request->input('search.value');
        $start = $request->input('start') ?? 0;
        $length = $request->input('length') ?? 10;

        // Subquery: latest "On Sale" vehicle per auction
        $sub = Vehicle::select(DB::raw('MAX(id) as id'))
            ->where('bidding_status', 'On Sale')
            ->groupBy('auction_id');

        $query = Vehicle::joinSub($sub, 'latest_vehicles', function($join) {
                $join->on('vehicles.id', '=', 'latest_vehicles.id');
            })
            ->leftJoin('vehicle_type', 'vehicle_type.id', '=', 'vehicles.vehicle_id')
            ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
            ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
            ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->leftJoin('body_types', 'body_types.id', '=', 'vehicles.body_id')
            ->leftJoin('color', 'color.id', '=', 'vehicles.color_id');

        // Filters
        $filters = ['transmission','vehicle','fuel','grade','center_id','make_id','model_id','variant_id'];
        foreach($filters as $f) {
            if ($request->filled($f)) {
                $query->where("vehicles.$f", $request->$f);
            }
        }

        if ($request->filled('platform_id')) {
            $query->whereIn('auctions.platform_id', $request->platform_id);
        }

        $mileageFrom = $request->input('mileage_from');
        $mileageTo   = $request->input('mileage_to');
        if (!is_null($mileageFrom) && !is_null($mileageTo) && ($mileageTo - $mileageFrom) >= 1) {
            $query->whereBetween('vehicles.mileage', [$mileageFrom, $mileageTo]);
        }

        $totalData = $query->count();

        $vehicles = $query->select(
                'vehicles.*',
                'auctions.name AS auction_name',
                'auctions.auction_type AS auction_type',
                'auctions.auction_date AS auction_date',
                'vehicle_type.name AS vehicle_name',
                'auction_center.name AS center_name',
                'auction_platform.name AS platform_name',
                'make.name AS make_name',
                'model.name AS model_name',
                'model_variant.name AS model_variant_name',
                'body_types.name AS body_type_name',
                'vehicles.year AS year',
                'color.name AS color_name'
            )
            ->offset($start)
            ->limit($length)
            ->get();

        // Start bid fix
        $vehicles->transform(function ($vehicle) {
            $history = $vehicle->bidding_history;

            if (is_string($history)) {
                $history = str_replace(['[', ']', '"', "'"], '', $history);
                $history = explode(',', $history);
            }

            if (is_array($history) && count($history) > 0) {
                $firstBid = trim($history[0]); 
                $vehicle->start_bid = floatval(str_replace(['£', ','], '', $firstBid));
            } else {
                $vehicle->start_bid = null;
            }
            return $vehicle;
        });

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalData,
            "data" => $vehicles
        ]);
    }

    return view('user.compare.index');
}


public function getModelsAndVariants($make_id)
{
    $models = DB::table('model')
                ->where('make_id', $make_id)
                ->select('id', 'name')
                ->get();

    $variants = DB::table('model_variant')
                  ->whereIn('model_id', $models->pluck('id'))
                  ->select('id', 'name')
                  ->get();

    return response()->json([
        'models' => $models,
        'variants' => $variants
    ]);
}

}

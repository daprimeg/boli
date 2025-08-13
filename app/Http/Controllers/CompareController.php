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

        $query = Vehicle::leftJoin('vehicle_type', 'vehicle_type.id', '=', 'vehicles.vehicle_id')
            ->leftJoin('auctions', 'auctions.id', '=', 'vehicles.auction_id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
            ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
             ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->leftJoin('body_types', 'body_types.id', '=', 'vehicles.body_id')
            ->leftJoin('color', 'color.id', '=', 'vehicles.color_id');


        if ($request->filled('transmission')) {
            $query->where('vehicles.transmission', $request->transmission);
        }
        if ($request->filled('vehicle')) {
            $query->where('vehicles.title', $request->vehicle);
        }
        if ($request->filled('fuel')) {
            $query->where('vehicles.fuel_type', $request->fuel);
        }
        if ($request->filled('grade')) {
            $query->where('vehicles.grade', $request->grade);
        }
        if ($request->filled('center_id')) {
            $query->where('vehicles.center_id', $request->center_id);
        }
        if ($request->filled('auction_id')) {
            $query->where('auction_id', $request->auction_id);
        }
        if ($request->filled('make_id')) {
            $query->where('vehicles.make_id', $request->make_id);
        }
        if ($request->filled('model_id')) {
            $query->where('vehicles.model_id', $request->model_id);
        }
        if ($request->filled('variant_id')) {
            $query->where('vehicles.variant_id', $request->variant_id);
        }

        $totalData = clone $query;

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
$vehicles->transform(function ($vehicle) {
    $history = $vehicle->bidding_history;

    // If it's a string, split by comma
    if (is_string($history)) {
        // Remove brackets and quotes if exists, then split
        $history = str_replace(['[', ']', '"', "'"], '', $history);
        $history = explode(',', $history);
    }

    if (is_array($history) && count($history) > 0) {
        $firstBid = trim($history[0]); // get first value
        // Clean £ and commas and convert to float
        $cleanBid = floatval(str_replace(['£', ','], '', $firstBid));
        $vehicle->start_bid = $cleanBid;
    } else {
        $vehicle->start_bid = null;
    }
    return $vehicle;
});



        // Response JSON for your table
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData->count(),
            "recordsFiltered" => $totalData->count(),
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

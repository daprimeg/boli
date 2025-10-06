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
             $query = \DB::table('vehicles')
            ->join('auctions', 'vehicles.auction_id', '=', 'auctions.id')
            ->leftJoin('make', 'make.id', '=', 'vehicles.make_id')
            ->leftJoin('model', 'model.id', '=', 'vehicles.model_id')
            ->leftJoin('model_variant', 'model_variant.id', '=', 'vehicles.variant_id')
            ->leftJoin('body_types', 'body_types.id', '=', 'vehicles.body_id')
            ->leftJoin('color', 'color.id', '=', 'vehicles.color_id')
            ->leftJoin('auction_center', 'auction_center.id', '=', 'vehicles.center_id')
            ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
            ->select(
                'vehicles.id',
                'vehicles.title',
                'vehicles.make_id',
                'vehicles.model_id',
                'vehicles.variant_id',
                'vehicles.year',
                'vehicles.mileage',
                'vehicles.images',
                'vehicles.inspection_report',
                'vehicles.cc',
                'vehicles.v5',
                'vehicles.last_service',
                'vehicles.former_keepers',
                'vehicles.mot_expiry_date',
                'vehicles.start_date',
                'vehicles.end_date',
                'vehicles.buy_now_price as start_bid',
                'vehicles.last_bid',
                'vehicles.bidding_status',
                'vehicles.cap_clean',
                'vehicles.cap_average as cap_avg',
                'vehicles.cap_below as cap_blue',
                'vehicles.autotrader_trade_value as autoboli_suggested',
                'auctions.id as auction_id',
                'auctions.name as auction_name',
                'auctions.auction_type',
                'auctions.auction_date',
                'auctions.platform_id',
                'auctions.table_id',
                'auctions.status',
                'auction_center.name as center_name',
                'auction_platform.name as platform_name',
                'make.name as make_name',
                'model.name as model_name',
                'model_variant.name as variant_name',
                'body_types.name as body_type',
                'color.name as color_name'
            );

        // apply filters
        if ($request->filled('make_id')) {
            $query->where('vehicles.make_id', $request->make_id);
        }

        if ($request->filled('model_id')) {
            $query->where('vehicles.model_id', $request->model_id);
        }

        if ($request->filled('variant_id')) {
            $query->where('vehicles.variant_id', $request->variant_id);
        }

        if ($request->filled('year')) {
            $query->where('vehicles.year', $request->year);
        }

        if ($request->filled('mileage_from')) {
            $query->where('vehicles.mileage', '>=', $request->mileage_from);
        }

        if ($request->filled('mileage_to')) {
            $query->where('vehicles.mileage', '<=', $request->mileage_to);
        }

        if ($request->filled('transmission')) {
            $query->where('vehicles.transmission', $request->transmission);
        }

        if ($request->filled('fuel')) {
            $query->where('vehicles.fuel_type', $request->fuel);
        }

        if ($request->filled('grade')) {
            $query->where('vehicles.grade', $request->grade);
        }

            if ($request->filled('platform_id')) {
            $query->whereIn('auctions.platform_id', $request->platform_id);
        }
        $vehicles = $query
            ->orderBy('auctions.auction_date', 'desc')
            ->get()
            ->unique('auction_id')
            ->values();

        return response()->json(['data' => $vehicles]);
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

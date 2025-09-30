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
use App\Models\Notification;
use App\Models\Year;
use App\Models\BodyType;
use App\Models\Color;
use App\Models\Vehicle;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\RecentView;
use Illuminate\Support\Facades\Auth;

class UserAlertController extends Controller
{
public function index()
    {

       

        return view('user.alert.index');

    }

public function getVehicleFilters(Request $request)
{
    $makeId = $request->input('make_id');
    $modelId = $request->input('model_id');

    // Always return makes (sabhi makes)
    $makes = Make::whereIn('id', Vehicle::pluck('make_id'))->get();

    // Agar make select hua ho to models us make ke
    $models = collect();
    if ($makeId) {
        $models = VehicleModel::where('make_id', $makeId)
            ->whereIn('id', Vehicle::pluck('model_id'))
            ->get();
    }

    // Agar model select hua ho to variants us model ke
    $variants = collect();
    if ($modelId) {
        $variants = ModelVariant::where('model_id', $modelId)
            ->whereIn('id', Vehicle::pluck('variant_id'))
            ->get();
    }

    // Years and fuel types (global)
    $years = Vehicle::select('year')->distinct()->get();
    $fuel_types = Vehicle::select('fuel_type')->distinct()->get();

    return response()->json([
        'makes' => $makes,
        'models' => $models,
        'variants' => $variants,
        'years' => $years,
        'fuel_types' => $fuel_types,
    ]);
}

public function getAuctionData(Request $request)
{
    $userId = auth()->id();
    $filters = $request->input('filters', []);

    $length = $request->input('length', 50); // default 50
    $page   = $request->input('page', 1);
    $offset = ($page - 1) * $length;

    // Alerts
    $alertsQuery = Notification::with(['vehicle' => function ($q) use ($filters) {
        $q->select(
            'id', 'title as vehicle', 'year', 'cc', 'images as image',
            'mileage', 'transmission', 'auction_id', 'last_bid'
        )
        ->with(['auction:id,name,auction_date,auction_type,end_date']);

        if (!empty($filters['make'])) {
            $q->whereIn('make_id', $filters['make']);
        }
        if (!empty($filters['model'])) {
            $q->whereIn('model_id', $filters['model']);
        }
        if (!empty($filters['variant'])) {
            $q->whereIn('variant_id', $filters['variant']);
        }
        if (!empty($filters['year'])) {
            $q->whereIn('year', $filters['year']);
        }
        if (!empty($filters['fuel'])) {
            $q->whereIn('fuel_type', $filters['fuel']);
        }
    }])
    ->where('user_id', $userId);

    $alertsCount = $alertsQuery->count();
    $alerts = $alertsQuery->latest()->skip($offset)->take($length)->get();

    // Recent Views
    $recentQuery = RecentView::with(['vehicle' => function ($q) use ($filters) {
        $q->select(
            'id', 'title as vehicle', 'year', 'cc', 'images as image',
            'mileage', 'transmission', 'auction_id', 'last_bid'
        )
        ->with(['auction:id,name,auction_date,auction_type,end_date']);

        if (!empty($filters['make'])) {
            $q->whereIn('make_id', $filters['make']);
        }
        if (!empty($filters['model'])) {
            $q->whereIn('model_id', $filters['model']);
        }
        if (!empty($filters['variant'])) {
            $q->whereIn('variant_id', $filters['variant']);
        }
        if (!empty($filters['year'])) {
            $q->whereIn('year', $filters['year']);
        }
        if (!empty($filters['fuel'])) {
            $q->whereIn('fuel_type', $filters['fuel']);
        }
    }])
    ->where('user_id', $userId);

    $recentCount = $recentQuery->count();
    $recent = $recentQuery->latest()->skip($offset)->take($length)->get();

    return response()->json([
        'auctionData' => $alerts,
        'auctionTotal' => $alertsCount,
        'recentData' => $recent,
        'recentTotal' => $recentCount,
        'length' => $length,
        'page' => $page
    ]);
}





}

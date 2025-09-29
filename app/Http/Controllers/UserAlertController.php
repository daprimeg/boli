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
use App\Models\RecentView;
use Illuminate\Support\Facades\Auth;

class UserAlertController extends Controller
{
public function index()
    {

       

        return view('user.alert.index');

    }

    public function getVehicleFilters()
    {
        $makes = Make::whereIn('id', Vehicle::pluck('make_id'))->get();
        $models = VehicleModel::whereIn('id', Vehicle::pluck('model_id'))->get();
        $variants = ModelVariant::whereIn('id', Vehicle::pluck('variant_id'))->get();

        // Year
        $years = Vehicle::select('year')->distinct()->get();

        // Fuel Type
        $fuel_types = Vehicle::select('fuel_type')->distinct()->get();

        return response()->json([
            'makes' => $makes,
            'models' => $models,
            'variants' => $variants,
            'years' => $years,
            'fuel_types' => $fuel_types,
        ]);
    }

    

}

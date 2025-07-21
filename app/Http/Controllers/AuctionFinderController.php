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

class AuctionFinderController extends Controller
{

    public function index()
    {

        $platforms = AuctionPlatform::all();
        $vehicles = [];

        $vehicleTypes = VehicleType::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclemakes = Make::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclemodels = VehicleModel::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclevariants  = ModelVariant::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclebodys = BodyType::withCount(['vehicle as total'])->whereHas('vehicle')->get();

        $vehiclecolors = Color::withCount(['vehicle as total'])->whereHas('vehicle')->get();
        

        $transmissions = Vehicle::select('transmission', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('transmission')
            ->where('transmission', '!=', '')
            ->groupBy('transmission')
            ->orderByDesc('total')
            ->get();

        $fuel_types = Vehicle::select('fuel_type', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('fuel_type')
            ->where('fuel_type', '!=', '')
            ->groupBy('fuel_type')
            ->orderByDesc('total')
            ->get();

        $doors = Vehicle::select('doors', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('doors')
            ->where('doors', '!=', '')
            ->groupBy('doors')
            ->orderByDesc('total')
            ->get();

        $seats = Vehicle::select('seats', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('seats')
            ->where('seats' , '!=', '')
            ->groupBy('seats')
            ->orderByDesc('seats')
            ->get();

        $grades = Vehicle::select('grade', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('grade')
            ->where('grade' , '!=', '')
            ->groupBy('grade')
            ->orderByDesc('grade')
            ->get();

        $vehicleyears = Vehicle::select('year', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('year')
            ->where('year' , '!=', '')
            ->groupBy('year')
            ->orderByDesc('year')
            ->get();  

        $v5 = Vehicle::select('v5', \DB::raw('COUNT(*) as total'))
            ->where('v5', '=', 'present')
            ->groupBy('v5')
            ->orderByDesc('total')
            ->get();

        $cc = Vehicle::select('cc', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('cc')
            ->where('cc' , '!=', '')
            ->groupBy('cc')
            ->orderByDesc('cc')
            ->get();

        $vehicleyears = Vehicle::select('year', \DB::raw('COUNT(*) as total'))
        ->whereNotNull('year')
        ->where('year', '!=', '')
        ->groupBy('year')
        ->orderByDesc('year')
        ->get();

        $former_keepers = Vehicle::select('former_keepers', \DB::raw('COUNT(*) as total'))
            ->whereNotNull('former_keepers')
            ->where('former_keepers' , '!=', '')
            ->groupBy('former_keepers')
            ->orderByDesc('former_keepers')
            ->get();

        $number_of_services = Vehicle::select(
            \DB::raw("COALESCE(no_of_services, 'None') as no_of_services"),
            \DB::raw('COUNT(*) as total')
        )
        ->groupBy('no_of_services')
        ->orderByDesc('total')
        ->get();

        return view('user.auctionfinder.index', compact(
            'platforms', 'vehicleTypes', 'vehiclemakes', 'vehiclemodels', 'vehiclevariants',
            'vehicleyears', 'transmissions', 'fuel_types', 'vehiclebodys', 'vehiclecolors',
            'doors', 'seats', 'grades', 'v5', 'cc', 'former_keepers', 'number_of_services', 'vehicles'
        ));

    }
    

    public function data(Request $request)
    {

            $dateRange = $request->input('date_range');

            $perPage = (int) $request->input('length', 10);
            $page = (int) $request->input('page', 1);
            $offset = ($page - 1) * $perPage;

            //Base Query
            $query = Vehicle::join('auctions','auctions.id','=','vehicles.auction_id')
            ->join('make','make.id','=','vehicles.make_id')
            ->join('model','model.id','=','vehicles.model_id')
            ->join('model_variant','model_variant.id','=','vehicles.variant_id');

            
            if($request->has('plateform_id') && $request->plateform_id != ''){
                 $query->where('vehicles.auction_id',explode(',',$request->plateform_id));
            }

            if($request->has('vehicle_types') && $request->vehicle_types != ''){
                $query->whereIn('vehicles.vehicle_id',explode(',',$request->vehicle_types));
            }

            if($request->has('makes') && $request->makes != ''){
                $query->whereIn('vehicles.make_id',explode(',',$request->makes));
            }

            if($request->has('models') && $request->models != ''){
                $query->whereIn('vehicles.model_id',explode(',',$request->models));
            }

            if($request->has('variants') && $request->variants != ''){
                $query->whereIn('vehicles.variant_id',explode(',',$request->variants));
            }

            if($request->has('years') && $request->years != ''){
                $query->whereIn('vehicles.year',explode(',',$request->years));
            }

            if($request->has('transmission') && $request->transmission != ''){
                $query->whereIn('vehicles.transmission',explode(',',$request->transmission));
            }

            if($request->has('fuel_type') && $request->fuel_type != ''){
                $query->whereIn('vehicles.fuel_type',explode(',',$request->fuel_type));
            }

            if($request->has('body_types') && $request->body_types != ''){
                $query->whereIn('vehicles.body_id',explode(',',$request->body_types));
            }

            if($request->has('body_types') && $request->body_types != ''){
                $query->whereIn('vehicles.body_id',explode(',',$request->body_types));
            }

            if($request->has('colors') && $request->colors != ''){
                $query->whereIn('vehicles.color_id',explode(',',$request->colors));
            }

            if($request->has('doors') && $request->doors != ''){
                $query->whereIn('vehicles.doors',explode(',',$request->doors));
            }

            if($request->has('seats') && $request->seats != ''){
                $query->whereIn('vehicles.seats',explode(',',$request->seats));
            }

            if($request->has('grades') && $request->grades != ''){
                $query->whereIn('vehicles.grades',explode(',',$request->grades));
            }

            if($request->has('v5') && $request->v5 != ''){
                $query->whereIn('vehicles.v5',explode(',',$request->v5));
            }

            if($request->has('cc') && $request->cc != ''){
                $query->whereIn('vehicles.cc',explode(',',$request->cc));
            }

            if($request->has('former_keepers') && $request->former_keepers != ''){
                $query->whereIn('vehicles.former_keepers',explode(',',$request->former_keepers));
            }

            if($request->has('number_of_services') && $request->number_of_services != ''){
                $query->whereIn('vehicles.no_of_services',explode(',',$request->number_of_services));
            }

            if($request->has('mileage') && $request->mileage != ''){

                $range = explode('-', $request->mileage);
                $from = isset($range[0]) && is_numeric($range[0]) ? (int) $range[0] : 0;
                $to = isset($range[1]) && is_numeric($range[1]) ? (int) $range[1] : 9999999;
                $query->whereBetween('vehicles.mileage', [$from, $to]);
            }

        
            if ($request->has('date_range') && $request->date_range != '') {

                $now = \Carbon\Carbon::now();
                $fromDate = match ($dateRange) {
                    'today' => $now->copy()->startOfDay(),
                    'yesterday' => $now->copy()->subDay()->startOfDay(),
                    'last_week' => $now->copy()->subWeek(),
                    'last_month' => $now->copy()->subMonth(),
                    'past_3_months' => $now->copy()->subMonths(3),
                    default => $now->copy()->subMonths(3),
                };

                $toDate = $now->copy()->endOfDay();
                $query->whereBetween('vehicles.start_date', [$fromDate->toDateString(), $toDate->toDateString()]);

            }


            // Count total BEFORE limit/offset
            $total = $query->count(); 

            //Results
            $results = (clone $query)
                ->offset($offset)
                ->limit($perPage)
                ->select([
                 'vehicles.*',
                 'auctions.name',
                 'auctions.auction_date as auction_date',

                 'make.name as make_name',
                 'model.name as model_name',
                 'model_variant.name as variant_name',
                ])
                ->get()
                ->map(function ($item) {
                    
                    return [
                        'id' => $item->id,
                        'make_name' => $item->make_name,
                        'model_name' => $item->model_name,
                        'variant_name' =>  $item->variant_name,
                        'year' => $item->year,
                        'cc' => $item->cc,
                        'mileage' => $item->mileage,
                        'transmission' => $item->transmission,
                        'auction_name' => $item->name,
                        'auction_date' => date('d-M-Y',strtotime($item->auction_date)),
                        'auction_time' => date('h:i A',strtotime($item->auction_date)),
                        'last_bid' => $item->last_bid,
                        'cap_clean' => $item->cap_clean ?? '',
                        'cap_average' => $item->cap_average ?? '',
                        'cap_below' => $item->cap_below ?? '',
                        'autotrader_retail_value' => $item->autotrader_retail_value ?? '',
                        'auto_boli' => 0,
                    ];

                });

            return response()->json([
                'toDate' =>  $toDate,
                'fromDate' =>  $fromDate,
                'offset' => $offset,
                'data'         => $results,
                'total'        => $total,
                'per_page'     => $perPage,
                'current_page' => $page,
                'last_page'    => ceil($total / $perPage),
            ]);

    }



public function filter(Request $request)
{
    $vehicleTypes = $request->input('vehicle_types', []);
    $makeIds = $request->input('make_ids', []);
    $modelIds = $request->input('model_ids', []);
    $variantIds = $request->input('variant_ids', []);
    $yearIds = $request->input('year_ids', []);
    $auctionName = $request->input('auction_name');
    $dateRange = $request->input('date_range');

    $transmission = $request->input('transmission', []);
    $fuelType = $request->input('fuel_type', []);
    $doors = $request->input('doors' , []);
    $seats = $request->input('seats' ,[]);
    $cc = $request->input('cc', []);

    $colorId = $request->input('color_ids', []);
    $grade = $request->input('grades', []);
    $v5 = $request->input('v5');
    $formerKeepers = $request->input('former_keepers', []);
    $numberOfServices = $request->input('number_of_services', []);

    $mileageFrom = $request->input('mileage_from');
    $mileageTo = $request->input('mileage_to');

    $ageFrom = $request->input('vehicle_age_from');
    $ageTo = $request->input('vehicle_age_to');


    $CleanFrom = $request->input('cap_clean_from');
    $CleanTo = $request->input('cap_clean_to');

    $query = AutoBasic::with([
        'auction',
        'autoLegal',
        'autoPrice',
        'autoAdvance',
        'make',
        'model',
        'variant',
        'year'
    ]);

    // Filters on AutoBasic
    if (!empty($vehicleTypes)) {
        $query->whereIn('body_type_id', $vehicleTypes);
    }

    if (!empty($makeIds)) {
        $query->whereIn('make_id', $makeIds);
    }



    if (!empty($modelIds)) {
        $query->whereIn('model_id', $modelIds);
    }

    if (!empty($variantIds)) {
        $query->whereIn('variant_id', $variantIds);
    }

    if (!empty($yearIds)) {
        $query->whereIn('year_id', $yearIds);
    }

    if (!empty($transmission)) {
        $query->where('transmission', $transmission);
    }

    if (!empty($fuelType)) {
        $query->where('fuel_type', $fuelType);
    }

    if (!empty($doors)) {
        $query->where('doors', $doors);
    }

    if (!empty($seats)) {
        $query->where('seats', $seats);
    }

    if (!empty($cc)) {
        $query->where('cc',  $cc);
    }

    if ($mileageFrom || $mileageTo) {
    $query->whereHas('autoLegal', function ($q) use ($mileageFrom, $mileageTo) {
        if ($mileageFrom) {
            $q->where('mileage', '>=', $mileageFrom);
        }
        if ($mileageTo) {
            $q->where('mileage', '<=', $mileageTo);
        }
    });
    }


    if ($CleanFrom || $CleanTo) {
    $query->whereHas('autoPrice', function ($q) use ($CleanFrom, $CleanTo) {
        if ($CleanFrom) {
            $q->where('cap_clean', '>=', $CleanFrom);
        }
        if ($CleanTo) {
            $q->where('cap_clean', '<=', $CleanTo);
        }
    });
    }



if (!empty($ageFrom) || !empty($ageTo)) {
    $query->when(true, function ($q) use ($ageFrom, $ageTo) {
        $q->join('auto_legal', 'auto_basic.id', '=', 'auto_legal.id')
          ->select('auto_basic.*', 'auto_legal.dor');

        if (!empty($ageFrom)) {
            $fromDate = \Carbon\Carbon::now()->subMonths($ageFrom)->startOfDay();
            $q->where('auto_legal.dor', '<=', $fromDate->format('Y-m-d'));
        }

        if (!empty($ageTo)) {
            $toDate = \Carbon\Carbon::now()->subMonths($ageTo)->endOfDay();
            $q->where('auto_legal.dor', '>=', $toDate->format('Y-m-d'));
        }

        $q->distinct();
    });
}



    // Filters on Auction
    if (!empty($auctionName)) {
        $query->whereHas('auction', function ($q) use ($auctionName) {
            $q->where('platform_id', $auctionName);
        });
    }

    if (!empty($dateRange)) {
        $query->whereHas('auction', function ($q) use ($dateRange) {
            $date = now();
            switch ($dateRange) {
                case 'today':
                    $q->whereDate('auction_date', $date->toDateString());
                    break;
                case 'yesterday':
                    $q->whereDate('auction_date', $date->subDay()->toDateString());
                    break;
                case 'last_week':
                    $q->whereBetween('auction_date', [now()->subWeek(), now()]);
                    break;
                case 'last_month':
                    $q->whereBetween('auction_date', [now()->subMonth(), now()]);
                    break;
                case 'past_3_months':
                    $q->whereBetween('auction_date', [now()->subMonths(3), now()]);
                    break;
            }
        });
    }

    // Filters on AutoAdvance
    if (!empty($colorId)) {
        $query->whereHas('autoAdvance', function ($q) use ($colorId) {
            $q->whereIn('color_id', $colorId);
        });
    }


    // if (!empty($grade)) {
    //     $query->whereHas('autoAdvance', function ($q) use ($grade) {
    //         $q->whereIn('grade', $grade);
    //     });
    // }


if (!empty($colorId)) {
$query->when(!empty($colorId), function ($q) use ($colorId) {
    $gradeArray = is_array($colorId) ? $colorId : [$colorId];
    $q->join('auto_advance', 'auto_basic.id', '=', 'auto_advance.id')
      ->select('auto_basic.*', 'auto_advance.color_id')
      ->whereIn('auto_advance.color_id', $colorId)
      ->distinct();
      
});

}



if (!empty($grade)) {
$query->when(!empty($grade), function ($q) use ($grade) {
    $gradeArray = is_array($grade) ? $grade : [$grade];
    $q->join('auto_advance', 'auto_basic.id', '=', 'auto_advance.id')
      ->select('auto_basic.*', 'auto_advance.grade')
      ->whereIn('auto_advance.grade', $gradeArray)
      ->distinct();
      
});

}



if (!empty($formerKeepers)) {
$query->when(!empty($formerKeepers), function ($q) use ($formerKeepers) {
    $gradeArray = is_array($formerKeepers) ? $formerKeepers : [$formerKeepers];
    $q->join('auto_legal', 'auto_basic.id', '=', 'auto_legal.id')
      ->select('auto_basic.*', 'auto_legal.former_keepers')
      ->whereIn('auto_legal.former_keepers', $gradeArray)
      ->distinct();
      
});

}


if (!empty($numberOfServices)) {
$query->when(!empty($numberOfServices), function ($q) use ($numberOfServices) {
    $gradeArray = is_array($numberOfServices) ? $numberOfServices : [$numberOfServices];
    $q->join('auto_legal', 'auto_basic.id', '=', 'auto_legal.id')
      ->select('auto_basic.*', 'auto_legal.number_of_services')
      ->whereIn('auto_legal.number_of_services', $gradeArray)
      ->distinct();
      
});

}




//  dd($query->toSql(), $query->getBindings());




    // Filters on AutoLegal
    if (!empty($v5)) {
        $query->whereHas('autoLegal', function ($q) use ($v5) {
            $q->where('v5', $v5);
        });
    }

    if (!empty($formerKeepers)) {
        $query->whereHas('autoLegal', function ($q) use ($formerKeepers) {
            $q->where('former_keepers', $formerKeepers);
        });
    }

    if (!empty($numberOfServices)) {
        $query->whereHas('autoLegal', function ($q) use ($numberOfServices) {
            $q->where('number_of_services', $numberOfServices);
        });
    }


    // Then you can run the query
    $vehicles = $query->get();




    $html = view('partials.vehicle_table', compact('vehicles'))->render();

    return response()->json(['html' => $html]);
}



 public function auctionScheduler(Request $request){

 if ($request->ajax()) {
    // $search = $request->input('search.value');
    
    $start = $request->input('start') ?? 0;
    $length = $request->input('length') ?? 10;

    $query = DB::table('auctions')
        ->leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id');
        // ->leftJoin('auction_center', 'auctions.platform_id', '=', 'auction_center.auction_platform_id');

    // if (!empty($search)) {
    //     $query->where(function ($q) use ($search) {
    //         $q->where('auction_platform.name', 'like', "%{$search}%")
    //           ->orWhere('auction_center.name', 'like', "%{$search}%")
    //           ->orWhere('auctions.auction_date', 'like', "%{$search}%");
    //     });
    // }

    if ($request->has('platform_id') && $request->platform_id != '') {
        $query->where('auctions.platform_id', $request->platform_id);
    }

    if ($request->has('date_range') && $request->date_range != '') {
               
                $dateRange = $request->input('date_range');
                $now = \Carbon\Carbon::now();
                $fromDate = match ($dateRange) {
                    'today' => $now->copy()->startOfDay(),
                    'yesterday' => $now->copy()->subDay()->startOfDay(),
                    'last_week' => $now->copy()->subWeek(),
                    'last_month' => $now->copy()->subMonth(),
                    'past_3_months' => $now->copy()->subMonths(3),
                    default => $now->copy()->subMonths(3),
                };

                $toDate = $now->copy()->endOfDay();
                $query->whereBetween('auctions.auction_date', [$fromDate->toDateString(), $toDate->toDateString()]);

    }
  
    $totalData = clone $query;

    $data = $query ->select(
            'auctions.id',
            'auction_platform.name as platform_name',
            // 'auction_center.name as center_name',
            // 'auctions.total_vehicles', 
            'auctions.auction_date',
            'auctions.status',
            DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id) as car_count'),
        )
        
        ->offset($start)
        ->limit($length)
        ->get()
        ->map(function ($auction) {
            $view = URL::to('/auctionfinder');

            // ✅ Add status badge with color
            $statusColor = match (strtolower($auction->status)) {
                'planned'   => 'danger',
                'in progress' => 'warning',
                'update' => 'success',
                'cancel'    => 'primary',
                default     => 'secondary',
            };

            $statusBadge = '<span class="badge bg-' . $statusColor . '">' . ucfirst($auction->status ?? '-') . '</span>';

            return [
                $auction->platform_name ?? 'N/A',
                $auction->center_name ?? 'Unknown',
                $auction->car_count,
                $auction->auction_date ?? '-',
                $statusBadge ?? '-',
               
                '<a href="'.$view.'" class="btn btn-sm btn-primary">View</a> 
                 '
            ];
        });
  

    return [
        "draw" => intval($request->input('draw')),
        "recordsTotal" => $totalData->count(),
        "recordsFiltered" => $totalData->count(),
        "data" => $data
    ];
}


    

    

    return view('user.auctionscheduler.index');
 }

}

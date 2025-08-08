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

class AuctionFinderDataController extends Controller
{

    
    public function auctionList(Request $request)
    {

            $perPage = (int) $request->input('length', 10);
            $page = (int) $request->input('page', 1);
            $offset = ($page - 1) * $perPage;

            //Base Query
            $query = Vehicle::join('auctions','auctions.id','=','vehicles.auction_id')
            ->join('auction_platform','auction_platform.id','=','auctions.platform_id')
            ->join('make','make.id','=','vehicles.make_id')
            ->join('model','model.id','=','vehicles.model_id')
            ->join('model_variant','model_variant.id','=','vehicles.variant_id');

            
            if($request->has('platform') && $request->platform != ''){
                 $query->where('auctions.platform_id',$request->platform);
            }


            if($request->has('type') && $request->type != ''){
                $query->whereIn('vehicles.vehicle_id',explode(',',$request->type));
            }


            if($request->has('make') && $request->make != ''){
                $query->whereIn('vehicles.make_id',explode(',',$request->make));
            }


            if($request->has('model') && $request->model != ''){
                $query->whereIn('vehicles.model_id',explode(',',$request->model));
            }


            if($request->has('variant') && $request->variant != ''){
                $query->whereIn('vehicles.variant_id',explode(',',$request->variant));
            }


            if($request->has('year') && $request->year != ''){
                $query->whereIn('vehicles.year',explode(',',$request->years));
            }


            if($request->has('transmission') && $request->transmission != ''){
                $query->whereIn('vehicles.transmission',explode(',',$request->transmission));
            }


            if($request->has('fuel_type') && $request->fuel_type != ''){
                $query->whereIn('vehicles.fuel_type',explode(',',$request->fuel_type));
            }


            if($request->has('body') && $request->body != ''){
                $query->whereIn('vehicles.body_id',explode(',',$request->body));
            }


            if($request->has('color') && $request->color != ''){
                $query->whereIn('vehicles.color_id',explode(',',$request->color));
            }


            if($request->has('doors') && $request->door != ''){
                $query->whereIn('vehicles.doors',explode(',',$request->door));
            }


            if($request->has('seat') && $request->seat != ''){
                $query->whereIn('vehicles.seats',explode(',',$request->seat));
            }


            if($request->has('grade') && $request->grade != ''){
                $query->whereIn('vehicles.grades',explode(',',$request->grade));
            }


            if($request->has('v5') && $request->v5 != ''){
                $query->whereIn('vehicles.v5',explode(',',$request->v5));
            }


            if($request->has('cc') && $request->cc != ''){
                $query->whereIn('vehicles.cc',explode(',',$request->cc));
            }


            if($request->has('former_keeper') && $request->former_keeper != ''){
                $query->whereIn('vehicles.former_keepers',explode(',',$request->former_keeper));
            }


            if($request->has('no_of_service') && $request->no_of_service != ''){
                $query->whereIn('vehicles.no_of_services',explode(',',$request->no_of_service));
            }


            if($request->has('mileage_from') && $request->mileage_from != ''){
                $query->where('vehicles.mileage', '=>', $request->mileage_from);
            }


            if($request->has('mileage_to') && $request->mileage_to != ''){
                $query->where('vehicles.mileage', '<=', $request->mileage_to);
            }


            $dateRange = $request->has('date') ? $request->date : 'past_3_months';
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

            // Count total BEFORE limit/offset
            $total = $query->count(); 

            //Results
            $results = (clone $query)
            ->offset($offset)
            ->limit($perPage)
            ->select([
                'vehicles.*',
                'auction_platform.name',
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



    public function getRelatedVehicle(Request $request,$id)
    {

            $vehicle = Vehicle::where('id',$id)->orderBy('start_date','desc')->first();
            if(!$vehicle){
                return response()->json([
                    "message" => "Vehicle Not Found",
                ],401);
            }

            DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

            $perPage = (int) $request->input('length', 10);
            $page = (int) $request->input('page', 1);
            $offset = ($page - 1) * $perPage;


            //Base Query
            $query = Vehicle::join('auctions','auctions.id','=','vehicles.auction_id')
            ->join('auction_platform','auction_platform.id','=','auctions.platform_id')
            ->join('make','make.id','=','vehicles.make_id')
            ->join('model','model.id','=','vehicles.model_id')
            ->join('model_variant','model_variant.id','=','vehicles.variant_id')
            ->where('vehicles.make_id',$vehicle->make_id)
            ->where('vehicles.model_id',$vehicle->model_id)
            ->where('vehicles.variant_id',$vehicle->variant_id);

            
            if($request->has('platform') && $request->platform != ''){
                 $query->where('auctions.platform_id',$request->platform);
            }
            
            $dateRange = $request->date_range ? $request->date_range : 'past_3_months';
            if($request->has('date_range') && $request->date_range != '') {

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
                 'auction_platform.name as platform_name',
                 'auctions.auction_date as auction_date',
                 'make.name as make_name',
                 'model.name as model_name',
                 'model_variant.name as variant_name',
                ])
                ->groupBy('vehicles.reg')
                ->get()
                ->map(function ($item) {

                    $image = explode(',',$item->images);

                    return [
                        'id' => $item->id,
                        'platform_name' => $item->platform_name,
                        'make_name' => $item->make_name,
                        'model_name' => $item->model_name,
                        'variant_name' =>  $item->variant_name,
                        'date' =>  $item->start_date,
                        'image' =>  $image ? $image[0] : '',
                    ];

                });

            return response()->json([
                // 'toDate' =>  $toDate,
                // 'fromDate' =>  $fromDate,
                'offset' => $offset,
                'data'         => $results,
                'total'        => $total,
                'per_page'     => $perPage,
                'current_page' => $page,
                'last_page'    => ceil($total / $perPage),
            ]);
    }


       public function getPlatformVehicle(Request $request)
    {
            $month3 = Carbon::now()->subMonths(2)->startOfMonth()->format('Y-m');
            $month2 = Carbon::now()->subMonths(1)->startOfMonth()->format('Y-m');
            $month1 = Carbon::now()->startOfMonth()->format('Y-m');
            $data = AuctionPlatform::join('auctions', 'auctions.platform_id', '=', 'auction_platform.id')
                    ->join('vehicles','vehicles.auction_id','=','auctions.id')
                    ->select(
                        'auction_platform.name AS label',
                        DB::raw("SUM(CASE WHEN DATE_FORMAT(auctions.auction_date, '%Y-%m') = '{$month3}' THEN 1 ELSE 0 END) as month3"),
                        DB::raw("SUM(CASE WHEN DATE_FORMAT(auctions.auction_date, '%Y-%m') = '{$month2}' THEN 1 ELSE 0 END) as month2"),
                        DB::raw("SUM(CASE WHEN DATE_FORMAT(auctions.auction_date, '%Y-%m') = '{$month1}' THEN 1 ELSE 0 END) as month1")
                    );
              
                    if($request->has('platform_id') && $request->platform_id != ''){
                        $data = $data->whereIn('auctions.platform_id',$request->platform_id);
                    }
            

              $data =  $data->groupBy('auction_platform.id', 'auction_platform.name')
                    ->get();
           
                $labels = [];
                $colors = [];
                $res = [];
                $cc = ['#9b5de5','#00bbf9','#00f5d4','#ef233c']; 
                
                foreach ($data as $key => $value) {

                    Auctions::where('platform_id',$value->id)->first();
                    $randomKey = array_rand($cc);
                    $labels[$key] = $value['label'];
                    $colors[$key] = $cc[$randomKey];
                    
                    array_push($res,[
                        "name" => $value['label'],
                        "data" => [$value['month1'],$value['month2'],$value['month3']],
                    ]);

                }

                return response()->json([
                    "labels" =>  $labels,
                    "colors" => $colors,
                    "data" => $res,
                ],200);
    }



     public function getYears(Request $request)
    {
        $data = Vehicle::select('year As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('year')
            ->where('year' , '!=', '')
            ->groupBy('year')
            ->orderByDesc('year')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }


      public function getTransmissions(Request $request)
    {

        $data = Vehicle::select('transmission As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('transmission')
            ->where('transmission', '!=', '')
            ->groupBy('transmission')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data,
        ],200);

    }

    
      public function getFuelType(Request $request)
    {

         $data = Vehicle::select('fuel_type As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('fuel_type')
            ->where('fuel_type', '!=', '')
            ->groupBy('fuel_type')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }


       public function getBodyType(Request $request)
    {

        $data = DB::table('body_types')
        ->join('vehicles', 'vehicles.body_id', '=', 'body_types.id')
        ->select([
            'body_types.id',
            'body_types.name as label',
            DB::raw('COUNT(vehicles.id) as count')
        ])
        ->groupBy('body_types.id','body_types.name')
        ->orderBy('count','desc')
        ->get();

        return response()->json([
            "data" => $data
        ],200);

    }

        public function getVehicleTypes(Request $request)
    {

        $data = DB::table('vehicle_type')
        ->join('vehicles', 'vehicles.vehicle_id', '=', 'vehicle_type.id')
        ->select([
            'vehicle_type.id',
            'vehicle_type.name as label',
            DB::raw('COUNT(vehicles.id) as count')
        ])
        ->groupBy('vehicle_type.id','vehicle_type.name')
        ->orderBy('count','desc')
        ->get();

        return response()->json([
            "data" => $data
        ],200);

    }

    
       public function getMakes(Request $request)
    {

        $data = DB::table('make')
        ->join('vehicles', 'vehicles.make_id', '=', 'make.id')
        ->select([
            'make.id',
            'make.name as label',
            DB::raw('COUNT(vehicles.id) as count')
        ])
        ->groupBy('make.id','make.name')
        ->orderBy('count','desc')
        ->get();

        return response()->json([
            "data" => $data
        ],200);

    }

        public function getModels(Request $request)
    {

        $data = DB::table('model')
        ->join('vehicles', 'vehicles.model_id', '=', 'model.id')
        ->select([
            'model.id',
            'model.name as label',
            DB::raw('COUNT(model.id) as count')
        ])
        ->groupBy('model.id','model.name')
        ->orderBy('count','desc')
        ->get();

        return response()->json([
            "data" => $data
        ],200);

    }

        public function getVariants(Request $request)
    {

        $data = DB::table('model_variant')
        ->join('vehicles', 'vehicles.variant_id', '=', 'model_variant.id')
        ->select([
            'model_variant.id',
            'model_variant.name as label',
            DB::raw('COUNT(vehicles.id) as count')
        ])
        ->groupBy('model_variant.id','model_variant.name')
        ->orderBy('count','desc')
        ->get();

        return response()->json([
            "data" => $data
        ],200);

    }


       public function getColors(Request $request)
    {

        $data = DB::table('color')
        ->join('vehicles', 'vehicles.color_id', '=', 'color.id')
        ->select([
            'color.id',
            'color.name as label',
            DB::raw('COUNT(vehicles.id) as count')
        ])
        ->groupBy('color.id','color.name')
        ->orderBy('count','desc')
        ->get();

        return response()->json([
            "data" => $data
        ],200);

    }

         public function getDoors(Request $request)
    {

         $data = Vehicle::select('doors As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('doors')
            ->where('doors', '!=', '')
            ->groupBy('doors')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }


        public function getSeats(Request $request)
    {
          $data = Vehicle::select('seats As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('seats')
            ->where('seats', '!=', '')
            ->groupBy('seats')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }



        public function getGrade(Request $request)
    {

           $data = Vehicle::select('grade As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('grade')
            ->where('grade', '!=', '')
            ->groupBy('grade')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }


        public function getV5(Request $request)
    {

         $data = Vehicle::select('v5 As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('v5')
            ->where('v5', '!=', '')
            ->groupBy('v5')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }


        public function getEngineSize(Request $request)
    {

         $data = Vehicle::select('cc As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('cc')
            ->where('cc', '!=', '')
            ->groupBy('cc')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);

    }



        public function getFormerKeepers(Request $request)
    {

        $data = Vehicle::select('former_keepers As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('former_keepers')
            ->where('former_keepers', '!=', '')
            ->groupBy('former_keepers')
            ->orderByDesc('count')
            ->get();


        return response()->json([
            "data" => $data
        ],200);

    }

        public function getNoOfservices(Request $request)
    {

          $data = Vehicle::select('no_of_services As label', \DB::raw('COUNT(*) as count'))
            ->whereNotNull('no_of_services')
            ->where('no_of_services', '!=', '')
            ->groupBy('no_of_services')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            "data" => $data
        ],200);
    }




}

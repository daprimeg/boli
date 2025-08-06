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


  




   


}

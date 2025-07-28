<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionPlatform;
use App\Models\Auctions;
use App\Models\Membership;
use App\Models\MembershipPayment;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class DashboardController extends Controller
{

      public function dashboard(Request $request)
    {
            $totalVehicles = DB::table('vehicles')->count();
            $totalSoldVehicles= DB::table('vehicles')
            ->whereRaw("LOWER(bidding_status) = 'on sale'")
            ->count();

            $notSoldVehicles= DB::table('vehicles')
            ->whereRaw("LOWER(bidding_status) = 'Reserve not met'")
            ->count();

            $provisionalVehicles= DB::table('vehicles')
            ->whereRaw("LOWER(bidding_status) = 'provisional'")
            ->count();

            $totalAuctions = DB::table('auctions')->count();

            $onlineAuctions = DB::table('auctions')
                ->whereRaw("LOWER(auction_type) = 'Online Auction'")
                ->where('auction_date', '<=', Carbon::now())
                ->where('end_date', '>=', Carbon::now())
                ->count();

            $timeAuctions = DB::table('auctions')
                ->whereRaw("auction_type = 'time auction'")
                ->where('auction_date', '<=', Carbon::now())
                ->where('end_date', '>=', Carbon::now())
                ->count();

            $inProgressAuctions = DB::table('auctions')
            ->whereRaw("LOWER(status) = 'In Progress'")
            ->where('auction_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->count();

            $inProgressVehicles = DB::table('vehicles')
            ->join('auctions', 'vehicles.auction_id', '=', 'auctions.id')
            ->whereRaw("LOWER(status) = 'In Progress'")
            ->where('auctions.auction_date', '<=', Carbon::now())
            ->where('auctions.end_date', '>=', Carbon::now())
            ->count();


            $data = [
                'notSoldVehicles' => $notSoldVehicles,
                'provisionalVehicles' => $provisionalVehicles,
                'inProgressVehicles' => $inProgressVehicles,
                'totalSoldVehicles' => $totalSoldVehicles, 
                'totalVehicles' => $totalSoldVehicles, 
                'totalAuctions' => $totalSoldVehicles, 
                'inProgressAuctions' => $totalSoldVehicles, 
                'onlineAuctions' => $totalSoldVehicles, 
                'timeAuctions' => $totalSoldVehicles, 
            ];

            return view('user.dashboard.dashboard',$data);

    }

    

     public function getTotalAuctions()
    {

        $data = Vehicle::leftJoin('auctions', 'vehicles.auction_id', '=', 'auctions.id')->select([
            DB::raw("COUNT(DISTINCT auctions.id) as total_auctions"),
             DB::raw("COUNT(DISTINCT CASE WHEN auctions.auction_type = 'Time Auction' THEN auctions.id END) as time_auctions"),
            DB::raw("COUNT(DISTINCT CASE WHEN auctions.status = 'In Progress' THEN auctions.id END) as inprogress_auctions"),
            DB::raw("COUNT(vehicles.id) as total_vehicles"),
            DB::raw("COUNT(CASE WHEN auctions.status = 'In Progress' THEN vehicles.id END) as inprogress_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'On Sale' THEN vehicles.id END) as onsale_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'Provisional' THEN vehicles.id END) as provisional_vehicles"),
            DB::raw("COUNT(*) - COUNT(DISTINCT vehicle_id) as duplicate_vehicles")
        ])->first();

        $data['sold_vehicles'] =   $data['onsale_vehicles'] +  $data['provisional_vehicles'];

        return response()->json($data,200);

    }

      public function vehicleStates()
    {

        $data = Vehicle::leftJoin('auctions', 'vehicles.auction_id', '=', 'auctions.id')->select([      
            DB::raw("COUNT(vehicles.id) as total_vehicles"),
            DB::raw("COUNT(CASE WHEN auctions.status = 'In Progress' THEN vehicles.id END) as inprogress_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'On Sale' THEN vehicles.id END) as onsale_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'Provisional' THEN vehicles.id END) as provisional_vehicles"),
            DB::raw("COUNT(*) - COUNT(DISTINCT vehicle_id) as duplicate_vehicles")
        ])->first();

        $data['sold_vehicles'] =   $data['onsale_vehicles'] +  $data['provisional_vehicles'];

        return response()->json($data,200);

    }


      public function getOnlineAuctions(Request $request)
    {

        DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $data = Vehicle::join('auctions','auctions.id', '=', 'vehicles.auction_id')
        ->join('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
        ->where('auctions.auction_type','Online Auction');

        if($request->has('platform_id') && $request->platform_id != ''){
            $data = $data->whereIn('auction_platform.id',$request->platform_id);
        }

        $data = $data->select([
          "auction_platform.id",
          "auction_platform.name",
          DB::raw("COUNT(DISTINCT auctions.id) as total_auctions"),
          DB::raw("COUNT(CASE WHEN auctions.status = 'Update' THEN auctions.id END) as complete_auctions"),
          
          DB::raw("COUNT(DISTINCT vehicles.id) as vehicles_total"),
          DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'On Sale' THEN vehicles.id END) as onsale_vehicles"),
          DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'Provisional' THEN vehicles.id END) as provisional_vehicles"),
        ])
        ->groupBy('auction_platform.id')
        ->get();

        return response()->json($data,200);

    }

          public function getTimeAuctions(Request $request)
    {

        DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $data = Vehicle::join('auctions','auctions.id', '=', 'vehicles.auction_id')
        ->join('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
        ->where('auctions.auction_type','Time Auction');


        if($request->has('platform_id') && $request->platform_id != ''){
            $data = $data->whereIn('auction_platform.id',$request->platform_id);
        }

        $data = $data->select([
          "auction_platform.id",
          "auction_platform.name",
          
          DB::raw("COUNT(DISTINCT auctions.id) as total_auctions"),
          "auctions.auction_date",
        ])
        ->groupBy('auction_platform.id')
        ->get()
        ->map(function ($row) {
            $row->end_date =  "<span>".date('d-m-Y',strtotime($row->auction_date))."</span><br><span>".date('h:s A',strtotime($row->auction_date))."</span>";
            return $row;
        });
        

        return response()->json($data,200);

    }


      public function onlineAuctions(Request $request)
    {
        if ($request->ajax()) {
            $onlineData = AuctionPlatform::leftJoin('auctions', 'auction_platform.id', '=', 'auctions.platform_id')
                ->whereRaw("LOWER(auctions.auction_type) = 'online auction'")
                ->select(
                    'auction_platform.name AS auction_platform_name',
                    'auctions.auction_type',
                    DB::raw('(  SELECT COUNT(*)  FROM vehicles v  JOIN auctions a ON v.auction_id = a.id  WHERE a.platform_id = auctions.platform_id  ) as car_count'),
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'on sale') as remaining"),
                    DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id) as lots'),
                )
                ->get()
                ->map(function ($auction) {
                    return [
                        $auction->auction_platform_name,
                        $auction->car_count,
                        $auction->remaining ?? 'N/A',
                        $auction->lots ?? 'N/A',
                    ];
                });

            return response()->json(['data' => $onlineData]);
        }
    }

    public function timeAuctions(Request $request)
    {
        if ($request->ajax()) {
            $timeData = Auctions::leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
                ->whereRaw("LOWER(auctions.auction_type) = 'time auction'")
                ->select(
                    'auction_platform.name AS auction_platform_name',
                    'auctions.auction_type',
                    DB::raw('(  SELECT COUNT(*)  FROM vehicles v  JOIN auctions a ON v.auction_id = a.id  WHERE a.platform_id = auctions.platform_id  ) as car_count'),
                    'auctions.end_date'
                )
                ->get()
                ->map(function ($auction) {
                    return [
                        $auction->auction_platform_name,
                        $auction->car_count,
                        $auction->end_date,
                    ];
                });

            return response()->json(['data' => $timeData]);
        }
    }


       public function lookbestauction(Request $request)
    {
            // if ($request->ajax()) {
                
                  $data = AuctionPlatform::join('auctions', 'auctions.platform_id', '=', 'auction_platform.id')
                  ->select(
                        'auction_platform.name AS label',
                         DB::raw("SUM((SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id)) as total")
                  );


                  if($request->has('platform_id') && $request->platform_id != ''){
                    $data = $data->whereIn('auctions.platform_id',$request->platform_id);
                  }


                   $data = $data->groupBy('auction_platform.id', 'auction_platform.name')
                   ->get();

                    $colors = ['#9b5de5','#00bbf9','#00f5d4','#ef233c'];
                    $res = [];
                   
                    foreach ($data as $value) {

                        $randomKey = array_rand($colors);
                        $color = $colors[$randomKey];
                        
                        array_push($res,[
                            "color" => $color,
                            "label" => $value['label'],
                            "total" => $value['total'],
                            "borderColor" => "red",
                            "backgroundColor" => "red",
                        ]);

                    }

                return response()->json([
                    'colors' => array_column($res,'color'),
                    'labels' => array_column($res,'label'),
                    'total' => array_column($res,'total'),
                    'data' => $res,
                ]);

            // }
    }


        public function previousLots(Request $request)
    {
                // if ($request->ajax()) {
                    
                $data = AuctionPlatform::join('auctions', 'auctions.platform_id', '=', 'auction_platform.id')
                ->select(
                    'auction_platform.name AS auction_platform_name',
                    'auctions.auction_type',
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'On Sale') as onSale"),
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'Provisional') as onProvisional"),
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'Reserve not met') as onReserve"),
                );

                if($request->has('platform_id') && $request->platform_id != ''){
                    // dd($request->platform_id);
                    $data = $data->whereIn('auction_platform.id',$request->platform_id);
                }

                $data = $data->get()->map(function($row){
                    return $row;
                });

                return response()->json([
                    'data' => $data,
                ]);

                // }

    }


       public function upComingVehicles(Request $request)
    {

            //Base Query
            $query = Vehicle::leftjoin('make','make.id','=','vehicles.make_id')
            ->leftjoin('model','model.id','=','vehicles.model_id')
            ->leftjoin('model_variant','model_variant.id','=','vehicles.variant_id');

            // Count total BEFORE limit/offset
            $total = $query->count(); 

            //Results
            $results = (clone $query)
                ->limit(10)
                ->select([
                 'vehicles.*',
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
                        'mileage' => $item->mileage,
                        'report' => $item->inspection_report,
                        'auto_boli' => 0,
                    ];

                });

            return response()->json([
                'data'         => $results,
                'total'        => $total,
            ]);


            return response()->json($data, 200);

    }




      public function getValuation(Request $request)
    {

              $data = AuctionPlatform::join('auctions', 'auctions.platform_id', '=', 'auction_platform.id')
                ->select(
                    'auction_platform.name AS auction_platform_name',
                    'auctions.auction_type',
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'On Sale') as onSale"),
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'Provisional') as onProvisional"),
                    DB::raw("(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'Reserve not met') as onReserve"),
                );

                if($request->has('platform_id') && $request->platform_id != ''){
                    // dd($request->platform_id);
                    $data = $data->whereIn('auction_platform.id',$request->platform_id);
                }

                $data = $data->get()->map(function($row){
                    return $row;
                });

                return response()->json([
                    'data' => $data,
                ]);

    }




    






    

    


}

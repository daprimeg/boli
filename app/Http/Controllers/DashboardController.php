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


        public function getPreviousLots(Request $request)
{
    DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

    $data = Vehicle::join('auctions', 'auctions.id', '=', 'vehicles.auction_id')
        ->join('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id');



    $data = $data->select([
            "auction_platform.id",
            "auction_platform.name",
            DB::raw("(auctions.auction_type) as auction_type"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'On Sale' THEN vehicles.id END) as onsale_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'Provisional' THEN vehicles.id END) as provisional_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'Not Sold' THEN vehicles.id END) as notsold_vehicles"),
            DB::raw("COUNT(CASE WHEN vehicles.bidding_status = 'Sold' THEN vehicles.id END) as sold_vehicles"),
        ])
        ->groupBy('auction_platform.id', 'auction_platform.name')
        ->get();

    return response()->json($data, 200);
}

        public function upComingVehicles(Request $request)
{
    DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

    $data = DB::table('vehicles') ;

    $data = $data->select([
            "vehicles.id",
            "vehicles.title",
            "vehicles.mileage",
        //   "vehicles.mileage ?? 'N/A' ",
       
           
        ])
        ->get();

    return response()->json($data, 200);
}




    
    public function subscriptions()
    {

        $plans = Plan::all();
        $membership = Membership::where('user_id',Auth::user()->id)
        ->orderBy('created_at','desc')
        ->get();

        $current = Membership::where('user_id',Auth::user()->id)
        ->where('membership_status', 'Active')
        ->whereDate('membership_start_date', '<=', now())
        ->whereDate('membership_expiry_date', '>=', now())
        ->first();

        return view('user.dashboard.subscriptions', compact('membership','plans','current'));
    }



    public function subscriptions_submit(Request $request)
    {

        $request->validate([
            "plan_id" => "required|string",
        ]);
        
        $plan = Plan::find($request->plan_id);
        if (!$plan) {
          return back()->withErrors(['plan_id' => 'Selected plan was not found.'])->withInput();
        }

        if($plan->id == 2) {

            $transactionId = "00";
            $startDate = now();
            $expiryDate = now()->addMonths($plan->duration_value);
        
            $membership = Membership::create([
                'user_id' => Auth::user()->id,
                'plan_id' => $plan->id,
                'membership_start_date' => $startDate,
                'membership_expiry_date' => $expiryDate,
                'membership_status' => 'Pending',
                'membership_type' => 'monthly',
            ]);

            MembershipPayment::create([
                'membership_id' => $membership->id,
                'payment_date' => now(),
                'payment_method' => 'stripe',
                'transaction_id' => $transactionId,
                'charge_id' => $transactionId,
                'payer_id' => $transactionId,
                'amount' => $plan->price,
                'currency' => 'GBP',
                'payment_status' => 'Completed',
            ]);

            $membership->update(['membership_status' => 'Active']);
            return back()->with('success','Plan Added Successfully');

        }
        
        //Stripe
        if(!$request->payment_method){
            return back()->withErrors(['card' => 'Please Enter Card Details..'])->withInput();
        }


        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            try {
                
                $intent = PaymentIntent::create([
                    'amount' => round($plan->price * 100),
                    'currency' => 'gbp',
                    'automatic_payment_methods' => [
                        'enabled' => true,
                        'allow_redirects' => 'never',
                    ],
                    'confirm' => true,
                    'payment_method' => $request->payment_method
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    "message" => $e->getMessage(),
                ],500);
            }


            if ($intent->status == 'succeeded') {

                $transactionId = "00";
                $startDate = now();
                $expiryDate = now()->addMonths($plan->duration_value);
            
                $membership = Membership::create([
                    'user_id' => Auth::user()->id,
                    'plan_id' => $plan->id,
                    'membership_start_date' => $startDate,
                    'membership_expiry_date' => $expiryDate,
                    'membership_status' => 'Pending',
                    'membership_type' => 'monthly',
                ]);

                MembershipPayment::create([
                    'membership_id' => $membership->id,
                    'payment_date' => now(),
                    'payment_method' => 'stripe',
                    'transaction_id' => $transactionId,
                    'charge_id' => $transactionId,
                    'payer_id' => $transactionId ,
                    'amount' => $plan->price,
                    'currency' => 'GBP',
                    'payment_status' => 'Completed',
                ]);

                $membership->update(['membership_status' => 'Active']);
                return back()->with('success',"Subscription and Payment successful"); 

            }elseif ($intent->status == 'requires_action' && $intent->next_action->type == 'use_stripe_sdk') {

                 return back()->with('error',
                 "Additional authentication is required (e.g. 3D Secure)");

            } else {

                return back()->with('error',$intent->last_payment_error->message ?? 'Payment failed or incomplete.'); 
            }


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


    public function favouriteAuctions(Request $request)
    {
        if ($request->ajax()) {
            $favData = Auctions::leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')
                ->select(
                    'auction_platform.name AS auction_platform_name',
                    'auctions.auction_type',
                    DB::raw("( SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id AND vehicles.bidding_status = 'Reserve not met') as reauction"),
                    DB::raw("( SELECT COUNT(*)  FROM vehicles  WHERE vehicles.auction_id = auctions.id ) as total_lots"),
                )
                ->get()
                ->map(function ($auction) {
                    return [
                        $auction->auction_platform_name,
                        $auction->auction_type,
                        $auction->total_lots,
                        $auction->values ?? '🔥',
                        $auction->reauction,
                    ];
                });

            return response()->json(['data' => $favData]);
        }
    }


    


}

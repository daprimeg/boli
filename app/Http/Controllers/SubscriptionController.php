<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\MembershipPayment;
use Illuminate\Http\Request;
use App\Models\Plan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class SubscriptionController extends Controller
{

    
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
        
        return view('user.subscription.subscriptions', compact('membership','plans','current'));

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


    
    


}

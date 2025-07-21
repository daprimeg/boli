<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Auction;
use App\Models\Membership;
use App\Models\MembershipPayment;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class AuthController extends Controller
{

   

    private function AccountCreate($request){


            $user = new User();

            $user->companyName = $request->companyName;
            $user->businessType = $request->businessType;
            $user->companyReg = $request->companyReg;
            $user->website = $request->website;
            $user->businessEmail = $request->businessEmail;
            $user->motorTradeInsurance = $request->motorTradeInsurance;
            $user->vatNumber = $request->vatNumber;
            $user->companyAddress1 = $request->companyAddress1;
            $user->companyAddress2 = $request->companyAddress2;
            $user->townCity = $request->townCity;
            $user->country = $request->country;
            $user->postcode = $request->postcode;
            $user->telephone = $request->telephone;
            
            $user->firstName = $request->firstName;
            $user->surname = $request->surname;
        
            $user->title = $request->title;
            $user->jobTitle = $request->jobTitle;
            $user->phone = $request->phone;
            $user->personalEmail = $request->personalEmail;
            $user->status = $request->status;
            $user->user_type = 0;
            $user->status = 1;

            $plainPassword = rand(100000, 999999);
            $user->password = FacadesHash::make($request->password);
            
            if ($request->file('avatar')) {
                // Remove existing thumbnail if it exists
                if ($user->avatar && file_exists(public_path('uploads/' . $user->avatar))) {
                    unlink(public_path('uploads/' . $user->avatar));
                }
                $fileName = time() . '__ff__' . $request->file('avatar')->getClientOriginalName();
                $filePath = public_path('uploads/avatar');
                $request->file('avatar')->move($filePath, $fileName);
                $user->avatar = $fileName;
                // $user->save();
            }

            if ($request->file('uploadID')) {
                // Remove existing thumbnail if it exists
                if ($user->uploadID && file_exists(public_path('uploads/' . $user->uploadID))) {
                    unlink(public_path('uploads/' . $user->uploadID));
                }
                $fileName = time() . '__ff__' . $request->file('uploadID')->getClientOriginalName();
                $filePath = public_path('uploads/uploadID');
                $request->file('uploadID')->move($filePath, $fileName);
                $user->uploadID = $fileName;
                // $user->save();
            }

            if ($request->file('motorTradeProof')) {
                // Remove existing thumbnail if it exists
                if ($user->motorTradeProof && file_exists(public_path('uploads/' . $user->motorTradeProof))) {
                    unlink(public_path('uploads/' . $user->motorTradeProof));
                }
                $fileName = time() . '__ff__' . $request->file('motorTradeProof')->getClientOriginalName();
                $filePath = public_path('uploads/motorTradeProof');
                $request->file('motorTradeProof')->move($filePath, $fileName);
                $user->motorTradeProof = $fileName;
                // $user->save();
            }

            if ($request->file('addressProof')) {
                // Remove existing thumbnail if it exists
                if ($user->addressProof && file_exists(public_path('uploads/' . $user->addressProof))) {
                    unlink(public_path('uploads/' . $user->addressProof));
                }
                $fileName = time() . '__ff__' . $request->file('addressProof')->getClientOriginalName();
                $filePath = public_path('uploads/addressProof');
                $request->file('addressProof')->move($filePath, $fileName);
                $user->addressProof = $fileName;
                // $user->save();
            }

            $user->save();

            return $user;

    }


      public function register(Request $request)
    {

        if(Auth::check()) {
          return redirect('/dashboard')->with('message', 'You are already logged in.');
        }

        $plans = Plan::where('status',1)->get();

        return view('web.register',compact('plans'));
    }


    // Registration
    public function register_submit(Request $request)
    {
        if(Auth::check()) {
          return redirect('/dashboard')->with('message', 'You are already logged in.');
        }

            $validator = Validator::make($request->all(), [
                'payment_method' => 'required|string',
                'password' => 'required|string',
                'companyName' => 'required|string|max:255',
                'companyAddress1' => 'required|string|max:255',
                'companyAddress2' => 'required|string|max:255',
                'townCity' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'postcode' => 'required|string|max:255',
                'telephone' => 'required|string|max:255',
                'businessType' => 'required|string|max:255',
                'companyReg' => 'required|string|max:255',
                'plan_id' => 'required',
                'website' => 'required|url',
                'businessEmail' => 'required|string|email|max:255|unique:users',
                'motorTradeInsurance' => 'required|string|max:255',
                'vatNumber' => 'required|string|max:255',
                
                'firstName' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'jobTitle' => 'required|string|max:255',

                'phone' => 'required|string|max:255',
                'personalEmail' => 'required|string|email|max:255|unique:users',
                
                'uploadID' => 'required|file|mimes:jpg,png,pdf|max:4096',
                'motorTradeProof' => 'required|file|mimes:jpg,png,pdf|max:4096',
                'addressProof' => 'required|file|mimes:jpg,png,pdf|max:4096',
            ],[],
            [
            'companyName' => 'Company Name',
            'companyAddress1' => 'Address Line 1',
            'companyAddress2' => 'Address Line 2',
            'townCity' => 'Town or City',
            'country' => 'Country',
            'postcode' => 'Postcode',
            'telephone' => 'Telephone Number',
            'businessType' => 'Business Type',
            'companyReg' => 'Company Registration Number',
            'website' => 'Company Website',
            'businessEmail' => 'Business Email',
            'motorTradeInsurance' => 'Motor Trade Insurance',
            'vatNumber' => 'VAT Number',
            'firstName' => 'First Name',
            'surname' => 'Surname',
            'title' => 'Title',
            'jobTitle' => 'Job Title',
            'password' => 'Password',
            'plan_id' => 'Plan',
            

            'phone' => 'Phone Number',
            'personalEmail' => 'Personal Email',
            'password' => 'Password',
            'uploadID' => 'Upload ID',
            'motorTradeProof' => 'Motor Trade Proof',
            'addressProof' => 'Address Proof',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Request Failed',
                'errors' => $validator->errors()
            ], 422);
        }


    
        $planId = 2;
        $plan = Plan::find($planId);
        if(!$plan){
            return response()->json([
            'message' => 'Request Failed',
            'errors' => [
                "addressProof" => ['Plan Not Found']
            ]
          ], 422);
        }

        
    

        //Stripe Process

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            try {
                
                $intent = PaymentIntent::create([
                    'amount' => intVal($plan->price),
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

                $user = $this->AccountCreate($request);
                $startDate = now();
                $expiryDate = now()->addMonths($plan->duration_value);
          
                $membership = Membership::create([
                    'user_id' => $user->id,
                    'plan_id' => $plan->id,
                    'membership_start_date' => $startDate,
                    'membership_expiry_date' => $expiryDate,
                    'membership_status' => 'Pending',
                ]);

                $transactionId = $intent->latest_charge;
              
                MembershipPayment::create([
                    'user_id' => $user->id,
                    'membership_id' => $membership->id,
                    'plan_id' => $plan->id,
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
                
                Auth::login($user);

                return response()->json([
                    'message' => 'Registration and payment successful.',
                ], 201);

            } elseif ($intent->status == 'requires_action' && $intent->next_action->type == 'use_stripe_sdk') {

                 return response()->json([
                    "message" => "Additional authentication is required (e.g. 3D Secure).",
                 ],500);

            } else {
                
                $errorMessage = $intent->last_payment_error->message ?? 'Payment failed or incomplete.';
                return response()->json([
                    'message' => $errorMessage,
                    'status' => $intent->status,
                ], 500);
            }


    }

    

    // Login

     public function login(Request $request)
    {
      if(Auth::check()) {
          return redirect('/dashboard')->with('message', 'You are already logged in.');
      }

       return view('web.login');

    }


    public function login_submit(Request $request)
    {

        if(Auth::check()) {
          return redirect('/dashboard')->with('message', 'You are already logged in.');
        }

        // dd($request->email);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

    

        // Find the user with personalEmail and user_type = 0
        $user = User::where('personalEmail',$request->email)->first();

     

        if (!$user) {
            return redirect()->back()->with('error', 'User not found or not authorized.');
        }

      
    
        // Check user account status
        if ($user->status == 0) {
            return redirect()->back()->with('error', 'Your account is deactivated.');
        }
    
        // Check membership status
        // $membership = \DB::table('memberships')
        //                 ->where('user_id', $user->id)
        //                 ->where('membership_status', 'Active')
        //                 ->whereDate('membership_start_date', '<=', now())
        //                 ->whereDate('membership_expiry_date', '>=', now())
        //                 ->first();
    
        // if (!$membership) {
        //     return redirect()->back()->with('error', 'No active membership found. Please subscribe or renew your plan.');
        // }
    
        // Check credentials
        if (Auth::attempt(['personalEmail' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }

    }


}

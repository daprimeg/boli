<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function billingplan()
    {
    
        $plans = Plan::all();
        $membership = Membership::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();

        return view('user.profile.billingplans', compact('membership'));

    }

     public function subscriptions()
    {
    
        $plans = Plan::all();
        $membership = Membership::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();

      

        return view('user.dashboard.subscriptions', compact('membership','plans'));

    }


}

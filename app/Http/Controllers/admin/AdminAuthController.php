<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Auctions;
use App\Models\Auction;
use App\Models\AuctionPlatform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
  
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'personalEmail' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('personalEmail', $credentials['personalEmail'])->where('user_type', 1)->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid credentials or unauthorized access');
    }

    public function dashboard(Request $request)
    {
          
 
        return view('admin.dashboard.dashboard',[]);
    
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('/admin')->with('message', 'Logged out successfully');
    }

  
    

}

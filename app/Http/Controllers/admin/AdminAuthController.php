<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Auctions;
use App\Models\Auction;
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
          
        if (Auth::check() && Auth::user()->user_type == 1) {

            if ($request->ajax()) {


            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;
            
            
         $query = Auctions::leftJoin('auction_platform', 'auction_platform.id', '=', 'auctions.platform_id')

         ;

         $totalData = clone $query;

            $data = $query->select(
                    'auction_platform.name AS auction_platform_name',
                     DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.auction_id = auctions.id) as car_count'),


                  

            )
            // ->orderBy('created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($auctions) {
                  return [
                      $auctions->auction_platform_name,
                      $auctions->car_count,
                      $auctions->remaining ?? 'N/A',
                      $auctions->lots ?? 'N/A',
              
                    //   $Vehicle->fuel_type,
                    //   $Vehicle->mileage,
                    //   $Vehicle->transmission,
                    //   $Vehicle->cc,
                    
                    //  '<a href="' .URL::to('admin/vehicles/edit/'.$Vehicle->id). '" class="btn btn-sm btn-warning">Edit</a>',
                    //  '<a href="' .URL::to('admin/vehicles/delete/'.$Vehicle->id). '" class="btn btn-sm btn-danger">Delete</a>',
                  ];
              });

    
                return  [
                    "data" => $data
                ];
        }

                  

     
         

            $totalVehicles = DB::table('vehicles')->count();
            $totalAuctions = DB::table('auctions')->count();
            $liveAuctions = DB::table('auctions')
            ->where('status', 'live') // adjust if needed
            ->where('auction_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->count();
            $inProgressAuctions = DB::table('auctions')
            ->where('auction_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->count();
            $inProgressVehicles = DB::table('vehicles')
            ->join('auctions', 'vehicles.auction_id', '=', 'auctions.id')
            ->where('auctions.auction_date', '<=', Carbon::now())
            ->where('auctions.end_date', '>=', Carbon::now())
            ->count();
            return view('admin.dashboard' , compact('inProgressVehicles','totalVehicles', 'totalAuctions','inProgressAuctions', 'liveAuctions'));
    
 }
        return redirect('/admin')->with('error', 'Access denied');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('/admin')->with('message', 'Logged out successfully');
    }

        public function profile()
    {
        $alerts = Alert::with('user')->get(); // fetch all alerts for all users
    
        return view('user.profile.userprofile', compact('alerts'));
    }

}

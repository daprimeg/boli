<?php
namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auction;
use App\Models\Membership;
use App\Models\Plan;
use App\Models\UserLogin;
use App\Models\UserDevice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class ProfileSettingController extends Controller
{


    
    public function userProfile()
    {
        $alerts = Alert::with('user')->get(); // fetch all alerts for all users
    
        return view('user.account-setting.userprofile', compact('alerts'));
    }
    
    

    // Show the profile form
    public function profile(Request $request)
    {   

         $user = Auth::user();

        if($request->isMethod('post')) {

               $data = $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'organization' => 'required|string|max:255',
                'phoneNumber' => 'required|string|max:255',
                'companyAddress1' => 'required|string|max:255',
                'companyAddress2' => 'required|string|max:255',
                'townCity' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'zipCode' => 'required|string|max:10',
                'telephone' => 'required|string|max:255',
                'website' => 'required|string|max:255',
                'businessEmail' => 'required|string|email|max:255|unique:users,businessEmail,' . $user->id,
                'motorTradeInsurance' => 'required|string|max:255',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:800',
            ]);

    
            // Save all data to user model
            $user->update([
                'firstName' => $data['firstName'],
                'surname' => $data['lastName'],
                'title' => $data['title'],
                'jobTitle' => $data['organization'],
                'phone' => $data['phoneNumber'],
                'companyAddress1' => $data['companyAddress1'],
                'companyAddress2' => $data['companyAddress2'],
                'townCity' => $data['townCity'],
                'country' => $data['country'],
                'postcode' => $data['zipCode'],
                'telephone' => $data['telephone'],
                'website' => $data['website'],
                'businessEmail' => $data['businessEmail'],
                'motorTradeInsurance' => $data['motorTradeInsurance'], 
            ]);


            if ($request->file('avatar')) {
                // Remove existing thumbnail if it exists
                if ($user->avatar && file_exists(public_path('uploads/' . $user->avatar))) {
                    unlink(public_path('uploads/' . $user->avatar));
                }
                $fileName = time() . '__ff__' . $request->file('avatar')->getClientOriginalName();
                $filePath = public_path('uploads/avatar');
                $request->file('avatar')->move($filePath, $fileName);
                $user->avatar = $fileName;
                $user->save();
            }

            return back()->with('success','Profile Updated...');

        }


        return view('user.account-setting.profile', compact('user'));
    }


    public function changePassword(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {

            $request->validate([
                'currentPassword' => 'required',
                'newPassword' => 'required|min:8|confirmed',
            ]);

            if (!Hash::check($request->currentPassword, $user->password)) {
                return back()->withErrors(['currentPassword' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->newPassword);
            $user->save();

            return back()->with('success', 'Password changed successfully.');
        }

        $userDevices = UserDevice::where('user_id', $user->id)
                        ->orderByDesc('logged_in_at')
                        ->limit(10)
                        ->get();

        return view('user.account-setting.changePassword', compact('user', 'userDevices'));
    }



    public function billing(Request $request)
    {

        $user = Auth::user();

        $plans = Plan::all();
        $membership = Membership::where('user_id',$user->id)
        ->orderBy('created_at','desc')
        ->get();

        $current = Membership::where('user_id',$user->id)
        ->where('membership_status', 'Active')
        ->whereDate('membership_start_date', '<=', now())
        ->whereDate('membership_expiry_date', '>=', now())
        ->first();
    
        return view('user.account-setting.billing', compact('user','membership','plans','current'));
    }

    
    public function editSecuritySettings()
    {
        $userLoginLogs = UserLogin::where('user_id', auth()->id())
                            ->orderByDesc('login_at')
                            ->limit(10)
                            ->get();

        return view('user.profile.changepassword', compact('userLoginLogs'));
    }











}

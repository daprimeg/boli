<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Auction; 
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DataTables;



class AuthController extends Controller
{
    // Registration
public function register(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'companyName' => 'required|string|max:255',
        'companyAddress1' => 'required|string|max:255',
        'companyAddress2' => 'nullable|string|max:255',
        'townCity' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'postcode' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'businessType' => 'required|string|max:255',
        'companyReg' => 'nullable|string|max:255',
        'website' => 'nullable|url',
        'businessEmail' => 'required|string|email|max:255|unique:users',
        'motorTradeInsurance' => 'nullable|string|max:255',
        'vatNumber' => 'nullable|string|max:255',
        'firstName' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'jobTitle' => 'nullable|string|max:255',
        'phone' => 'required|string|max:255',
        'personalEmail' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'uploadID' => 'nullable|file|mimes:jpg,png,pdf|max:4096',
        'motorTradeProof' => 'nullable|file|mimes:jpg,png,pdf|max:4096',
        'addressProof' => 'nullable|file|mimes:jpg,png,pdf|max:4096',
    ]);

    // Handle file uploads
    $uploadID = $request->file('uploadID') ? $request->file('uploadID')->store('uploads') : null;
    $motorTradeProof = $request->file('motorTradeProof') ? $request->file('motorTradeProof')->store('uploads') : null;
    $addressProof = $request->file('addressProof') ? $request->file('addressProof')->store('uploads') : null;

    try {
        // Create the user
        $user = User::create([
            'companyName' => $validated['companyName'],
            'companyAddress1' => $validated['companyAddress1'],
            'companyAddress2' => $validated['companyAddress2'],
            'townCity' => $validated['townCity'],
            'country' => $validated['country'],
            'postcode' => $validated['postcode'],
            'telephone' => $validated['telephone'],
            'businessType' => $validated['businessType'],
            'companyReg' => $validated['companyReg'],
            'website' => $validated['website'],
            'businessEmail' => $validated['businessEmail'],
            'motorTradeInsurance' => $validated['motorTradeInsurance'],
            'vatNumber' => $validated['vatNumber'],
            'firstName' => $validated['firstName'],
            'surname' => $validated['surname'],
            'title' => $validated['title'],
            'jobTitle' => $validated['jobTitle'],
            'phone' => $validated['phone'],
            'personalEmail' => $validated['personalEmail'],
            'password' => Hash::make($validated['password']),
            'uploadID' => $uploadID,
            'motorTradeProof' => $motorTradeProof,
            'addressProof' => $addressProof,
        ]);

        // Auto-login the user
        Auth::login($user);

        $planId = $request->query('plan');

        // Redirect to checkout page
        return redirect()->route('user.checkout.index', ['plan' => $planId])->with('success', 'Registration successful. Please complete your membership.');

    } catch (\Exception $e) {
    return redirect()->back()
        ->withInput()
        ->withErrors(['error' => $e->getMessage()]);
}
}

    

    // Login

     public function loginform(Request $request)
    {

       return view('auth.login');

    }


    public function login(Request $request)
    {
        
        $request->validate([
            'personalEmail' => 'required|email',
            'password' => 'required|string',
        ]);

        // Find the user with personalEmail and user_type = 0
        $user = User::where('personalEmail', $request->personalEmail)
                    ->where('user_type', 0)
                    ->first();

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
        if (Auth::attempt(['personalEmail' => $request->personalEmail, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }

    }





    
    
    
    
    






}

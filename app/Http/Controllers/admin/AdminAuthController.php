<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials or unauthorized access');
    }

    public function dashboard()
    {
        if (Auth::check() && Auth::user()->user_type == 1) {
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login.form')->with('error', 'Access denied');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login.form')->with('message', 'Logged out successfully');
    }
}

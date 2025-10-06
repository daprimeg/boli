<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

      
            $user = User::where('personalEmail', $googleUser->getEmail())->first();

            if (!$user) {
              
                $user = User::create([
                    'personalEmail' => $googleUser->getEmail(),
                    'firstName' => $googleUser->user['given_name'] ?? '',
                    'surname' => $googleUser->user['family_name'] ?? '',
                    'avatar' => $googleUser->getAvatar(),
                    'password' => Hash::make(uniqid()), 
                    'status' => 1,
                ]);
            }

       
            Auth::login($user);

            return redirect('/dashboard'); 
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed. Please try again.');
        }
    }
}

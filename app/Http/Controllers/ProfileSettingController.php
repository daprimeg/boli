<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auction; 
use App\Models\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class ProfileSettingController extends Controller
{
    // Show the profile form
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.profilesetting', compact('user'));
    }

    // Handle form submission
    public function update(Request $request)
{
    $user = Auth::user();

    $data = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'organization' => 'nullable|string|max:255',
        'phoneNumber' => 'nullable|string|max:255',
        'companyAddress1' => 'nullable|string|max:255',
        'companyAddress2' => 'nullable|string|max:255',
        'townCity' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'zipCode' => 'nullable|string|max:10',
        'telephone' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',
        'businessEmail' => 'nullable|string|email|max:255',
        'motorTradeInsurance' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:800', // max 800 KB
    ]);

    // Handle avatar upload
    if ($request->hasFile('avatar')) {
        // Delete old one if exists
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $data['avatar'] = $avatarPath;
    }

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
        'avatar' => $data['avatar'] ?? $user->avatar, // Keep old if not changed
    ]);

    return back()->with('success', 'Profile updated successfully.');
}
public function editSecuritySettings()
{
    $userLoginLogs = UserLogin::where('user_id', auth()->id())
                        ->orderByDesc('login_at')
                        ->limit(10)
                        ->get();

    return view('user.profile.changepassword', compact('userLoginLogs'));
}

public function changePassword(Request $request)
{
    $request->validate([
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->currentPassword, $user->password)) {
        return back()->withErrors(['currentPassword' => 'Current password is incorrect.']);
    }

    $user->password = Hash::make($request->newPassword);
    $user->save();

    return back()->with('success', 'Password changed successfully.');
}









}

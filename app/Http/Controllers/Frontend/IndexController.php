<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    use HasProfilePhoto;
    public function index()
    {
        return view('frontend.index');
    } //end method

    public function logout(Request $request)
    {
        auth()->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect('/login')->with('success', 'User Logout Successfully');
    } //end method

    public function userProfile()
    {
        $user = auth()->user();
        return view('frontend.profile.user_profile', compact('user'));
    } //end method

    public function userProfileStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);


        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // if ($request->file('profile_photo')) {
        //     $file = $request->file('profile_photo');
        //     @unlink(public_path('upload/user_images/' . $data->profile_photo));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/user_images'), $filename);
        //     $data['profile_photo'] = $filename;
        // }
        if ($request->hasFile('profile_photo_path')) {
            $user->updateProfilePhoto($request->file('profile_photo_path'));
        }
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User Profile Updated Successfully');
    } //end method

    public function userChangePassword()
    {
        $user = auth()->user();
        return view('frontend.profile.change_password', compact('user'));
    } //end method

    public function userUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout')->with('success', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'sorry! Your current password does not match');
        }
    } //end method
}
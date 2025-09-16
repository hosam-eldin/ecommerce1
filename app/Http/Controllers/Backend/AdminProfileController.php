<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\HasProfilePhoto;


class AdminProfileController extends Controller
{
    use HasProfilePhoto;

    public function profile($id)
    {
        $adminData = Admin::find($id);

        return view('admin.profile.profile', compact('adminData'));
    } // end method

    public function profileEdit($id)
    {
        $adminData = Admin::find($id);
        return view('admin.profile.profile_edit', compact('adminData'));
    } // end method

    public function profileStore(Request $request, $id)
    {
        $data = Admin::find($id);
        $data->name = $request->username;
        $data->email = $request->email;

        // if ($request->file('profile_photo_path')) {
        //     $file = $request->file('profile_photo_path');
        //     unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/admin_images'), $filename);
        //     $data['profile_photo_path'] = $filename;
        // }
        if ($request->hasFile('profile_photo_path')) {
            $data->updateProfilePhoto($request->file('profile_photo_path'));
        }
        $data->save();



        return redirect()->route('admin.profile', $data->id)->with('success', 'Admin Profile Updated Successfully');
    } // end method 

    public function changePassword($id)
    {

        $adminData = Admin::find($id);
        return view('admin.profile.change_password', compact('adminData'));
    } // end method 

    public function updatePassword(Request $request, $id)
    {
        //validation
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        //match the old password
        if (!Hash::check($request->oldpassword, Admin::find($id)->password)) {
            $notification = array(
                'error' => 'Old Password Does Not Match!',

            );
            return back()->with($notification);
        }

        //update the new password
        $admin = Admin::find($id);
        $admin->password = Hash::make($request->password);
        $admin->save();

        $notification = array(
            'success' => 'Password Updated Successfully',

        );
        return back()->with($notification);
    } // end method
}

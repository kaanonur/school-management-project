<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('backend.user.view_profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('backend.user.edit_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->mobile = $request->mobile;

        if ($request->file('image')) {
            $file = $request->file('image');
            if ($user->image != null) {
                @unlink(public_path('upload/user_images/'.$user->image));
            }
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $user->image = $fileName;
        }
        $user->save();

        $notification = [];
        $notification['message'] = 'User Profile Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('profile.view')->with($notification);
    }

    public function passwordEdit()
    {
        return view('backend.user.edit_password');
    }

    public function passwordUpdate(ChangePasswordRequest $request)
    {
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['allData'] = User::all();
        return view('backend.user.view_user', compact('data'));
    }

    public function create()
    {
        return view('backend.user.add_user');
    }

    public function store(UserStoreRequest $request)
    {
        User::create([
            'usertype' => $request->usertype,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $notification = [];
        $notification['message'] = 'User Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('user.view')->with($notification);
    }

    public function edit(User $user)
    {
        return view('backend.user.edit_user', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $notification = [];
        $notification['message'] = 'User Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('user.view')->with($notification);
    }

    public function destroy(User $user)
    {
        $user->delete();

        $notification = [];
        $notification['message'] = 'User Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}

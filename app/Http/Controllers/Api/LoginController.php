<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $isAuth = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        if ($isAuth){
            $user = Auth::user();
            $response['token'] = $user->createToken('login')->accessToken;

            return response()->json($response, 200);
        } else {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }
    }

    public function signup(Request $request)
    {
        if ($request->token == '123') {
            $createUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if ($createUser) {
                return response()->json('success', 201);
            } else {
                return response()->json('User not created', 400);
            }
        } else {
            return response()->json('Token not found', 404);
        }


    }

    public function logout(Request $request)
    {
//        if (Auth::check()){
//            Auth::user()->authUserToken()->delete();
//
//            return response()->json(['message' => 'success logout'], 200);
//        } else {
//            return response()->json(['message' => 'Unauthorized'], 401);
//        }
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}

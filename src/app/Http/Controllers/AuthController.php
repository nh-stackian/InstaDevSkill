<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'date_of_birth' => 'required',
            'user_name' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);

        $user = User::create(array_merge(
            $request->except('password'),
            [
                'password' => bcrypt($request->password),
            ]
        ));

        return response()->json($user);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = Auth::user();

            $token = $user->createToken($user->email.'-'.now());

            return response()->json([
                'token' => $token->accessToken,
            ]);
        } else {
            return response()->json([
               'message' => "Invalid email or password",
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
   

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Logged out successfully']);
    }
}


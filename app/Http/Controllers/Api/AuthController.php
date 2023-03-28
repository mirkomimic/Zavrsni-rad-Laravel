<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        if ($user->is_admin == true)
            $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        else
            $token = $user->createToken('auth_token', ['user'])->plainTextToken;

        return response()->json([
            'message' => 'You are now logged',
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        // $user = Auth::user();
        // $user->tokens()->delete();
        // auth()->user()->token()->delete();
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'You logged out'
        ]);
    }
}

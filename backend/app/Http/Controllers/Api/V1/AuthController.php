<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        return response()->json([
            'user' => $user
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'wrong email or password.'
            ], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken("token for {$user->name}")->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have signed out of your account.'
        ]);
    }
}

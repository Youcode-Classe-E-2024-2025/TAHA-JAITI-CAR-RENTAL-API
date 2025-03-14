<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Res;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('car')->plainTextToken;

        return Res::success([
            'token'=> $token,
            'user'=> $user
        ], 'User registered successfully');
    }
}
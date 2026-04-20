<?php

namespace App\Http\Controllers\Api;

use App\Support\ApiResponse;
use Illuminate\Http\Request;

class AuthController
{
    public function login(Request $request)
    {
        return ApiResponse::success([
            'token' => 'demo-token',
            'user' => ['name' => 'Admin', 'email' => $request->input('email')],
        ], 'Login successful');
    }

    public function logout()
    {
        return ApiResponse::success([], 'Logout successful');
    }

    public function me(Request $request)
    {
        return ApiResponse::success(['user' => $request->user()]);
    }
}

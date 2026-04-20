<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return response()->json([
            'currency' => 'USD',
            'timezone' => 'UTC',
            'cod_enabled' => true,
        ]);
    }

    public function update()
    {
        return response()->json(['message' => 'Settings updated']);
    }
}

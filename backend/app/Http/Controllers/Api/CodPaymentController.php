<?php

namespace App\Http\Controllers\Api;

use App\Support\ApiResponse;

class CodPaymentController
{
    public function index()
    {
        return ApiResponse::success(['items' => []]);
    }

    public function summary()
    {
        return ApiResponse::success([
            'waiting_collection' => 0,
            'collected' => 0,
            'transfer_pending' => 0,
            'transferred' => 0,
        ]);
    }
}

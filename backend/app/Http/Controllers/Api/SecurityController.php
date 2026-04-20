<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Support\ApiResponse;

class SecurityController
{
    public function fraudOrders()
    {
        $orders = Order::where('risk_score', '>=', 30)->latest()->paginate(20);

        return ApiResponse::success(['orders' => $orders]);
    }
}

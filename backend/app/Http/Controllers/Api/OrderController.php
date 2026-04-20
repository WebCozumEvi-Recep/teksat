<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class OrderController
{
    public function index(Request $request)
    {
        $orders = Order::with(['customer', 'domain', 'product'])
            ->latest()
            ->paginate($request->integer('per_page', 20));

        return ApiResponse::success(['orders' => $orders]);
    }

    public function show(Order $order)
    {
        return ApiResponse::success([
            'order' => $order->load(['customer', 'domain', 'product']),
        ]);
    }
}

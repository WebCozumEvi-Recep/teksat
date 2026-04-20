<?php

namespace App\Http\Controllers\Api;

use App\Models\Domain;
use App\Models\Order;
use App\Models\Product;
use App\Support\ApiResponse;

class DashboardController
{
    public function summary()
    {
        return ApiResponse::success([
            'orders' => Order::count(),
            'domains' => Domain::count(),
            'products' => Product::count(),
            'revenue' => Order::sum('total_price'),
        ]);
    }

    public function orderFlow()
    {
        return ApiResponse::success(['items' => []]);
    }

    public function domainPerformance()
    {
        return ApiResponse::success(['items' => []]);
    }

    public function recentActivities()
    {
        return ApiResponse::success(['items' => []]);
    }
}

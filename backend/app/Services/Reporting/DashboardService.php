<?php

namespace App\Services\Reporting;

use App\Models\Domain;
use App\Models\Order;
use App\Models\Shipment;

class DashboardService
{
    public function stats(): array
    {
        return [
            'orders_today' => Order::whereDate('created_at', today())->count(),
            'revenue_today' => (float) Order::whereDate('created_at', today())->sum('total_amount'),
            'active_domains' => Domain::where('is_active', true)->count(),
            'in_transit_shipments' => Shipment::where('status', 'in_transit')->count(),
        ];
    }
}

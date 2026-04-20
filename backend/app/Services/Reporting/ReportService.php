<?php

namespace App\Services\Reporting;

use App\Models\DomainDailyStat;
use App\Models\Order;

class ReportService
{
    public function overview(): array
    {
        return [
            'orders' => Order::count(),
            'confirmed_orders' => Order::where('status', 'confirmed')->count(),
            'delivered_orders' => Order::where('status', 'delivered')->count(),
            'cod_collected' => (float) Order::where('payment_status', 'collected')->sum('total_amount'),
        ];
    }

    public function domainPerformance(): array
    {
        return DomainDailyStat::query()
            ->select(['domain_id', 'date', 'visits', 'orders', 'revenue'])
            ->latest('date')
            ->limit(30)
            ->get()
            ->toArray();
    }
}

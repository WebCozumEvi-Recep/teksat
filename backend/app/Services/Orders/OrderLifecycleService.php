<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Models\OrderStatusLog;
use App\Models\User;

class OrderLifecycleService
{
    public function transition(Order $order, string $newStatus, ?string $notes, ?User $actor): void
    {
        $oldStatus = $order->status;

        $order->update(['status' => $newStatus]);

        OrderStatusLog::create([
            'order_id' => $order->id,
            'from_status' => $oldStatus,
            'to_status' => $newStatus,
            'notes' => $notes,
            'changed_by' => $actor?->id,
        ]);
    }
}

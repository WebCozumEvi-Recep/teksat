<?php

namespace App\Services\Fraud;

use App\Models\BlacklistEntry;
use App\Models\Order;

class FraudDetectionService
{
    public function score(Order $order): array
    {
        $score = 0;
        $signals = [];

        if (BlacklistEntry::query()->where('type', 'phone')->where('value', $order->customer_phone)->exists()) {
            $score += 60;
            $signals[] = 'phone_blacklisted';
        }

        if ($order->total_amount > 500) {
            $score += 25;
            $signals[] = 'high_order_amount';
        }

        if ($order->is_first_order) {
            $score += 15;
            $signals[] = 'first_order';
        }

        return [
            'score' => min($score, 100),
            'risk_level' => $score >= 70 ? 'high' : ($score >= 40 ? 'medium' : 'low'),
            'signals' => $signals,
        ];
    }
}

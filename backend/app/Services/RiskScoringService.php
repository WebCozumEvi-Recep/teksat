<?php

namespace App\Services;

use App\Enums\RiskLevel;
use App\Models\BlacklistEntry;
use App\Models\Order;
use Carbon\Carbon;

class RiskScoringService
{
    public function score(string $phone, string $ipAddress): array
    {
        $score = 0;
        $reasons = [];

        $phoneOrderCount = Order::whereHas('customer', fn ($query) => $query->where('phone', $phone))
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->count();
        if ($phoneOrderCount >= 3) {
            $score += 25;
            $reasons[] = 'Same phone has 3+ orders in 24h';
        }

        $ipOrderCount = Order::where('ip_address', $ipAddress)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->count();
        if ($ipOrderCount >= 10) {
            $score += 20;
            $reasons[] = 'Same IP has 10+ orders in 24h';
        }

        if (BlacklistEntry::where('type', 'phone')->where('value', $phone)->where('is_active', true)->exists()) {
            $score += 100;
            $reasons[] = 'Phone is blacklisted';
        }

        if (BlacklistEntry::where('type', 'ip')->where('value', $ipAddress)->where('is_active', true)->exists()) {
            $score += 100;
            $reasons[] = 'IP is blacklisted';
        }

        $level = match (true) {
            $score >= 60 => RiskLevel::HIGH,
            $score >= 30 => RiskLevel::MEDIUM,
            default => RiskLevel::LOW,
        };

        return compact('score', 'level', 'reasons');
    }
}

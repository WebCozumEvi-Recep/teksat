<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderCreationService
{
    public function __construct(
        private readonly DomainResolverService $domainResolverService,
        private readonly RiskScoringService $riskScoringService,
    ) {
    }

    public function create(array $payload, string $ipAddress, string $userAgent): Order
    {
        $domain = $this->domainResolverService->resolve($payload['domain']);

        return DB::transaction(function () use ($payload, $domain, $ipAddress, $userAgent): Order {
            $customer = Customer::firstOrCreate(
                ['phone' => $payload['phone']],
                [
                    'full_name' => $payload['full_name'],
                    'city' => $payload['city'],
                    'district' => $payload['district'],
                    'address' => $payload['address'],
                ]
            );

            $risk = $this->riskScoringService->score($payload['phone'], $ipAddress);
            $unitPrice = $domain->product->cod_price;

            return Order::create([
                'order_no' => 'ORD-' . Str::upper(Str::random(8)),
                'domain_id' => $domain->id,
                'product_id' => $payload['product_id'],
                'customer_id' => $customer->id,
                'quantity' => $payload['quantity'],
                'unit_price' => $unitPrice,
                'shipping_price' => 0,
                'total_price' => $payload['quantity'] * $unitPrice,
                'status' => OrderStatus::NEW,
                'risk_score' => $risk['score'],
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
            ]);
        });
    }
}

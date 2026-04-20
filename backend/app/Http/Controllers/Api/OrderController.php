<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Orders\OrderLifecycleService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private readonly OrderLifecycleService $service)
    {
    }

    public function index(Request $request)
    {
        return Order::with(['customer', 'domain', 'shipment'])
            ->when($request->status, fn ($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate();
    }

    public function show(Order $order)
    {
        return $order->load(['items', 'customer', 'shipment', 'statusLogs']);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $this->service->transition($order, $data['status'], $data['notes'] ?? null, $request->user());

        return $order->refresh();
    }
}

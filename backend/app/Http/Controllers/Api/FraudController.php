<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlacklistEntry;
use App\Models\RiskOrder;
use Illuminate\Http\Request;

class FraudController extends Controller
{
    public function riskOrders()
    {
        return RiskOrder::with('order')->latest()->paginate();
    }

    public function storeBlacklist(Request $request)
    {
        return BlacklistEntry::create($request->validate([
            'type' => ['required', 'in:phone,address,ip,email'],
            'value' => ['required', 'string', 'max:255'],
            'reason' => ['nullable', 'string'],
        ]));
    }
}

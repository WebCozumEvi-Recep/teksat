<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CodCollection;
use App\Models\Shipment;
use App\Services\Logistics\ReconciliationService;
use Illuminate\Http\Request;

class LogisticsController extends Controller
{
    public function __construct(private readonly ReconciliationService $service)
    {
    }

    public function shipments()
    {
        return Shipment::with(['order', 'cargoCompany'])->latest()->paginate();
    }

    public function updateShipmentStatus(Request $request, Shipment $shipment)
    {
        $shipment->update($request->validate([
            'status' => ['required', 'string'],
            'last_event_at' => ['nullable', 'date'],
        ]));

        return $shipment;
    }

    public function codCollections()
    {
        return CodCollection::with('shipment')->latest()->paginate();
    }

    public function createReconciliationBatch(Request $request)
    {
        return response()->json($this->service->createBatch(
            $request->date('from_date'),
            $request->date('to_date')
        ));
    }
}

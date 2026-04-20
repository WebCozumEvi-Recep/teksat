<?php

namespace App\Services\Logistics;

use App\Models\CodCollection;
use App\Models\ReconciliationBatch;
use Illuminate\Support\Carbon;

class ReconciliationService
{
    public function createBatch(?Carbon $from, ?Carbon $to): ReconciliationBatch
    {
        $collections = CodCollection::query()
            ->when($from, fn ($q) => $q->whereDate('collected_at', '>=', $from))
            ->when($to, fn ($q) => $q->whereDate('collected_at', '<=', $to))
            ->whereNull('reconciliation_batch_id')
            ->get();

        $batch = ReconciliationBatch::create([
            'batch_no' => 'RB-' . now()->format('YmdHis'),
            'from_date' => $from,
            'to_date' => $to,
            'total_orders' => $collections->count(),
            'total_amount' => $collections->sum('amount'),
            'status' => 'pending',
        ]);

        CodCollection::whereIn('id', $collections->pluck('id'))
            ->update(['reconciliation_batch_id' => $batch->id]);

        return $batch;
    }
}

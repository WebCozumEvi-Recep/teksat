<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodCollection extends Model
{
    protected $fillable = ['shipment_id', 'reconciliation_batch_id', 'amount', 'collected_at', 'status'];
    protected $casts = ['collected_at' => 'datetime'];

    public function shipment() { return $this->belongsTo(Shipment::class); }
}

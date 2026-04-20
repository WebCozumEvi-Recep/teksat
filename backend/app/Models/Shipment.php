<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['order_id', 'cargo_company_id', 'tracking_no', 'status', 'last_event_at', 'shipped_at', 'delivered_at'];
    protected $casts = ['last_event_at' => 'datetime', 'shipped_at' => 'datetime', 'delivered_at' => 'datetime'];

    public function order() { return $this->belongsTo(Order::class); }
    public function cargoCompany() { return $this->belongsTo(CargoCompany::class); }
}

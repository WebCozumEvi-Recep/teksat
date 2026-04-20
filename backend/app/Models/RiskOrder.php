<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskOrder extends Model
{
    protected $casts = ['signals' => 'array'];
    protected $fillable = ['order_id', 'score', 'risk_level', 'signals', 'status'];

    public function order() { return $this->belongsTo(Order::class); }
}

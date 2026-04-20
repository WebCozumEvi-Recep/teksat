<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['domain_id', 'customer_id', 'order_no', 'status', 'payment_status', 'total_amount', 'customer_phone', 'is_first_order'];

    public function customer() { return $this->belongsTo(Customer::class); }
    public function domain() { return $this->belongsTo(Domain::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
    public function shipment() { return $this->hasOne(Shipment::class); }
    public function statusLogs() { return $this->hasMany(OrderStatusLog::class); }
}

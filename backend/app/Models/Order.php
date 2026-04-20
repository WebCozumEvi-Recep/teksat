<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'domain_id',
        'product_id',
        'customer_id',
        'quantity',
        'unit_price',
        'shipping_price',
        'total_price',
        'status',
        'risk_score',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}

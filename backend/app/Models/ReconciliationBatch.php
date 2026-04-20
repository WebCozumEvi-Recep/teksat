<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReconciliationBatch extends Model
{
    protected $fillable = ['batch_no', 'from_date', 'to_date', 'total_orders', 'total_amount', 'status'];
    protected $casts = ['from_date' => 'date', 'to_date' => 'date'];
}

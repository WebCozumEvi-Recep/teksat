<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainDailyStat extends Model
{
    protected $fillable = ['domain_id', 'date', 'visits', 'orders', 'revenue', 'conversion_rate'];
    protected $casts = ['date' => 'date'];
}

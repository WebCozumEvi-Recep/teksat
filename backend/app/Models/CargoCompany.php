<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargoCompany extends Model
{
    protected $fillable = ['name', 'code', 'tracking_url', 'is_active'];
}

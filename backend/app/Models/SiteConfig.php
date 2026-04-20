<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    protected $casts = ['config' => 'array'];
    protected $fillable = ['domain_id', 'config'];
}

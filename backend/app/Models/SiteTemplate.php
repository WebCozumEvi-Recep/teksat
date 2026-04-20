<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteTemplate extends Model
{
    protected $fillable = ['name', 'slug', 'view_path', 'is_active'];
}

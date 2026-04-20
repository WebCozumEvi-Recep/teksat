<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlacklistEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'reason',
        'source',
        'is_active',
    ];
}

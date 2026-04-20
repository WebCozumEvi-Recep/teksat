<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $casts = ['meta' => 'array'];
    protected $fillable = ['user_id', 'action', 'subject_type', 'subject_id', 'meta'];
}

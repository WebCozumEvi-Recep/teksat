<?php

namespace App\Models;

use App\Enums\DomainStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'product_id',
        'template_id',
        'status',
        'ssl_status',
        'tracking_code',
        'published_at',
    ];

    protected $casts = [
        'status' => DomainStatus::class,
        'published_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function siteConfig(): HasOne
    {
        return $this->hasOne(SiteConfig::class);
    }
}

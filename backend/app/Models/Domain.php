<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['domain', 'product_id', 'site_template_id', 'is_active'];

    public function product() { return $this->belongsTo(Product::class); }
    public function template() { return $this->belongsTo(SiteTemplate::class, 'site_template_id'); }
    public function config() { return $this->hasOne(SiteConfig::class); }
}

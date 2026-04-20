<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'product_id',
        'site_title',
        'hero_title',
        'hero_subtitle',
        'primary_color',
        'button_text',
        'sections_json',
        'testimonials_json',
        'faq_json',
    ];

    protected $casts = [
        'sections_json' => 'array',
        'testimonials_json' => 'array',
        'faq_json' => 'array',
    ];
}

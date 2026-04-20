<?php

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\Product;
use App\Models\SiteConfig;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::create([
            'name' => 'Akıllı Postür Korsesi',
            'slug' => 'akilli-postur-korsesi',
            'sku' => 'APS-001',
            'status' => 'active',
            'price' => 899,
            'cod_price' => 949,
            'stock' => 500,
            'description' => 'Tek ürün MVP demo datası.',
        ]);

        $domain = Domain::create([
            'domain' => 'demo-urun.local',
            'product_id' => $product->id,
            'status' => 'active',
            'ssl_status' => 'active',
        ]);

        SiteConfig::create([
            'domain_id' => $domain->id,
            'product_id' => $product->id,
            'site_title' => 'Postür Korsesi Resmi Satış',
            'hero_title' => 'Duruşunu Hemen Düzelt',
            'hero_subtitle' => 'Kapıda ödeme ile güvenli sipariş',
            'primary_color' => '#0B7A33',
            'button_text' => 'Hemen Sipariş Ver',
        ]);
    }
}

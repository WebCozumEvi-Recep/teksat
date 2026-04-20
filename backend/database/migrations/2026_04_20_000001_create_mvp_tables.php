<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('status')->default('active');
            $table->decimal('price', 12, 2);
            $table->decimal('cod_price', 12, 2);
            $table->integer('stock')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('domains', function (Blueprint $table): void {
            $table->id();
            $table->string('domain')->unique();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('template_id')->nullable();
            $table->string('status')->default('testing');
            $table->string('ssl_status')->default('pending');
            $table->string('tracking_code')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('site_configs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('domain_id')->unique()->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('site_title')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('primary_color')->default('#0B7A33');
            $table->string('button_text')->default('Sipariş Ver');
            $table->json('sections_json')->nullable();
            $table->json('testimonials_json')->nullable();
            $table->json('faq_json')->nullable();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table): void {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->index();
            $table->string('alt_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city');
            $table->string('district');
            $table->text('address');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->string('order_no')->unique();
            $table->foreignId('domain_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('shipping_price', 12, 2)->default(0);
            $table->decimal('total_price', 12, 2);
            $table->string('status')->default('new');
            $table->unsignedInteger('risk_score')->default(0);
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });

        Schema::create('blacklist_entries', function (Blueprint $table): void {
            $table->id();
            $table->string('type');
            $table->string('value')->index();
            $table->string('reason')->nullable();
            $table->string('source')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blacklist_entries');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('site_configs');
        Schema::dropIfExists('domains');
        Schema::dropIfExists('products');
    }
};

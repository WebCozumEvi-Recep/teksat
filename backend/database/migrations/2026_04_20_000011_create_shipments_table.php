<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->unique()->constrained()->cascadeOnDelete();
            $table->foreignId('cargo_company_id')->nullable()->constrained()->nullOnDelete();
            $table->string('tracking_no')->nullable()->index();
            $table->string('status')->default('pending')->index();
            $table->timestamp('last_event_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('shipments'); }
};

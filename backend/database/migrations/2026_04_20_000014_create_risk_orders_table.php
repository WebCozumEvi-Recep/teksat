<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('risk_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->unique()->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('score');
            $table->string('risk_level')->index();
            $table->json('signals')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('risk_orders'); }
};

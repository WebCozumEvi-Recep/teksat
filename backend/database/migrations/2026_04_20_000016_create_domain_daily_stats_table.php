<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('domain_daily_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id')->constrained()->cascadeOnDelete();
            $table->date('date')->index();
            $table->unsignedInteger('visits')->default(0);
            $table->unsignedInteger('orders')->default(0);
            $table->decimal('revenue', 12, 2)->default(0);
            $table->decimal('conversion_rate', 5, 2)->default(0);
            $table->timestamps();
            $table->unique(['domain_id', 'date']);
        });
    }

    public function down(): void { Schema::dropIfExists('domain_daily_stats'); }
};

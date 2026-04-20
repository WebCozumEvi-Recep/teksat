<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blacklist_entries', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('value')->index();
            $table->string('reason')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['type', 'value']);
        });
    }

    public function down(): void { Schema::dropIfExists('blacklist_entries'); }
};

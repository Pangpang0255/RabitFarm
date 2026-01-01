<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feeding_patterns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('pattern_name'); // Nama pola: "Pola Nutrisi Seimbang", "Pola Hemat", dll
            $table->enum('rabbit_category', ['all', 'dewasa', 'anak', 'indukan', 'pejantan'])->default('all');
            $table->json('daily_schedule'); // JSON: [{day: 1, feeds: [{time: "07:00", type: "Pelet", quantity: 0.15}, ...]}, ...]
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeding_patterns');
    }
};

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
        Schema::create('rabbits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('code')->unique(); // ID-F024, ID-M012, etc
            $table->string('name');
            $table->enum('gender', ['jantan', 'betina']);
            $table->enum('status', ['produktif', 'sapihan', 'anak', 'afkir'])->default('produktif');
            $table->string('breed'); // Rex, New Zealand, dll
            $table->date('birth_date');
            $table->decimal('weight', 8, 2)->nullable();
            $table->enum('health_status', ['sehat', 'sakit', 'karantina'])->default('sehat');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rabbits');
    }
};

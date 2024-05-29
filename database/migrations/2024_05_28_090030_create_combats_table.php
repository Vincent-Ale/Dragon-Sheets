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
        Schema::create('combats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters');
            $table->integer('health_point')->default(0);
            $table->integer('armor_class')->default(0);
            $table->integer('passive_perception')->default(0);
            $table->integer('speed')->default(0);
            $table->integer('initiative')->default(0);
            $table->integer('spell_save_dc')->default(0);
            $table->integer('spell_bonus')->default(0);
            $table->integer('dices_of_life')->default(0);
            $table->integer('proficiency')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combats');
    }
};

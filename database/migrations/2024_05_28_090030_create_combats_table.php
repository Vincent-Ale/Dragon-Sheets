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
            $table->integer('health_point');
            $table->integer('armor_class');
            $table->integer('passive_perception');
            $table->integer('speed');
            $table->integer('initiative');
            $table->integer('spell_save_dc');
            $table->integer('spell_bonus');
            $table->integer('dices_of_life');
            $table->integer('proficiency');
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

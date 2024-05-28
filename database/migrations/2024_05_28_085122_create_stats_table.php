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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters');
            $table->integer('strenght');
            $table->integer('dexterity');
            $table->integer('intelligence');
            $table->integer('constitution');
            $table->integer('charisma');
            $table->integer('wisdom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};

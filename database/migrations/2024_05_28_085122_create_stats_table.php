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
            $table->integer('strenght')->default(0);
            $table->integer('dexterity')->default(0);
            $table->integer('intelligence')->default(0);
            $table->integer('constitution')->default(0);
            $table->integer('charisma')->default(0);
            $table->integer('wisdom')->default(0);
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

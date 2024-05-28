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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('character_id');
            $table->integer('acrobatics');
            $table->integer('arcana');
            $table->integer('athletics');
            $table->integer('discretion');
            $table->integer('animal_handling');
            $table->integer('sleight_of_hand');
            $table->integer('history');
            $table->integer('intimidation');
            $table->integer('investigation');
            $table->integer('medicine');
            $table->integer('nature');
            $table->integer('perception');
            $table->integer('insight');
            $table->integer('persuasion');
            $table->integer('religion');
            $table->integer('performance');
            $table->integer('survival');
            $table->integer('deception');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};

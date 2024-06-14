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
        Schema::table('users', function (Blueprint $table) {
            $table->text('settings_color_theme')
                ->after('updated_at')
                ->nullable();

            $table->boolean('settings_virtual_dices')
                ->after('settings_color_theme')
                ->default(false);

            $table->boolean('settings_musical_theme')
                ->after('settings_virtual_dices')
                ->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'settings_color_theme',
                'settings_virtual_dices',
                'settings_musical_theme'
            ]);
        });
    }
};

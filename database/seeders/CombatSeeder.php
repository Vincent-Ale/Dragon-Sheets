<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CombatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('combats')->insert([
            [
                'character_id' => 10,
                'health_point' => 100,
                'armor_class' => 15,
                'passive_perception' => 12,
                'speed' => 30,
                'initiative' => 2,
                'spell_save_dc' => 14,
                'spell_bonus' => 5,
                'dices_of_life' => 3,
                'proficiency' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'character_id' => 11,
                'health_point' => 120,
                'armor_class' => 16,
                'passive_perception' => 14,
                'speed' => 25,
                'initiative' => 3,
                'spell_save_dc' => 15,
                'spell_bonus' => 4,
                'dices_of_life' => 4,
                'proficiency' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
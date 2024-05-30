<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        // Ensure Faker is available
        $faker = Faker::create();

        // Récupérer tous les IDs de personnages
        $characterIds = DB::table('characters')->pluck('id');

        // Générer des compétences pour chaque personnage
        foreach ($characterIds as $characterId) {
            // Générer un nombre aléatoire de compétences (entre 1 et 5 par exemple)
            $numSkills = $faker->numberBetween(1, 5);

            // Insérer les compétences pour ce personnage
            for ($i = 0; $i < $numSkills; $i++) {
                DB::table('skills')->insert([
                    'character_id' => $characterId,
                    'name' => $faker->word,
                    'value' => $faker->numberBetween(1, 100),
                    'proficiency' => $faker->boolean,
                    'expertise' => $faker->boolean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

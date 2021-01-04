<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class TeenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 1500; $i++) {
            DB::table('teens_11_20')->insert([
                'weight' => $faker->randomFloat(1, 40, 70),
                'height' => $faker->randomFloat(1, 140.0, 185.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'fat_percentage' => $faker->randomFloat(1, 10.0, 40.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'user_id' => $faker->numberBetween(2, 10),
                'gender' => false
            ]);
            DB::table('teens_11_20')->insert([
                'weight' => $faker->randomFloat(1, 40, 60),
                'height' => $faker->randomFloat(1, 140.0, 180.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'fat_percentage' => $faker->randomFloat(1, 10.0, 40.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'user_id' => $faker->numberBetween(2, 10),
                'gender' => true
            ]);
        }
    }
}

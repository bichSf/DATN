<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class AdultSeeder extends Seeder
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
            DB::table('adults_20_60')->insert([
                'weight' => $faker->randomFloat(2, 45, 95),
                'height' => $faker->randomFloat(2, 145, 190),
                'arm_circumference' => $faker->randomFloat(1, 20.0, 30.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'fat_percentage' => $faker->randomFloat(1, 10.0, 30.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'user_id' => $faker->numberBetween(2, 10),
                'gender' => false
            ]);
            DB::table('adults_20_60')->insert([
                'weight' => $faker->randomFloat(2, 40, 68),
                'height' => $faker->randomFloat(2, 140.0, 170),
                'arm_circumference' => $faker->randomFloat(1, 20.0, 30.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'fat_percentage' => $faker->randomFloat(1, 10.0, 30.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'user_id' => $faker->numberBetween(2, 10),
                'gender' => true
            ]);
        }
    }
}

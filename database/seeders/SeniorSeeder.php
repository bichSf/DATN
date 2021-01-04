<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class SeniorSeeder extends Seeder
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
            DB::table('seniors_60_100')->insert([
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $faker->randomFloat(1, 120.0, 160.0),
                'arm_circumference' => $faker->randomFloat(1, 20.0, 30.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'knee_height' => $faker->randomFloat(1, 20.0, 50.0),
                'stomach_feet' => $faker->randomFloat(1, 30.0, 50.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'user_id' => $faker->numberBetween(2, 10),
                'gender' => false
            ]);
            DB::table('seniors_60_100')->insert([
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $faker->randomFloat(1, 120.0, 160.0),
                'arm_circumference' => $faker->randomFloat(1, 20.0, 30.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'knee_height' => $faker->randomFloat(1, 20.0, 50.0),
                'stomach_feet' => $faker->randomFloat(1, 30.0, 50.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'user_id' => $faker->numberBetween(2, 10),
                'gender' => true
            ]);
        }
    }
}

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
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3.0, $max = 13.0),
                'height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 120.0, $max = 160.0),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 20.0, $max = 30.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'knee_height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 20.0, $max = 50.0),
                'stomach_feet' => $faker->randomFloat($nbMaxDecimals = 1, $min = 30.0, $max = 50.0),
                'survey_id' => $faker->numberBetween(1, 228),
                'gender' => false
            ]);
            DB::table('seniors_60_100')->insert([
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3.0, $max = 13.0),
                'height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 120.0, $max = 160.0),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 20.0, $max = 30.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'knee_height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 20.0, $max = 50.0),
                'stomach_feet' => $faker->randomFloat($nbMaxDecimals = 1, $min = 30.0, $max = 50.0),
                'survey_id' => $faker->numberBetween(1, 228),
                'gender' => true
            ]);
        }
    }
}

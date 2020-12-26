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
        for ($i = 0; $i < 1000; $i++) {
            DB::table('adults_20_60')->insert([
                'weight' => $faker->randomFloat(2, 45, 90),
                'height' => $faker->randomFloat(2, 150, 187),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 20.0, $max = 30.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'fat_percentage' => $faker->randomFloat($nbMaxDecimals = 1, $min = 10.0, $max = 30.0),
                'survey_id' => $faker->numberBetween(1, 76),
                'gender' => false
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            DB::table('adults_20_60')->insert([
                'weight' => $faker->randomFloat(2, 40, 68),
                'height' => $faker->randomFloat(2, 140.0, $max = 170),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 20.0, $max = 30.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'fat_percentage' => $faker->randomFloat($nbMaxDecimals = 1, $min = 10.0, $max = 30.0),
                'survey_id' => $faker->numberBetween(1, 76),
                'gender' => true
            ]);
        }
    }
}

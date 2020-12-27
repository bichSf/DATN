<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class ChildrenSeeder extends Seeder
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
            DB::table('children_5_11')->insert([
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3.0, $max = 13.0),
                'height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 100.0, $max = 150.0),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 18.0, $max = 20.0),
                'head_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 30.0, $max = 40.0),
                'chest_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 50.0, $max = 70.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'survey_id' => $faker->numberBetween(1, 228),
                'gender' => false
            ]);
            DB::table('children_5_11')->insert([
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3.0, $max = 13.0),
                'height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 100.0, $max = 150.0),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 18.0, $max = 20.0),
                'head_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 30.0, $max = 40.0),
                'chest_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 50.0, $max = 70.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'survey_id' => $faker->numberBetween(1, 228),
                'gender' => true
            ]);
        }
    }
}

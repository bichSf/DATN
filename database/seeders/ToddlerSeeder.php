<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class ToddlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 500; $i++) {
            DB::table('toddlers_1_60')->insert([
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3.0, $max = 13.0),
                'length' => $faker->randomFloat($nbMaxDecimals = 1, $min = 50.0, $max = 90.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.1, $max = 0.5),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 10.0, $max = 15.0)
            ]);

            DB::table('toddlers_1_60')->insert([
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 11.0, $max = 20.0),
                'height' => $faker->randomFloat($nbMaxDecimals = 1, $min = 75.0, $max = 120.0),
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 0.8),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 12.0, $max = 18.0)
            ]);
        }
    }
}

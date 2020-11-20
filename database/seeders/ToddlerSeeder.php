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
        for ($i = 0; $i < 1000; $i++) {
            $height = $faker->randomFloat($nbMaxDecimals = 1, $min = 50.0, $max = 120.0);
            DB::table('toddlers_1_60')->insert([
                'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 3.0, $max = 13.0),
                'height' => $height,
                'is_infant' => $height < 75,
                'biceps_skinfold' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.1, $max = 0.5),
                'arm_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 10.0, $max = 15.0)
            ]);
        }
    }
}

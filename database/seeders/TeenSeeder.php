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
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $faker->randomFloat(1, 120.0, 170.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'fat_percentage' => $faker->randomFloat(1, 10.0, 40.0),
                'survey_id' => $faker->numberBetween(1, 228),
                'gender' => false
            ]);
            DB::table('teens_11_20')->insert([
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $faker->randomFloat(1, 120.0, 170.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'fat_percentage' => $faker->randomFloat(1, 10.0, 40.0),
                'survey_id' => $faker->numberBetween(1, 228),
                'gender' => true
            ]);
        }
    }
}

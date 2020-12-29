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
        for ($i = 0; $i < 1500; $i++) {
            $height = $faker->randomFloat(1, 50.0, 120.0);
            DB::table('toddlers_1_60')->insert([
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $height,
                'is_infant' => $height < 75,
                'biceps_skinfold' => $faker->randomFloat(1, 0.1, 0.5),
                'arm_circumference' => $faker->randomFloat(1, 10.0, 15.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'gender' => false
            ]);
            $height = $faker->randomFloat(1, 50.0, 120.0);
            DB::table('toddlers_1_60')->insert([
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $height,
                'is_infant' => $height < 75,
                'biceps_skinfold' => $faker->randomFloat(1,0.1, 0.5),
                'arm_circumference' => $faker->randomFloat(1, 10.0, 15.0),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'gender' => true
            ]);
        }
    }
}

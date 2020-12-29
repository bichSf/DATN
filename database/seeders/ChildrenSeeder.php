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
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $faker->randomFloat(1, 100.0, 150.0),
                'arm_circumference' => $faker->randomFloat(1, 18.0, 20.0),
                'head_circumference' => $faker->randomFloat(1, 30.0, 40.0),
                'chest_circumference' => $faker->randomFloat(1, 50.0, 70.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'gender' => false
            ]);
            DB::table('children_5_11')->insert([
                'weight' => $faker->randomFloat(1, 3.0, 13.0),
                'height' => $faker->randomFloat(1, 100.0, 150.0),
                'arm_circumference' => $faker->randomFloat(1, 18.0, 20.0),
                'head_circumference' => $faker->randomFloat(1, 30.0, 40.0),
                'chest_circumference' => $faker->randomFloat(1, 50.0, 70.0),
                'biceps_skinfold' => $faker->randomFloat(1, 0.5, 0.8),
                'survey_id' => $faker->numberBetween(1, getMaxIdSurvey()),
                'gender' => true
            ]);
        }
    }
}

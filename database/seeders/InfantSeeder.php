<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class InfantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 2000; $i++) {
            DB::table('infants_0_0')->insert([
                'weight' => $faker->randomFloat(2, 1.5, 4.5),
                'height' => $faker->randomFloat(2, 25, 40),
                'head_circumference' => $faker->randomFloat($nbMaxDecimals = 1, $min = 30.0, $max = 40.0),
                'survey_id' => $faker->numberBetween(1, 76),
                'gender' => rand(0,1) == 1,
            ]);
        }
    }
}

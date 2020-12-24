<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class SurveysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($year = 2000; $year < 2019; $year++) {
            $month = $faker->numberBetween(1, 12);
            $name = "Khảo sát dinh dưỡng tháng " . $month ."/" . $year;
            DB::table('surveys')->insert([
                'name' => $name,
                'year' => $year,
                'month' => $month,
                'area_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}

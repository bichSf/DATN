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
        for ($year = 2000; $year < 2019; $year++) {
            for ($month = 1; $month < 12; $month += 3) {
                $name = "Khảo sát dinh dưỡng tháng " . $month ."/" . $year;
                DB::table('surveys')->insert([
                    'name' => $name,
                    'year' => $year,
                    'month' => $month,
                    'area_id' => 1,
                ]);
                DB::table('surveys')->insert([
                    'name' => $name,
                    'year' => $year,
                    'month' => $month,
                    'area_id' => 2,
                ]);
                DB::table('surveys')->insert([
                    'name' => $name,
                    'year' => $year,
                    'month' => $month,
                    'area_id' => 3,
                ]);
            }
        }

    }
}

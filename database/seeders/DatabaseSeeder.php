<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            SurveysSeeder::class,
            InfantSeeder::class,
            ToddlerSeeder::class,
            ChildrenSeeder::class,
            TeenSeeder::class,
            AdultSeeder::class,
            SeniorSeeder::class,
//            CreateFunctionSeeder::class,

        ]);
    }
}

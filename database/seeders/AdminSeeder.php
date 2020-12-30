<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@123',
            'password' => Hash::make('12345678'),
            'role' => ADMIN,
            'avatar' => 'admin.jpeg',
        ]);
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name' => 'Trần Bích',
            'email' => 'tranbichbk@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => USER,
            'gender' => WOMAN,
        ]);

        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('12345678'),
                'role' => USER,
                'gender' => rand(MAN, WOMAN),
            ]);
        }
    }
}

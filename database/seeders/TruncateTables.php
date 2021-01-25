<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TruncateTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema:: disableForeignKeyConstraints();
        DB:: table('users')->truncate();
        DB:: table('districts')->truncate();
        DB:: table('provinces')->truncate();
        Schema:: enableForeignKeyConstraints();
    }
}

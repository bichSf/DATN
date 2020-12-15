<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
        CREATE OR REPLACE FUNCTION get_avg_attribute (attribute_name TEXT, table_name TEXT)
        RETURNS FLOAT
        AS $$
	    DECLARE avgAttri FLOAT;
	    query TEXT;
	    BEGIN
            query = 'SELECT AVG(' & attribute_name & ') FROM  ' & table_name;
		    RETURN avgAttri;
	    END;
	    $$
        LANGUAGE plpgsql;
        ");
        DB::statement("
        CREATE OR REPLACE VIEW zcore_weight_adults_20_60 AS
            SELECT id, weight, ((weight - get_avg_attribute('weight', 'adults_20_60')) / 3.5) as zcore
            FROM adults_20_60;
        ");
        DB::statement("
        CREATE OR REPLACE VIEW zcore_height_adults_20_60 AS
            SELECT id, height, ((height - get_avg_attribute('height', 'adults_20_60')) / 3.5) as zcore
            FROM adults_20_60;
        ");
    }
}

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
	    BEGIN
		    CASE
			    WHEN attribute_name = 'weight' AND table_name = 'infants_0_0' THEN avgAttri = (SELECT AVG(weight) FROM infants_0_0);
				WHEN attribute_name = 'height' AND table_name = 'infants_0_0' THEN avgAttri = (SELECT AVG(height) FROM infants_0_0);
				WHEN attribute_name = 'weight' AND table_name = 'toddlers_1_60' THEN avgAttri = (SELECT AVG(weight) FROM toddlers_1_60);
				WHEN attribute_name = 'height' AND table_name = 'toddlers_1_60' THEN avgAttri = (SELECT AVG(height) FROM toddlers_1_60);
				WHEN attribute_name = 'weight' AND table_name = 'children_5_11' THEN avgAttri = (SELECT AVG(weight) FROM children_5_11);
				WHEN attribute_name = 'height' AND table_name = 'children_5_11' THEN avgAttri = (SELECT AVG(height) FROM children_5_11);
				WHEN attribute_name = 'weight' AND table_name = 'teens_11_20' THEN avgAttri = (SELECT AVG(weight) FROM teens_11_20);
				WHEN attribute_name = 'height' AND table_name = 'teens_11_20' THEN avgAttri = (SELECT AVG(height) FROM teens_11_20);
				WHEN attribute_name = 'weight' AND table_name = 'adults_20_60' THEN avgAttri = (SELECT AVG(weight) FROM adults_20_60);
				WHEN attribute_name = 'height' AND table_name = 'adults_20_60' THEN avgAttri = (SELECT AVG(height) FROM adults_20_60);
				WHEN attribute_name = 'weight' AND table_name = 'seniors_60_100' THEN avgAttri = (SELECT AVG(weight) FROM seniors_60_100);
				WHEN attribute_name = 'height' AND table_name = 'seniors_60_100' THEN avgAttri = (SELECT AVG(height) FROM seniors_60_100);
		    END CASE;

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

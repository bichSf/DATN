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
        DB::statement("DROP FUNCTION IF EXISTS getavgattributeadults_20_60;");
        DB::statement("DROP FUNCTION IF EXISTS getzscoreattributeadults_20_60;");
        DB::statement("
        CREATE FUNCTION getavgattributeadults_20_60 (attri INT)
        RETURNS FLOAT
        AS $$
	    DECLARE avgAttri FLOAT;
	    BEGIN
		    CASE
			    WHEN attri = 1 THEN avgAttri = (SELECT AVG(weight) FROM adults_20_60);
			    WHEN attri = 2 THEN avgAttri = (SELECT AVG(height) FROM adults_20_60);
		    END CASE;

		    RETURN avgAttri;
	    END;
	    $$
        LANGUAGE plpgsql;
        ");
        DB::statement("
        CREATE FUNCTION getzscoreattributeadults_20_60 (idObj INT, attri INT)
        RETURNS FLOAT
	    AS $$
	    DECLARE
		    zscore FLOAT;
		    attriValue FLOAT;
		    avgAttri FLOAT;
	    BEGIN
            CASE
                WHEN attri = 1 THEN
                    BEGIN
                        attriValue = (SELECT weight FROM adults_20_60 WHERE id = idObj LIMIT 1);
                        avgAttri = (SELECT GetAvgAttributeAdults_20_60(1));
                        zscore = (attriValue - avgAttri) / 3.5;
                    END;
                WHEN attri = 2 THEN
                    BEGIN
                        attriValue = (SELECT height FROM adults_20_60 WHERE id = idObj LIMIT 1);
                        avgAttri = (SELECT GetAvgAttributeAdults_20_60(2));
                        zscore = (attriValue - avgAttri) / 3.5;
                    END;
            END CASE;

            RETURN zscore;
        END;
        $$
        LANGUAGE plpgsql;
        ");
    }
}

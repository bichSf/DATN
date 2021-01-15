<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSurveyIdColumnIntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infants_0_0', function (Blueprint $table) {
            $table->bigInteger('survey_id')->after('id')->unsigned();
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->bigInteger('survey_id')->after('id')->unsigned();
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->bigInteger('survey_id')->after('id')->unsigned();
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->bigInteger('survey_id')->after('id')->unsigned();
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->bigInteger('survey_id')->after('id')->unsigned();
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->bigInteger('survey_id')->after('id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infants_0_0', function (Blueprint $table) {
            $table->dropColumn('survey_id');
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->dropColumn('survey_id');
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->dropColumn('survey_id');
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->dropColumn('survey_id');
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->dropColumn('survey_id');
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->dropColumn('survey_id');
        });
    }
}

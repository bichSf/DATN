<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdIntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infants_0_0', function (Blueprint $table) {
            $table->bigInteger('user_id')->after('survey_id');
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->bigInteger('user_id')->after('survey_id');
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->bigInteger('user_id')->after('survey_id');
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->bigInteger('user_id')->after('survey_id');
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->bigInteger('user_id')->after('survey_id');
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->bigInteger('user_id')->after('survey_id');
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
            $table->dropColumn('user_id');
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}

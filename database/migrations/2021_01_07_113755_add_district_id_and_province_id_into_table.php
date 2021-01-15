<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistrictIdAndProvinceIdIntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infants_0_0', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->after('id')->nullable();
            $table->bigInteger('district_id')->unsigned()->after('id')->nullable();
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->after('id')->nullable();
            $table->bigInteger('district_id')->unsigned()->after('id')->nullable();
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->after('id')->nullable();
            $table->bigInteger('district_id')->unsigned()->after('id')->nullable();
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->after('id')->nullable();
            $table->bigInteger('district_id')->unsigned()->after('id')->nullable();
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->after('id')->nullable();
            $table->bigInteger('district_id')->unsigned()->after('id')->nullable();
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->after('id')->nullable();
            $table->bigInteger('district_id')->unsigned()->after('id')->nullable();
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
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
    }
}

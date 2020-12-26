<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderColumnIntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infants_0_0', function (Blueprint $table) {
            $table->boolean('gender')->default(false);
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->boolean('gender')->default(false);
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->boolean('gender')->default(false);
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->boolean('gender')->default(false);
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->boolean('gender')->default(false);
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->boolean('gender')->default(false);
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
            $table->dropColumn('gender');
        });
        Schema::table('toddlers_1_60', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
        Schema::table('children_5_11', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
        Schema::table('teens_11_20', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
        Schema::table('adults_20_60', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
        Schema::table('seniors_60_100', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
}

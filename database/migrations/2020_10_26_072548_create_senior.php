<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenior extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seniors', function (Blueprint $table) {
            $table->id();
            $table->float('weight', 4, 1);
            $table->float('height', 2, 1);
            $table->float('arm_circumference', 2, 1);
            $table->float('biceps_skinfold', 2, 1);
            $table->float('knee_height', 2, 1);
            $table->float('stomach_feet', 2, 1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senior');
    }
}

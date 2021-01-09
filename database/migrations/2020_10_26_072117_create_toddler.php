<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToddler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toddlers_1_60', function (Blueprint $table) {
            $table->id();
            $table->float('weight', 4, 1)->comment('kg');
            $table->float('height', 4, 1)->comment('cm');
            $table->boolean('is_infant')->nullable()->default(true)->comment('< 24 months');
            $table->float('biceps_skinfold', 4, 1)->comment('cm');
            $table->float('arm_circumference', 4, 1)->comment('cm');
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
        Schema::dropIfExists('toddler');
    }
}

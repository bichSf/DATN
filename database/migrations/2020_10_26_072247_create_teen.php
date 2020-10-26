<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teens', function (Blueprint $table) {
            $table->id();
            $table->float('weight', 4, 1);
            $table->float('height', 2, 1);
            $table->float('biceps_skinfold', 2, 1);
            $table->float('fat_percentage', 2, 1);
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
        Schema::dropIfExists('teen');
    }
}

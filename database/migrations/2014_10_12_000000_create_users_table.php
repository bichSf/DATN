<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40);
            $table->string('email', 40)->unique();
            $table->string('password', 20);
            $table->date('birthday')->nullable();
            $table->boolean('gender')->nullable()->comment('0 => male, 1 => female');
            $table->string('phone', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('avatar', 50)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('part', 100)->nullable();
            $table->string('branch', 100)->nullable();
            $table->tinyInteger('role')->default(USER)->comment('1 => admin, 0 => user');
            $table->text('note')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->increments('id');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('email')->nullable();
          $table->string('phone')->unique();
          $table->string('gender')->nullable();
          $table->string('birth_date')->nullable();
          $table->string('user_status')->nullable();
          $table->string('password')->nullable();

            $table->integer('city_id')->unsigned()->nullable();
          $table->integer('zone_id')->unsigned()->nullable();
          $table->integer('government_id')->unsigned()->nullable();

          $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
          $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
          $table->foreign('government_id')->references('id')->on('governments')->onDelete('set null');

          $table->rememberToken();

          $table->timestamps();
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

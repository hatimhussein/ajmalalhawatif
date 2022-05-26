<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('user_addresses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('address')->nullable();
          $table->integer('user_id')->unsigned();
          $table->integer('government_id')->unsigned()->nullable();
          $table->integer('city_id')->unsigned()->nullable();
          $table->integer('zone_id')->unsigned()->nullable();


          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
          $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
          $table->foreign('government_id')->references('id')->on('governments')->onDelete('set null');
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
        Schema::dropIfExists('user_addresses');
    }
}

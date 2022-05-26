<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name_en');
          $table->string('name_ar');

          $table->integer('city_id')->unsigned()->nullable();
          $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');

          $table->integer('government_id')->unsigned()->nullable();
          $table->foreign('government_id')->references('id')->on('governments')->onDelete('set null');

          $table->integer('country_id')->unsigned()->nullable();
          $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
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
        Schema::dropIfExists('zones');
    }
}

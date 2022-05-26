<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {

          $table->bigIncrements('id');

          $table->string('name_ar');
          $table->string('name_en');
          $table->text('desc_ar')->nullable();
          $table->text('desc_en')->nullable();
          $table->string('photo')->nullable();
            $table->string('type');
          $table->string('value');
          $table->string('viewed_levels');
          $table->date('start_date');
          $table->date('end_date');

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
        Schema::dropIfExists('offers');
    }
}

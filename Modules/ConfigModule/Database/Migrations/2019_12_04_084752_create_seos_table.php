<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('url');
          $table->string('author');
          $table->string('name_en');
          $table->string('name_ar');
          $table->text('desc_en');
          $table->text('desc_ar');
          $table->text('keys_en');
          $table->text('keys_ar');
          $table->text('script_header');
          $table->text('script_footer');

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
        Schema::dropIfExists('seos');
    }
}

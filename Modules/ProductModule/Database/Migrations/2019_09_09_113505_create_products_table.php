<?php

namespace Modules\ProductModule\Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('parent_id')->unsigned()->nullable();
          $table->bigInteger('brand_id')->unsigned()->nullable();
          $table->string('product_code');
          $table->integer('status')->deafult(0);
          $table->string('type');
          $table->string('name_ar');
          $table->string('name_en');
          $table->text('desc_ar');
          $table->text('desc_en');
          $table->string('product_photo');
          $table->double('product_price');
          $table->integer('product_quantity')->nullable();
          $table->string('length')->nullable();
          $table->string('width')->nullable();
          $table->string('height')->nullable();
          $table->string('length_class')->nullable();
          $table->string('weight')->nullable();
          $table->string('weight_class')->nullable();



          $table->timestamps();

          $table->foreign('parent_id')->references('id')->on('categories')->onDelete('set null');
          $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

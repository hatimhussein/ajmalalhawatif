<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skudo_returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('user_address_id')->nullable();
            $table->unsignedBigInteger('order_product_id');
            $table->unsignedInteger('return_reason_id')->nullable();
            $table->string('group_stamp');
            $table->timestamps();

            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_product_id')->references('id')->on('order_products')->onDelete('cascade');
            $table->foreign('return_reason_id')->references('id')->on('skudo_return_reasons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skudo_returns');
    }
}

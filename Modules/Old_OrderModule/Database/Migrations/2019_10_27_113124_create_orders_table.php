<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('user_address_id')->unsigned();
            $table->string('payment_type')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('discount')->nullable();
            $table->double('shipping')->nullable();
            $table->double('tax')->nullable();
            $table->double('total')->nullable();
            $table->string('delivery_time')->nullable();
            $table->text('comment')->nullable();
            $table->string('coupon_code')->nullable();
          $table->string('tax_percentage')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('orders');
    }
}

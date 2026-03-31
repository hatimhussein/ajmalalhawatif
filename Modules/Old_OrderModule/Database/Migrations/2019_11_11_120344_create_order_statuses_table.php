<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable()->default(1);
            $table->integer('status_type_id')->unsigned()->nullable()->default(1);

            $table->string('status_comment')->nullable()->default("");
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');

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
        Schema::dropIfExists('order_statuses');
    }
}

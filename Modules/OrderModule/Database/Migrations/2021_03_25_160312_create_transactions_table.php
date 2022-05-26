<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
//            $table->bigIncrements('id');
            $table->uuid('id')->primary();
            $table->string('payment_method');
            $table->unsignedInteger('user_id');
            $table->double('amount');
            $table->unsignedBigInteger('currency_id');
            $table->json('payload')->nullable();
            $table->string('invoice_id')->nullable();
            $table->json('invoice_data')->nullable();
            $table->string('status')->default('pending');
            $table->string('txn_id')->nullable();
            $table->dateTime('processed_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}

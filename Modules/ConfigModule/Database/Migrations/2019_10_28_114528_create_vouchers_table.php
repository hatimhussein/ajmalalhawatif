<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->date('from');
            $table->date('to');
            $table->string('amount')->nullable();
            $table->string('percentage')->nullable();
            $table->string('status');
            $table->integer('min_total')->default(0);
            $table->boolean('is_shipping')->nullable();
            $table->integer('max_num_of_use')->default(0);
            $table->integer('num_of_use')->default(0);
            $table->integer('voucher_type')->default(1);

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
        Schema::dropIfExists('vouchers');
    }
}

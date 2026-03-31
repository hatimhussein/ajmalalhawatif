<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\AdminModule\Entities\Admin;
use Modules\UserModule\Entities\PhoneCode;
use Modules\UserModule\Entities\User;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skudo_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedInteger('phone_code_id')->nullable();
            $table->string('email')->nullable();
            $table->double('install_price')->nullable();
            $table->dateTime('install_date')->nullable();
            $table->string('shop_name')->nullable();
            $table->text('dummy_text')->nullable();
            $table->string('device_front')->nullable();
            $table->string('device_back')->nullable();
            $table->string('card_attach')->nullable();
            $table->string('qr_code_attach')->nullable();
            $table->string('qr_code_text')->nullable();
            $table->string('dummy_attach')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=>pending,1=>activated,2=>rejected');
            $table->dateTime('replied_at')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->foreignIdFor(Admin::class, 'admin_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            $table->foreign('phone_code_id')->references('id')->on('phone_codes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skudo_insurances');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->string('company_name')->after('usage_date')->nullable();
            $table->string('company_account')->after('company_name')->nullable();
            $table->dateTime('sent_at')->after('company_account')->nullable();
            $table->string('user_name')->after('sent_at')->nullable();
            $table->string('phone')->after('user_name')->nullable();
            $table->unsignedInteger('phone_code_id')->after('phone')->nullable();
            $table->string('dummy_text_1')->after('phone')->nullable();
            $table->string('dummy_text_2')->after('dummy_text_1')->nullable();
            $table->string('dummy_text_3')->after('dummy_text_2')->nullable();
            $table->enum('type', ['sms', 'card'])->default('card');

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
        Schema::table('warranties', function (Blueprint $table) {
            $table->dropForeign('warranties_phone_code_id_foreign');
            $table->dropColumn(['company_name', 'company_account', 'user_name', 'sent_at', 'phone', 'phone_code_id', 'dummy_text_1', 'dummy_text_2', 'dummy_text_3', 'type']);
        });
    }
}

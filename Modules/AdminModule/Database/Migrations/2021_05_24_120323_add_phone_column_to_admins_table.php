<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneColumnToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('phone')->unique()->nullable();
            $table->unsignedInteger('phone_code_id')->nullable();

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
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign('admins_phone_code_id_foreign');
            $table->dropColumn(['phone_code_id', 'phone']);
        });
    }
}

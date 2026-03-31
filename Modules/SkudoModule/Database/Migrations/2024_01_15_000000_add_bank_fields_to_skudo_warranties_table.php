<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankFieldsToSkudoWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            $table->string('bank_name')->after('broken_device_image')->nullable();
            $table->string('account_holder_name')->after('bank_name')->nullable();
            $table->string('bank_account_number')->after('account_holder_name')->nullable();
            $table->string('iban_number')->after('bank_account_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            $table->dropColumn(['bank_name', 'account_holder_name', 'bank_account_number', 'iban_number']);
        });
    }
}

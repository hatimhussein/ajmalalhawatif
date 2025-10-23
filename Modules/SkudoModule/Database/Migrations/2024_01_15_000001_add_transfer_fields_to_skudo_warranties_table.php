<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferFieldsToSkudoWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            $table->boolean('transfer_status')->after('iban_number')->nullable()->default(null)->comment('Transfer status: null=pending, true=completed, false=not_completed');
            $table->string('transfer_receipt')->after('transfer_status')->nullable()->comment('Transfer receipt file path');
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
            $table->dropColumn(['transfer_status', 'transfer_receipt']);
        });
    }
}

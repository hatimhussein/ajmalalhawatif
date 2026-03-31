<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoiceImageToSkudoInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skudo_insurances', function (Blueprint $table) {
            $table->string('invoice_image')->nullable()->after('back_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skudo_insurances', function (Blueprint $table) {
            $table->dropColumn('invoice_image');
        });
    }
}


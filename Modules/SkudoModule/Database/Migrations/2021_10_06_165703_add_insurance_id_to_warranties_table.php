<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInsuranceIdToWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            $table->foreignId('insurance_id')->nullable()->constrained('skudo_insurances')->nullOnDelete();
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
            $table->dropForeign('skudo_warranties_insurance_id_foreign');
            $table->dropColumn('insurance_id');
        });
    }
}

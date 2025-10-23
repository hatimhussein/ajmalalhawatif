<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserNotesColumnToInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skudo_insurances', function (Blueprint $table) {
            $table->text('user_notes')->nullable();
            $table->text('reason')->nullable();
            $table->text('store_reason')->nullable();
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
            $table->dropColumn('user_notes', 'reason', 'store_reason');
        });
    }
}

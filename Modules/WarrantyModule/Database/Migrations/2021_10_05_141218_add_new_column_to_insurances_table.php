<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurances', function (Blueprint $table) {
            $table->renameColumn('install_date', 'usage_date');
            $table->dropColumn('install_price', 'shop_name', 'dummy_text', 'device_front', 'device_back', 'card_attach', 'qr_code_attach', 'qr_code_text', 'dummy_attach');
            $table->string('front_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('warranty_image')->nullable();
            $table->string('dummy_text_1')->after('phone_code_id')->nullable();
            $table->string('dummy_text_2')->after('dummy_text_1')->nullable();
            $table->string('dummy_text_3')->after('dummy_text_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurances', function (Blueprint $table) {

        });
    }
}

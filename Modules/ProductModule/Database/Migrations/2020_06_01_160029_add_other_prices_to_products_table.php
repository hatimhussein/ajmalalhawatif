<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherPricesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('product_price1')->default(0)->after('product_price');
            $table->float('product_price2')->default(0)->after('product_price1');
            $table->float('product_price3')->default(0)->after('product_price2');
            $table->float('product_price4')->default(0)->after('product_price3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_price2','product_price3','product_price4','product_price5');
        });
    }
}

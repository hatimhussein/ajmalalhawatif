<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQtyColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('product_min_qty1')->default(0)->after('product_price4');
            $table->integer('product_min_qty2')->default(0)->after('product_min_qty1');
            $table->integer('product_min_qty3')->default(0)->after('product_min_qty2');
            $table->integer('product_min_qty4')->default(0)->after('product_min_qty3');
            $table->integer('product_min_qty5')->default(0)->after('product_min_qty4');

            $table->integer('product_max_qty1')->default(0)->after('product_min_qty4');
            $table->integer('product_max_qty2')->default(0)->after('product_max_qty1');
            $table->integer('product_max_qty3')->default(0)->after('product_max_qty2');
            $table->integer('product_max_qty4')->default(0)->after('product_max_qty3');
            $table->integer('product_max_qty5')->default(0)->after('product_max_qty4');
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
            //
        });
    }
}

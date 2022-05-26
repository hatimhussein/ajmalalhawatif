<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggesstionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggesstion_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('suggesstion_id');
            $table->integer('user_id');
            $table->integer('show')->default(0)->comment('1:show - 0:hide');
            $table->integer('reply_type')->default(0)->comment('1:user - 0:admin');
            $table->text('reply')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggesstion_replies');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skudo_warranties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('front_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('warranty_image')->nullable();
            $table->string('warranty_number')->nullable();
            $table->text('user_notes')->nullable();
            $table->string('usage_date')->nullable();
            $table->string('device_name_ar')->nullable();
            $table->string('device_name_en')->nullable();
            $table->boolean('is_applicable')->nullable();
            $table->double('value')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->text('reason')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->dateTime('replied_at')->nullable();
            $table->string('application_number')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skudo_warranties');
    }
}

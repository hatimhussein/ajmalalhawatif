<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skudo_insurances', function (Blueprint $table) {
            $table->string('device_back_image')->nullable()->after('front_image');
        });
    }

    public function down(): void
    {
        Schema::table('skudo_insurances', function (Blueprint $table) {
            $table->dropColumn('device_back_image');
        });
    }
};



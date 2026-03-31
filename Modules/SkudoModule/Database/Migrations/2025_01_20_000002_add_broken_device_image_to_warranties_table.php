<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            if (!Schema::hasColumn('skudo_warranties', 'broken_device_image')) {
                $table->string('broken_device_image', 191)->nullable()->after('package_serial');
            }
        });
    }

    public function down(): void
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            if (Schema::hasColumn('skudo_warranties', 'broken_device_image')) {
                $table->dropColumn('broken_device_image');
            }
        });
    }
};

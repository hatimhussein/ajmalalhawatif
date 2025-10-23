<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            if (!Schema::hasColumn('skudo_warranties', 'device_serial')) {
                $table->string('device_serial', 191)->nullable()->after('dummy_text_3');
            }
            if (!Schema::hasColumn('skudo_warranties', 'package_serial')) {
                $table->string('package_serial', 191)->nullable()->after('device_serial');
            }
        });
    }

    public function down(): void
    {
        Schema::table('skudo_warranties', function (Blueprint $table) {
            if (Schema::hasColumn('skudo_warranties', 'package_serial')) {
                $table->dropColumn('package_serial');
            }
            if (Schema::hasColumn('skudo_warranties', 'device_serial')) {
                $table->dropColumn('device_serial');
            }
        });
    }
};

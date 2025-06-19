<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('registrasi_event', function (Blueprint $table) {
            $table->string('scan_token')->nullable()->unique()->after('qr_code_path');
        });
    }

    public function down(): void
    {
        Schema::table('registrasi_event', function (Blueprint $table) {
            $table->dropColumn('scan_token');
        });
    }
};


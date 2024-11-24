<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('t_bandul', function (Blueprint $table) {
            $table->dateTime('waktu_kinerja_bandul')->nullable()->after('hasil_daya')->comment('Waktu kinerja bandul');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_bandul', function (Blueprint $table) {
            $table->dropColumn('waktu_kinerja_bandul');
        });
    }
};

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
        Schema::create('t_bandul', function (Blueprint $table) {
            $table->id('bandul_id');
            $table->foreignId('customer_id')->constrained('t_users')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('t_users')->onDelete('cascade');
            $table->integer('voltase_baterai')->nullable();
            $table->integer('kecepatan_bandul')->nullable();
            $table->integer('total_daya')->nullable();
            $table->integer('hasil_daya')->nullable();
            $table->timestamp('waktu_kinerja_bandul');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_bandul');
    }
};

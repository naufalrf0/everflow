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
        Schema::create('t_komentar', function (Blueprint $table) {
            $table->id('komentar_id');
            $table->foreignId('customer_id')->constrained('t_users')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('t_users')->onDelete('cascade');
            $table->text('isi_komentar');
            $table->integer('jumlah_like')->default(0);
            $table->timestamp('waktu_komentar')->nullable();
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_komentar');
    }
};

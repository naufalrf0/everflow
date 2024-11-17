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
        Schema::create('t_forum', function (Blueprint $table) {
            $table->id('post_id');
            $table->foreignId('customer_id')->constrained('t_users')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('t_users')->onDelete('cascade');
            $table->text('judul_postingan');
            $table->text('isi_postingan');
            $table->integer('jumlah_like')->nullable();
            $table->integer('jumlah_komentar')->nullable();
            $table->timestamp('waktu_post');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_forum');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('t_notifikasi', function (Blueprint $table) {
            $table->id('notifikasi_id'); 
            $table->unsignedBigInteger('bandul_id');
            $table->text('deskripsi');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('bandul_id')
                ->references('id')
                ->on('t_bandul')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_notifikasi');
    }
};

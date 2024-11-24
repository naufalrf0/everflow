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
        Schema::create('t_komentar', function (Blueprint $table) {
            $table->id('komentar_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bandul_id');
            $table->text('review');
            $table->integer('rating'); 
            $table->string('profile_image')->nullable(); 
            $table->boolean('is_approved')->default(false); 
            $table->timestamp('created_at')->useCurrent(); 

            $table->foreign('user_id')
                  ->references('id')
                  ->on('t_users')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('t_komentar');
    }
};

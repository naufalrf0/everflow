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
            $table->id(); 
            $table->decimal('voltase_baterai', 10, 2)->nullable(); 
            $table->decimal('kecepatan_bandul', 10, 2)->nullable(); 
            $table->decimal('total_daya', 10, 2)->nullable(); 
            $table->decimal('hasil_daya', 10, 2)->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banduls');
    }
};

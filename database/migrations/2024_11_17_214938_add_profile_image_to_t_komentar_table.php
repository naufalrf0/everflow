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
    Schema::table('t_komentar', function (Blueprint $table) {
        $table->string('profile_image')->nullable()->after('jumlah_like');
    });
}

public function down()
{
    Schema::table('t_komentar', function (Blueprint $table) {
        $table->dropColumn('profile_image');
    });
}
};

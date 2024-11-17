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
    Schema::table('t_forum', function (Blueprint $table) {
        $table->unsignedBigInteger('admin_id')->nullable()->change();
        $table->unsignedBigInteger('customer_id')->nullable()->change();
    });
}

public function down()
{
    Schema::table('t_forum', function (Blueprint $table) {
        $table->unsignedBigInteger('admin_id')->nullable(false)->change();
        $table->unsignedBigInteger('customer_id')->nullable(false)->change();
    });
}

};

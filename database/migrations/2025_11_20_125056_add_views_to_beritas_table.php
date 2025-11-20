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
    Schema::table('beritas', function (Blueprint $table) {
        $table->bigInteger('views')->default(0); // Default 0
    });
}

public function down()
{
    Schema::table('beritas', function (Blueprint $table) {
        $table->dropColumn('views');
    });
}
};

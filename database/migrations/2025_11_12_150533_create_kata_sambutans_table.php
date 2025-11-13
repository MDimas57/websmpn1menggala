<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kata_sambutans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepsek')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('foto')->nullable();
            $table->text('kata_sambutan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kata_sambutans');
    }
};

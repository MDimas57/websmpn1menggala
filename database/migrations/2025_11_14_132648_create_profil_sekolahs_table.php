<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // path gambar/logo sekolah
            $table->string('nama_sekolah');
            $table->string('akreditasi')->nullable();
            $table->integer('jumlah_rombel')->nullable();
            $table->integer('jumlah_tenaga_pendidik')->nullable();
            $table->integer('jumlah_peserta_didik')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sekolahs');
    }
};

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

// Rute Galeri
Route::get('/gallery-foto', [PageController::class, 'galleryFoto'])->name('gallery.foto');
Route::get('/gallery-video', [PageController::class, 'galleryVideo'])->name('gallery.video');

// Rute Kontak
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// ▼▼▼ TAMBAHAN BARU: Rute untuk MENYIMPAN data formulir ▼▼▼
Route::post('/kontak/store', [PageController::class, 'storeKontak'])->name('kontak.store');

// Rute Profil (dari kode Anda)
Route::get('/kata-sambutan', [PageController::class, 'kataSambutan'])->name('profil.sambutan');
Route::get('/profil-sekolah', [PageController::class, 'profilSekolah'])->name('profil.sekolah');
Route::get('/struktur-organisasi', [PageController::class, 'strukturOrganisasi'])->name('profil.struktur');

// === TAMBAHAN BARU UNTUK PPDB ===
// Ini adalah rute baru yang Anda inginkan
Route::get('/ppdb', [PageController::class, 'ppdb'])->name('ppdb.index');
Route::get('/berita/{slug}', [PageController::class, 'detailBerita'])->name('berita.show');

Route::get('/bidang/kurikulum', [App\Http\Controllers\PageController::class, 'bidangKurikulum'])->name('bidang.kurikulum');
Route::get('/bidang/kesiswaan', [App\Http\Controllers\PageController::class, 'bidangKesiswaan'])->name('bidang.kesiswaan');
Route::get('/bidang/humas', [App\Http\Controllers\PageController::class, 'bidangHumas'])->name('bidang.humas');
Route::get('/bidang/sarana-prasarana', [App\Http\Controllers\PageController::class, 'bidangSarana'])->name('bidang.sarana');
Route::get('/informasi', [PageController::class, 'informasiIndex'])->name('informasi.index');
Route::get('/informasi/{id}', [PageController::class, 'informasiShow'])->name('informasi.show');
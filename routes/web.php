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

// Rute Profil (dari kode Anda)
Route::get('/kata-sambutan', [PageController::class, 'kataSambutan'])->name('profil.sambutan');
Route::get('/profil-sekolah', [PageController::class, 'profilSekolah'])->name('profil.sekolah');
Route::get('/struktur-organisasi', [PageController::class, 'strukturOrganisasi'])->name('profil.struktur');

// === TAMBAHAN BARU UNTUK PPDB ===
// Ini adalah rute baru yang Anda inginkan
Route::get('/ppdb', [PageController::class, 'ppdb'])->name('ppdb.index');
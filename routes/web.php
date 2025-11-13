<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

// HAPUS RUTE /gallery LAMA DAN GANTI DENGAN DUA INI
Route::get('/gallery-foto', [PageController::class, 'galleryFoto'])->name('gallery.foto');
Route::get('/gallery-video', [PageController::class, 'galleryVideo'])->name('gallery.video');

Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
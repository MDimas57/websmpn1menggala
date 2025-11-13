<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // <-- 1. TAMBAHKAN BARIS INI

Route::get('/', function () {
    return view('welcome');
});

// 2. TAMBAHKAN BARIS INI
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
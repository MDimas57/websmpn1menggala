<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri; // <-- PENTING! (Atau 'Gallery'?)

class PageController extends Controller
{
    /**
     * Menampilkan halaman Galeri.
     */
    public function gallery()
    {
        // 1. Ambil semua data foto dari database
        //    Saya asumsikan model Anda bernama 'Galeri'
        $photos = Galeri::latest()->get(); 

        // 2. Kirim data foto itu ke file 'view'
        return view('gallery', [
            'photos' => $photos
        ]);
    }

    // Nanti Anda bisa tambahkan fungsi lain di sini
    // public function profil() { ... }
    // public function kontak() { ... }
}
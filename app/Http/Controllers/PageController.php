<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class PageController extends Controller
{
    /**
     * Menampilkan halaman Galeri FOTO.
     * (Method gallery() kita ganti nama menjadi galleryFoto)
     */
    public function galleryFoto()
    {
        // Ambil data yang tipenya 'foto' saja
        $photos = Galeri::where('tipe', 'foto')->latest()->get(); 

        // Kirim data ke view 'gallery-foto'
        return view('gallery-foto', [
            'photos' => $photos
        ]);
    }

    /**
     * Menampilkan halaman Galeri VIDEO.
     * (Method baru)
     */
    public function galleryVideo()
    {
        // Ambil data yang tipenya 'video' saja
        $videos = Galeri::where('tipe', 'video')->latest()->get(); 

        // Kirim data ke view 'gallery-video'
        return view('gallery-video', [
            'videos' => $videos
        ]);
    }

    /**
     * Menampilkan halaman Kontak Kami.
     */
    public function kontak()
    {
        return view('kontak');
    }
}
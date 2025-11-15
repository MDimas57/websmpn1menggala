<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KataSambutan;       // <-- TAMBAHKAN
use App\Models\ProfilSekolah;     // <-- TAMBAHKAN
use App\Models\StrukturOrganisasi; // <-- TAMBAHKAN
use App\Models\Ppdb;

class PageController extends Controller
{
    // ... (fungsi galleryFoto() dan galleryVideo() Anda ada di sini) ...
    public function galleryFoto()
    {
        $photos = Galeri::where('tipe', 'foto')->latest()->get(); 
        return view('gallery-foto', [ 'photos' => $photos ]);
    }

    public function galleryVideo()
    {
        $videos = Galeri::where('tipe', 'video')->latest()->get(); 
        return view('gallery-video', [ 'videos' => $videos ]);
    }
    
    // ... (fungsi kontak() Anda ada di sini) ...
    public function kontak()
    {
        return view('kontak');
    }

    // --- TAMBAHKAN 3 FUNGSI BARU DI BAWAH INI ---

    /**
     * Menampilkan halaman Kata Sambutan.
     */
    public function kataSambutan()
    {
        // Ambil data sambutan terbaru (kita asumsikan hanya ada 1)
        $sambutan = KataSambutan::latest()->first(); 
        return view('profil.kata-sambutan', ['sambutan' => $sambutan]);
    }

    /**
     * Menampilkan halaman Profil Sekolah.
     */
    public function profilSekolah()
    {
        // Ambil data profil terbaru
        $profil = ProfilSekolah::latest()->first(); 
        return view('profil.profil-sekolah', ['profil' => $profil]);
    }

    /**
     * Menampilkan halaman Struktur Organisasi.
     */
    public function strukturOrganisasi()
    {
        // Ambil data struktur terbaru
        $struktur = StrukturOrganisasi::latest()->get(); 
        return view('profil.struktur-organisasi', ['struktur' => $struktur]);
    }

    public function ppdb()
    {
        // Ambil semua data dari Model 'Ppdb'
        $informasiItems = Ppdb::latest()->get();

        // Kirim data tersebut ke view 'pages.ppdb'
        return view('pages.ppdb', compact('informasiItems'));
    }
    
}
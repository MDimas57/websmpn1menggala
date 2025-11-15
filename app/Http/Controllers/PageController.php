<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KataSambutan;
use App\Models\ProfilSekolah;
use App\Models\StrukturOrganisasi;
use App\Models\Ppdb;
use App\Models\Kontak; // <-- ▼▼▼ TAMBAHKAN INI ▼▼▼

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
        return view('kontak'); // Ini halaman blade Anda, mungkin 'pages.kontak'
    }

    // --- (Fungsi profil Anda ada di sini) ---
    public function kataSambutan()
    {
        $sambutan = KataSambutan::latest()->first(); 
        return view('profil.kata-sambutan', ['sambutan' => $sambutan]);
    }

    public function profilSekolah()
    {
        $profil = ProfilSekolah::latest()->first(); 
        return view('profil.profil-sekolah', ['profil' => $profil]);
    }

    public function strukturOrganisasi()
    {
        $struktur = StrukturOrganisasi::latest()->get(); 
        return view('profil.struktur-organisasi', ['struktur' => $struktur]);
    }

    public function ppdb()
    {
        $informasiItems = Ppdb::latest()->get();
        return view('pages.ppdb', compact('informasiItems'));
    }
    
    // ▼▼▼ TAMBAHKAN FUNGSI BARU INI UNTUK MENYIMPAN PESAN ▼▼▼
    
    /**
     * Menyimpan pesan baru dari formulir kontak.
     */
    public function storeKontak(Request $request)
    {
        // 1. Validasi data. Nama field HARUS SAMA dengan Model & Blade.
        $validated = $request->validate([
            'nama' => 'required|string|max:255', // <-- Diubah dari 'nama_lengkap'
            'email' => 'required|email|max:255',
            'no_telepon' => 'nullable|string|max:20', // <-- Diubah dari 'nomor_ponsel'
            'pesan' => 'required|string|min:10',
        ]);

        // 2. Simpan ke database menggunakan Model Kontak
        Kontak::create($validated);

        // 3. Kembali ke halaman kontak dengan pesan sukses
        return redirect()->route('kontak')
                         ->with('success', 'Pesan Anda telah berhasil terkirim! Terima kasih.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KataSambutan;
use App\Models\ProfilSekolah;
use App\Models\StrukturOrganisasi;
use App\Models\Ppdb;
use App\Models\Kontak;
use App\Models\Berita; // <-- Digabungkan: Model Berita ditambahkan

class PageController extends Controller
{
    // ... (fungsi galleryFoto() dan galleryVideo() Anda) ...
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

    // ... (fungsi kontak() Anda) ...
    public function kontak()
    {
        return view('kontak'); // Ini halaman blade Anda, mungkin 'pages.kontak'
    }

    // --- (Fungsi profil Anda) ---
    public function kataSambutan()
    {
        $sambutan = KataSambutan::latest()->first();
        return view('profil.kata-sambutan', ['sambutan' => $sambutan]);
    }

    // ▼▼▼ PERBAIKAN DI FUNGSI INI ▼▼▼
    public function profilSekolah()
    {
<<<<<<< HEAD
        $profil = ProfilSekolah::latest()->first();
=======
        // Mengganti latest()->first() menjadi first()
        // Ini lebih aman untuk data setting yang hanya ada 1 baris
        $profil = ProfilSekolah::first(); 
        
>>>>>>> f5f5765be36e6adda51df8453df77add25bfe842
        return view('profil.profil-sekolah', ['profil' => $profil]);
    }
    // ▲▲▲ AKHIR PERBAIKAN ▲▲▲

    public function strukturOrganisasi()
    {
        $struktur = StrukturOrganisasi::latest()->get();
        return view('profil.struktur-organisasi', ['struktur' => $struktur]);
    }

    // ... (fungsi ppdb() Anda) ...
    public function ppdb()
    {
        $informasiItems = Ppdb::latest()->get();
        return view('pages.ppdb', compact('informasiItems'));
    }

    // ... (fungsi storeKontak() Anda) ...
    public function storeKontak(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'pesan' => 'required|string|min:10',
        ]);
        Kontak::create($validated);
        return redirect()->route('kontak')
                         ->with('success', 'Pesan Anda telah berhasil terkirim! Terima kasih.');
    }

<<<<<<< HEAD
    // --- FUNGSI BARU YANG DIGABUNGKAN ---

    /**
     * Menampilkan halaman detail Berita.
     */
    public function detailBerita($slug)
    {
        // Cari berita berdasarkan slug.
        // firstOrFail() akan otomatis 404 jika tidak ketemu.
        $berita = Berita::where('slug', $slug)->firstOrFail();

        // Ambil daftar berita lain (untuk sidebar). Kita ambil terbaru dan biarkan view
        // yang mengecualikan berita saat ini jika diperlukan.
        $unreadBeritas = Berita::latest()->get();
=======
    // ... (fungsi detailBerita() Anda) ...
    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.detailberita', ['berita' => $berita]);
    }

    // ... (semua fungsi bidang Anda) ...
    public function bidangKurikulum()
    {
        $data = BidangKurikulum::latest()->first(); 
        $judul = "Bidang Kurikulum";
        return view('bidang.show', compact('data', 'judul'));
    }
>>>>>>> f5f5765be36e6adda51df8453df77add25bfe842

        // Kirim data berita ke view 'berita.detailberita'
        return view('berita.detailberita', [
            'berita' => $berita,
            'unreadBeritas' => $unreadBeritas,
        ]);
    }
}

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

    // ... (fungsi ppdb() Anda) ...
    public function ppdb()
    {
        $informasiItems = Ppdb::latest()->get();
        return view('pages.ppdb', compact('informasiItems'));
    }

    // ... (fungsi storeKontak() Anda) ...
    public function storeKontak(Request $request)
    {
        // 1. Validasi data.
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'pesan' => 'required|string|min:10',
        ]);

        // 2. Simpan ke database
        Kontak::create($validated);

        // 3. Kembali ke halaman kontak
        return redirect()->route('kontak')
                         ->with('success', 'Pesan Anda telah berhasil terkirim! Terima kasih.');
    }

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

        // Kirim data berita ke view 'berita.detailberita'
        return view('berita.detailberita', [
            'berita' => $berita,
            'unreadBeritas' => $unreadBeritas,
        ]);
    }
}

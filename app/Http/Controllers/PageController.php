<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\KataSambutan;
use App\Models\ProfilSekolah;
use App\Models\StrukturOrganisasi;
use App\Models\Ppdb;
use App\Models\Kontak;
use App\Models\Berita; 
use App\Models\BidangKurikulum;
use App\Models\BidangKesiswaan;
use App\Models\BidangHumas;
use App\Models\SaranaPrasarana;

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
        
        // Kirim data berita ke view baru 'berita.show'
        return view('berita.detailberita', ['berita' => $berita]);
    }

    public function bidangKurikulum()
    {
        // Ambil data (asumsi hanya ada 1 data per bidang)
        $data = BidangKurikulum::latest()->first(); 
        $judul = "Bidang Kurikulum"; // Judul untuk halaman
        
        // Kirim data ke view 'bidang.show' yang akan kita buat
        return view('bidang.show', compact('data', 'judul'));
    }

    public function bidangKesiswaan()
    {
        $data = BidangKesiswaan::latest()->first();
        $judul = "Bidang Kesiswaan";
        return view('bidang.show', compact('data', 'judul'));
    }

    public function bidangHumas()
    {
        $data = BidangHumas::latest()->first();
        $judul = "Bidang Humas";
        return view('bidang.show', compact('data', 'judul'));
    }

    public function bidangSarana()
    {
        $data = SaranaPrasarana::latest()->first();
        $judul = "Bidang Sarana Prasarana";
        return view('bidang.show', compact('data', 'judul'));
    }
}
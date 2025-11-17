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
use App\Models\Informasi;

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
        // Mengganti latest()->first() menjadi first()
        // Ini lebih aman untuk data setting yang hanya ada 1 baris
        $profil = ProfilSekolah::first();

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

    // ... (fungsi detailBerita() Anda) ...
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

    // ... (semua fungsi bidang Anda) ...
    public function bidangKurikulum()
    {
        $data = BidangKurikulum::latest()->first();
        $judul = "Bidang Kurikulum";
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

  public function informasiIndex()
{
    // Ambil SEMUA informasi untuk sidebar
    $semuaInformasi = Informasi::latest()->get(); 
    
    // Ambil item PERTAMA untuk ditampilkan sebagai default
    $infoDetail = Informasi::latest()->first();
    
    return view('informasi.index', [
        'semuaInformasi' => $semuaInformasi,
        'infoDetail' => $infoDetail
    ]);
}

/**
 * Menampilkan item Informasi yang spesifik (saat diklik)
 */
public function informasiShow($id)
{
    // Ambil SEMUA informasi untuk sidebar
    $semuaInformasi = Informasi::latest()->get(); 
    
    // Ambil item SPESIFIK berdasarkan ID yang diklik
    $infoDetail = Informasi::findOrFail($id);
    
    return view('informasi.index', [
        'semuaInformasi' => $semuaInformasi,
        'infoDetail' => $infoDetail
    ]);
}
}

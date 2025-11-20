<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // <--- PENTING: Tambahan baru
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
use App\Models\Guru;

class PageController extends Controller
{
    // ... (fungsi galleryFoto() dan galleryVideo()) ...
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

    // ... (fungsi kontak()) ...
    public function kontak()
    {
        return view('kontak'); 
    }

    // --- (Fungsi profil) ---
    public function kataSambutan()
    {
        $sambutan = KataSambutan::latest()->first();
        return view('profil.kata-sambutan', ['sambutan' => $sambutan]);
    }

    public function profilSekolah()
    {
        $profil = ProfilSekolah::first();
        return view('profil.profil-sekolah', ['profil' => $profil]);
    }

    public function strukturOrganisasi()
    {
        $struktur = StrukturOrganisasi::latest()->get();
        return view('profil.struktur-organisasi', ['struktur' => $struktur]);
    }

    // ... (fungsi ppdb()) ...
    public function ppdb()
    {
        $informasiItems = Ppdb::latest()->get();
        return view('pages.ppdb', compact('informasiItems'));
    }

    // ... (fungsi storeKontak()) ...
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

    // ▼▼▼ FUNGSI INI SUDAH DI-UPDATE DENGAN LOGIKA VIEWS ▼▼▼
    public function detailBerita($slug)
    {
        // 1. Cari berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->firstOrFail();

        // 2. LOGIKA BARU: Session Check & Increment Views
        // Buat kunci unik session: "viewed_berita_123"
        $key = 'viewed_berita_' . $berita->id;

        // Cek apakah user ini sudah melihat berita ini sebelumnya?
        if (!Session::has($key)) {
            // Jika belum, tambah views
            $berita->increment('views');
            
            // Simpan session bahwa user ini sudah melihat
            Session::put($key, 1);
        }

        // 3. Ambil daftar berita lain (untuk sidebar)
        $unreadBeritas = Berita::latest()->get();

        // 4. Kirim data berita ke view
        return view('berita.detailberita', [
            'berita' => $berita,
            'unreadBeritas' => $unreadBeritas,
        ]);
    }
    // ▲▲▲ AKHIR UPDATE ▲▲▲

    // ... (semua fungsi bidang) ...
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
        $semuaInformasi = Informasi::latest()->get(); 
        $infoDetail = Informasi::latest()->first();
        
        return view('informasi.index', [
            'semuaInformasi' => $semuaInformasi,
            'infoDetail' => $infoDetail
        ]);
    }

    public function informasiShow($id)
    {
        $semuaInformasi = Informasi::latest()->get(); 
        $infoDetail = Informasi::findOrFail($id);
        
        return view('informasi.index', [
            'semuaInformasi' => $semuaInformasi,
            'infoDetail' => $infoDetail
        ]);
    }

    // Ini untuk Detail Guru (JANGAN DIHAPUS/DIGANTI karena beda fungsi dengan berita)
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.detail', compact('guru'));
    }
}
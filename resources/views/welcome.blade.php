@extends('layouts.app')

@section('content')

{{--
    =========================================================
    LOGIKA PHP (TIDAK BERUBAH)
    =========================================================
--}}
@php
    use App\Models\Banner;
    use App\Models\Berita;
    use App\Models\Guru;
    use App\Models\Galeri;
    use Illuminate\Support\Str;

    $banners = Banner::latest()->get();
    $tenagaPendidik = Guru::latest()->get();
    $photos = Galeri::where('tipe', 'foto')->latest()->take(4)->get();
    $videos = Galeri::where('tipe', 'video')->latest()->take(2)->get();

    // LOGIKA BERITA
    $allBerita = Berita::where('status', 'publish')->latest()->get();
    $beritaUtama = $allBerita->take(4); // Grid kiri
    $beritaLama = $allBerita->skip(4);   // List kanan
@endphp

{{--
    1. BAGIAN BANNER SLIDER (MODERN: Glass Effect Overlay)
--}}
<section id="banner-slider" class="relative mt-24 splide group"
         aria-label="Banner Sekolah"
         data-splide='{"type":"loop","arrows":true,"autoplay":true,"interval":4000,"speed":1000,"pauseOnHover":false}'>
    <div class="splide__track h-[600px] md:h-[700px]">
        <ul class="splide__list">
            @foreach ($banners as $banner)
                <li class="splide__slide">
                    <div class="relative w-full h-full overflow-hidden">
                        {{-- Image dengan Zoom Effect saat slide aktif (bisa ditambah CSS custom) --}}
                        <img src="{{ asset('storage/' . $banner->foto) }}" alt="Banner" class="absolute inset-0 object-cover w-full h-full" />
                        {{-- Overlay Gradient yang lebih halus --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90"></div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Content Overlay (Glassmorphism) --}}
    <div class="container absolute inset-0 z-20 flex items-center px-6 mx-auto pointer-events-none md:px-16 max-w-7xl">
        <div class="max-w-3xl pointer-events-auto">
            <div class="inline-flex items-center gap-3 px-4 py-2 mb-6 border rounded-full shadow-lg bg-white/10 backdrop-blur-md border-white/20 animate-fade-in-up">
                <span class="block w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-semibold tracking-widest text-white uppercase">Official Website</span>
            </div>

            <h1 class="mb-6 text-5xl font-black leading-tight text-white md:text-5xl drop-shadow-2xl">
                Mewujudkan Generasi <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-amber-500">
                    Cerdas & Berkarakter
                </span>
            </h1>

            <p class="max-w-2xl mb-8 text-lg leading-relaxed text-gray-200 md:text-xl">
                Selamat datang di SMP Negeri 1 Menggala. Platform informasi digital untuk mendukung transparansi dan kemajuan pendidikan.
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ url('kata-sambutan') }}" class="relative px-8 py-4 overflow-hidden font-bold text-yellow-900 transition-all bg-yellow-500 rounded-full shadow-lg group shadow-yellow-500/30 hover:scale-105 hover:shadow-yellow-500/50">
                    <span class="relative z-10 flex items-center gap-2">
                        Jelajahi Profil
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </span>
                    <div class="absolute inset-0 transition-transform duration-300 translate-y-full bg-white/20 group-hover:translate-y-0"></div>
                </a>
                <a href="#berita" class="px-8 py-4 font-bold text-white transition-all border rounded-full bg-white/10 backdrop-blur-sm border-white/30 hover:bg-white/20">
                    Lihat Berita
                </a>
            </div>
        </div>
    </div>
</section>

{{--
    =========================================================
    2. BAGIAN BERITA (LAYOUT: 3 HEADLINE + PURE SCROLL SIDEBAR)
    =========================================================
--}}
@php
    // AMBIL DATA BERITA
    // Mengambil 20 berita terbaru
    $allBerita = Berita::where('status', 'publish')->latest()->take(20)->get();

    // 3 Berita teratas -> Grid Utama (Kiri)
    $beritaUtama = $allBerita->take(3);

    // Sisanya -> Sidebar (Kanan)
    $beritaSidebar = $allBerita->skip(3);
@endphp

<section id="berita" class="relative py-24 bg-slate-50">
    <div class="container px-4 mx-auto max-w-7xl">

        {{-- Header Section --}}
        <div class="flex flex-col justify-between gap-6 mb-12 md:flex-row md:items-end">
            <div>
                <span class="text-sm font-bold tracking-wider text-yellow-600 uppercase">Informasi Terkini</span>
                <h2 class="mt-2 text-4xl font-black md:text-5xl text-slate-900">Berita Sekolah</h2>
            </div>
            {{-- Link Mobile Only (Tetap ada buat HP karena tidak ada sidebar di HP biasanya) --}}
            <a href="/informasi" class="inline-flex items-center gap-2 text-sm font-semibold md:hidden text-slate-600">
                Lihat Semua &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">

            {{--
                KOLOM KIRI (Headline / Berita Utama)
            --}}
            <div class="grid grid-cols-1 gap-8 lg:col-span-8 md:grid-cols-2 h-fit">
                @foreach ($beritaUtama as $index => $berita)
                    <article class="group relative bg-white rounded-[2rem] overflow-hidden shadow-lg border border-slate-100 hover:-translate-y-2 transition-all duration-500 {{ $index === 0 ? 'md:col-span-2 md:flex md:h-[400px]' : 'flex flex-col h-full' }}">

                        {{-- Image Wrapper --}}
                        <div class="relative overflow-hidden {{ $index === 0 ? 'md:w-1/2 h-64 md:h-full' : 'h-56' }}">
                            <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}"
                                 alt="{{ $berita->judul }}"
                                 class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">

                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1.5 rounded-lg shadow-sm border border-white/50 text-center">
                                <span class="block text-[10px] font-bold text-slate-400 uppercase">{{ $berita->created_at->format('M') }}</span>
                                <span class="block text-lg font-black leading-none text-slate-800">{{ $berita->created_at->format('d') }}</span>
                            </div>
                        </div>

                        {{-- Content Wrapper --}}
                        <div class="p-6 md:p-8 flex flex-col justify-center flex-1 {{ $index === 0 ? 'md:w-1/2' : '' }}">
                            @if($index === 0)
                            <div class="flex items-center gap-2 mb-3 text-xs font-bold tracking-wide text-yellow-600 uppercase">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></span>
                                Highlights
                            </div>
                            @endif

                            <h3 class="{{ $index === 0 ? 'text-2xl md:text-3xl' : 'text-xl' }} font-bold text-slate-800 mb-3 leading-tight group-hover:text-yellow-600 transition-colors">
                                <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}">
                                    {{ $berita->judul }}
                                </a>
                            </h3>

                            <p class="mb-6 text-sm leading-relaxed text-slate-500 line-clamp-3">
                                {{ Str::limit(strip_tags($berita->isi), $index === 0 ? 150 : 100) }}
                            </p>

                            <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="mt-auto inline-flex items-center gap-2 text-sm font-bold text-slate-900 border-b-2 border-yellow-400 pb-0.5 hover:text-yellow-600 transition-colors w-max">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{--
                KOLOM KANAN (Sidebar Scrollable - TANPA TOMBOL LIHAT SEMUA)
            --}}
            <div class="lg:col-span-4">
                <div class="sticky top-24">
                    <div class="bg-slate-900 rounded-[2rem] p-6 shadow-2xl relative overflow-hidden flex flex-col max-h-[700px]"> {{-- max-h diatur di container utama --}}

                        {{-- Judul Sidebar --}}
                        <div class="relative z-10 flex items-center justify-between pb-4 mb-2 border-b border-slate-700 shrink-0">
                            <h3 class="flex items-center gap-3 text-xl font-bold text-white">
                                <span class="w-1.5 h-6 bg-yellow-500 rounded-full"></span>
                                Arsip Berita
                            </h3>
                            <span class="font-mono text-xs text-slate-400">{{ $beritaSidebar->count() }} Artikel</span>
                        </div>

                        {{-- AREA SCROLLABLE --}}
                        <div class="relative z-10 flex-1 pr-2 space-y-4 overflow-y-auto custom-scrollbar">
                            @forelse ($beritaSidebar as $berita)
                                <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="flex gap-4 p-3 transition-colors border border-transparent group rounded-xl hover:bg-white/5 hover:border-white/10">
                                    {{-- Thumbnail --}}
                                    <div class="relative w-20 h-20 overflow-hidden rounded-lg shrink-0">
                                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}"
                                             alt="Thumb" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                                    </div>

                                    {{-- Teks --}}
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 text-[10px] text-slate-400 mb-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ $berita->created_at->format('d M Y') }}
                                        </div>
                                        <h4 class="text-sm font-bold leading-snug transition-colors text-slate-200 group-hover:text-yellow-400 line-clamp-2">
                                            {{ $berita->judul }}
                                        </h4>
                                    </div>
                                </a>
                            @empty
                                <div class="py-8 text-center text-slate-500">
                                    <p class="text-sm">Tidak ada berita lainnya.</p>
                                </div>
                            @endforelse
                        </div>

                        {{-- Dekorasi Background Sidebar --}}
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-600 rounded-full blur-[60px] opacity-20 pointer-events-none"></div>
                        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-yellow-600 rounded-full blur-[60px] opacity-20 pointer-events-none"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Style CSS untuk Scrollbar yang cantik (Wajib ada) --}}
<style>
    /* Mengatur lebar scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    /* Mengatur track (jalur) scrollbar */
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        margin-block: 10px; /* Jarak atas bawah */
    }
    /* Mengatur handle (pegangan) scrollbar */
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #475569; /* Slate 600 */
        border-radius: 10px;
    }
    /* Warna handle saat di-hover */
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #fbbf24; /* Yellow 400 */
    }
</style>

{{--
    3. BAGIAN TENAGA PENDIDIK (MODERN: Portrait Cards with Floating Info)
--}}
<section class="relative py-24 overflow-hidden">
    {{-- Background Image dengan Overlay --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/guru.jpeg') }}" alt="Background Guru & Staf" class="object-cover w-full h-full">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/60 to-slate-900/90"></div>
    </div>

    <div class="container relative z-10 px-4 mx-auto max-w-7xl">
        <div class="mb-16 text-center">
            <span class="px-4 py-2 text-sm font-bold tracking-wider text-yellow-400 uppercase border rounded-full border-yellow-400/30 bg-yellow-400/10 backdrop-blur-sm">SDM Unggul</span>
            <h2 class="mt-4 mb-4 text-4xl font-black text-white md:text-5xl">Guru & Staf</h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-200">
                Berkenalan dengan para pahlawan tanpa tanda jasa yang berdedikasi membimbing masa depan.
            </p>
        </div>

        @if($tenagaPendidik && $tenagaPendidik->count() > 0)
            <div class="splide splide-tenaga" data-splide='{"type":"loop","perPage":4,"gap":"1.5rem","autoplay":true,"pagination":false,"arrows":true, "breakpoints":{"1024":{"perPage":3},"768":{"perPage":2},"640":{"perPage":1}}}'>
                <div class="py-8 splide__track"> {{-- Padding Y added for hover effect space --}}
                    <ul class="splide__list">
                        @foreach($tenagaPendidik as $guru)
                            <li class="splide__slide">
                                <div class="group relative h-[420px] rounded-[2rem] overflow-hidden bg-white shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100">
                                    {{-- Full Image --}}
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="object-cover object-top w-full h-full transition-transform duration-700 group-hover:scale-105">

                                    {{-- Overlay Gradient --}}
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80"></div>

                                    {{-- Content at Bottom --}}
                                    <div class="absolute bottom-0 left-0 right-0 p-6 transition-transform duration-300 translate-y-2 group-hover:translate-y-0">
                                        <div class="w-12 h-1 mb-4 bg-yellow-400 rounded-full"></div>
                                        <h3 class="mb-1 text-xl font-bold leading-tight text-white">
                                            {{ $guru->nama_lengkap }}
                                        </h3>
                                        <p class="text-sm font-medium tracking-wide text-gray-300 uppercase">
                                            {{ $guru->jenis_gtk }}
                                        </p>

                                        {{-- Hidden Button appears on hover --}}
                                        <div class="h-0 overflow-hidden transition-all duration-500 opacity-0 group-hover:h-auto group-hover:mt-4 group-hover:opacity-100">
                                            <a href="{{ route('guru.show', $guru->id) }}" class="inline-block text-sm font-bold text-yellow-400 hover:text-yellow-300">
                                                Lihat Profil &rarr;
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="py-12 text-center border border-dashed bg-white/10 backdrop-blur-sm rounded-3xl border-white/20">
                <p class="text-white/80">Data tenaga pendidik belum tersedia.</p>
            </div>
        @endif
    </div>
</section>

{{--
    4. GALERI (MODERN: Bento Grid Style)
--}}
<section class="relative py-24 overflow-hidden text-white bg-slate-900">
    {{-- Decorative Blobs --}}
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-600 rounded-full blur-[120px] opacity-20"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-purple-600 rounded-full blur-[120px] opacity-20"></div>

    <div class="container relative z-10 px-4 mx-auto max-w-7xl">
        {{-- Header Section - PERBAIKAN UNTUK MOBILE --}}
        <div class="mb-12">
            <div class="text-center md:text-left">
                <span class="text-sm font-bold tracking-wider text-yellow-400 uppercase">Dokumentasi</span>
                <h2 class="mt-2 text-4xl font-black md:text-5xl">Galeri Kegiatan</h2>
            </div>
            <div class="mt-6 text-center md:text-right md:mt-0">
                <a href="{{ url('gallery-foto') }}" class="inline-block px-6 py-3 text-sm font-semibold transition-all border rounded-full border-slate-600 hover:bg-white hover:text-slate-900">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>

        {{-- Grid Galeri - PERBAIKAN UNTUK MOBILE --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[200px] md:auto-rows-[250px]">
            {{-- Video Utama (Besar) --}}
            @if($videos->first())
                <div class="md:col-span-2 md:row-span-2 rounded-[2rem] overflow-hidden shadow-2xl relative group bg-black">
                    <video class="object-cover w-full h-full transition-opacity opacity-80 group-hover:opacity-100" controls controlslist="nodownload">
                        <source src="{{ asset('storage/' . $videos->first()->file) }}" type="video/mp4">
                    </video>
                    <div class="absolute px-3 py-1 text-xs font-bold tracking-wider text-white uppercase bg-red-600 rounded-full top-4 left-4 md:top-6 md:left-6">
                        Video Terbaru
                    </div>
                </div>
            @endif

            {{-- Foto Grid --}}
            @foreach($photos as $index => $photo)
                <div class="relative rounded-[2rem] overflow-hidden group shadow-lg cursor-pointer bg-slate-800 {{ $index === 0 && !$videos->first() ? 'md:col-span-2 md:row-span-2' : '' }}">
                    <a href="{{ asset('storage/' . $photo->file) }}" class="block w-full h-full gallery-lightbox" data-description="{{ $photo->nama_kegiatan }}">
                        <img src="{{ asset('storage/' . $photo->file) }}" alt="{{ $photo->nama_kegiatan }}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1">

                        <div class="absolute inset-0 transition-colors bg-black/40 group-hover:bg-black/20"></div>

                        <div class="absolute bottom-0 left-0 right-0 p-4 transition-all duration-300 translate-y-4 opacity-0 md:p-6 group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm font-bold text-white md:text-base drop-shadow-md">{{ $photo->nama_kegiatan }}</p>
                        </div>
                    </a>
                </div>
            @endforeach

            {{-- Video Kedua (Jika ada) --}}
            @if($videos->count() > 1)
                <div class="rounded-[2rem] overflow-hidden shadow-lg relative bg-black">
                     <video class="object-cover w-full h-full" controls controlslist="nodownload">
                        <source src="{{ asset('storage/' . $videos[1]->file) }}" type="video/mp4">
                    </video>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Style Tambahan untuk Scrollbar --}}
<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(77, 43, 43, 0.05); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #64748b; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>

<section class="relative py-20 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-purple-600 rounded-full mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute right-0 w-64 h-64 bg-blue-600 rounded-full top-1/3 mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 w-64 h-64 bg-indigo-600 rounded-full left-1/2 mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse"></div>
    </div>

    <div class="container relative z-10 px-4 mx-auto max-w-7xl">
        <div class="mb-16 text-center">
            <span class="inline-block px-6 py-3 mb-6 text-sm font-bold tracking-wider text-yellow-300 uppercase border rounded-full bg-yellow-900/30 backdrop-blur-sm border-yellow-500/30">Ekstrakurikuler & Organisasi</span>
            <h2 class="mt-2 text-4xl font-black text-white md:text-6xl">Organisasi Sekolah</h2>
            <p class="max-w-2xl mx-auto mt-6 text-lg text-slate-300">
                Berbagai organisasi dan ekstrakurikuler yang menunjang pengembangan bakat dan minat siswa.
            </p>
        </div>

        {{-- Carousel Logo Organisasi --}}
        <div class="relative py-12">
            <div class="splide splide-organisasi" data-splide='{"type":"loop","perPage":4,"gap":"2rem","autoplay":true,"pagination":false,"arrows":false,"pauseOnHover":false,"speed":1500,"interval":3500,"breakpoints":{"1024":{"perPage":3,"gap":"1.5rem"},"768":{"perPage":2,"gap":"1rem"},"640":{"perPage":1,"gap":"1rem"}}}'>
                <div class="py-8 splide__track">
                    <ul class="splide__list">
                        
                        {{-- Definisikan Warna untuk Rotasi Tampilan --}}
                        @php
                            $colors = [
                                'from-blue-500 to-cyan-500',
                                'from-red-500 to-pink-500',
                                'from-green-500 to-emerald-500',
                                'from-purple-500 to-violet-500',
                                'from-yellow-500 to-amber-500',
                                'from-orange-500 to-red-500',
                                'from-indigo-500 to-blue-500',
                                'from-pink-500 to-rose-500',
                            ];
                        @endphp

                        {{-- Loop Data Organisasi dari Database --}}
                        @foreach($organisasi as $index => $org)
                            @php
                                // Pilih warna berdasarkan urutan index agar warna-warni
                                $warna = $colors[$index % count($colors)];
                            @endphp

                            <li class="py-4 splide__slide">
                                <div class="relative flex flex-col items-center justify-center h-full p-6 overflow-hidden transition-all duration-700 border shadow-xl group bg-gradient-to-br from-slate-800/50 to-slate-900/50 backdrop-blur-lg rounded-2xl hover:shadow-2xl hover:-translate-y-3 border-slate-700/50">
                                    
                                    {{-- Background Accent (Dinamis) --}}
                                    <div class="absolute inset-0 opacity-0 bg-gradient-to-br {{ $warna }} transition-opacity duration-700 group-hover:opacity-20"></div>

                                    {{-- Glow Effect --}}
                                    <div class="absolute inset-0 transition-opacity duration-700 opacity-0 rounded-2xl group-hover:opacity-100">
                                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br {{ $warna }} blur-md opacity-30"></div>
                                    </div>

                                    {{-- Logo Container --}}
                                    <div class="relative flex items-center justify-center w-24 h-24 mb-5 transition-all duration-700 border shadow-lg bg-slate-800/70 backdrop-blur-sm rounded-xl group-hover:shadow-xl group-hover:scale-110 border-slate-700/50">
                                        <div class="absolute inset-0 rounded-xl bg-gradient-to-br {{ $warna }} opacity-0 group-hover:opacity-20 transition-opacity duration-700"></div>
                                        
                                        {{-- PENTING: Pemanggilan Gambar dari Storage --}}
                                        {{-- Pastikan folder 'public' dihubungkan dengan 'storage' --}}
                                        <img src="{{ asset('storage/' . $org->foto) }}" alt="{{ $org->nama }}" class="relative z-10 object-contain w-16 h-16 filter drop-shadow-lg">
                                    </div>

                                    {{-- Organization Name --}}
                                    <h3 class="relative z-10 text-lg font-bold text-center text-white transition-colors duration-300 group-hover:text-yellow-300">
                                        {{ $org->nama }}
                                    </h3>

                                    {{-- Animated Underline --}}
                                    <div class="relative z-10 w-0 h-0.5 mt-3 transition-all duration-700 bg-gradient-to-r {{ $warna }} group-hover:w-16"></div>

                                    {{-- Decorative Particles --}}
                                    <div class="absolute w-2 h-2 transition-all duration-700 bg-white rounded-full opacity-0 top-4 right-4 group-hover:opacity-60"></div>
                                    <div class="absolute w-2 h-2 transition-all duration-700 bg-white rounded-full opacity-0 bottom-4 left-4 group-hover:opacity-60"></div>
                                    <div class="absolute w-1 h-1 transition-all duration-700 bg-white rounded-full opacity-0 top-1/2 left-4 group-hover:opacity-40"></div>
                                    <div class="absolute w-1 h-1 transition-all duration-700 bg-white rounded-full opacity-0 top-1/2 right-4 group-hover:opacity-40"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Style Tambahan untuk Scrollbar --}}
<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(77, 43, 43, 0.05); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #64748b; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>

@endsection

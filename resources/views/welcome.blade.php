@extends('layouts.app')

@section('content')

{{-- 
    =========================================================
    BAGIAN LOGIKA PHP (TIDAK BERUBAH)
    =========================================================
--}}
@php
    use App\Models\Banner;
    use App\Models\Berita;
    use App\Models\Guru;
    use App\Models\Galeri;
    use Illuminate\Support\Str;

    $banners = Banner::latest()->get();
    $beritaTerbaru = Berita::where('status', 'publish')->latest()->take(6)->get();
    $tenagaPendidik = Guru::latest()->get();
    $photos = Galeri::where('tipe', 'foto')->latest()->take(4)->get();
    $videos = Galeri::where('tipe', 'video')->latest()->take(2)->get();
@endphp

{{-- 
    =========================================================
    1. BAGIAN BANNER SLIDER
    =========================================================
--}}
<section id="banner-slider" class="relative splide"
         aria-label="Banner dan Pengumuman Sekolah"
         data-splide='{"type":"loop","arrows":false,"autoplay":true,"interval":3000,"pauseOnHover":false,"pauseOnFocus":false,"pagination":true}'>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($banners as $banner)
                <li class="splide__slide">
                    <div class="relative w-full h-[600px] overflow-hidden">
                        <img src="{{ asset('storage/' . $banner->foto) }}"
                             alt="Banner Sekolah"
                             class="absolute inset-0 z-0 object-cover w-full h-full" />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 z-20 max-w-3xl p-8 text-white md:p-16">
        <div class="inline-flex items-center gap-3 mb-6">
            <span class="block w-20 h-1.5 bg-yellow-400 rounded-full animate-pulse shadow-lg shadow-yellow-400/50"></span>
        </div>
        <h1 class="text-4xl font-extrabold leading-tight tracking-tight md:text-6xl lg:text-7xl drop-shadow-lg">
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-amber-600">
                SELAMAT DATANG
            </span>
            <span class="block mt-2 text-2xl font-bold text-white md:text-4xl">DI SMP NEGERI 1 MENGGALA</span>
        </h1>
        <div class="flex items-center gap-4 mt-8">
            <a href="{{ url('kata-sambutan') }}" class="inline-flex items-center gap-2 px-6 py-3 text-base font-bold text-yellow-900 transition-transform transform bg-yellow-400 rounded-full shadow-lg hover:bg-yellow-300 hover:-translate-y-1">
                Pelajari Selengkapnya
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

{{-- 
    =========================================================
    2. BAGIAN BERITA TERBARU (CLEAN & CARD STYLE)
    =========================================================
--}}
<div class="py-24 bg-white relative">
    {{-- Hiasan Background Abstrak --}}
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50/50 -z-10 clip-path-slant"></div>

    <div class="container mx-auto max-w-7xl px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-2xl">
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Berita & Artikel</h2>
                <div class="h-1.5 w-24 bg-yellow-500 mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-slate-500">Ikuti perkembangan terbaru, prestasi siswa, dan kegiatan seru di sekolah kami.</p>
            </div>
            <a href="/informasi" class="hidden md:inline-flex items-center gap-2 font-semibold text-yellow-600 hover:text-yellow-700 transition-colors mt-4 md:mt-0">
                Lihat Semua Berita <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($beritaTerbaru as $berita)
                <article class="group flex flex-col h-full bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl hover:shadow-gray-200/50 transition-all duration-300 transform hover:-translate-y-2">
                    {{-- Image Wrapper --}}
                    <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="relative h-56 overflow-hidden">
                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}" 
                             alt="{{ $berita->judul }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        {{-- Date Badge Floating --}}
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur shadow-sm px-3 py-1.5 rounded-lg flex flex-col items-center text-center border border-gray-100">
                            <span class="text-xs font-bold text-gray-400 uppercase">{{ $berita->created_at->format('M') }}</span>
                            <span class="text-lg font-extrabold text-slate-800 leading-none">{{ $berita->created_at->format('d') }}</span>
                        </div>
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>

                    {{-- Content --}}
                    <div class="flex flex-col flex-1 p-6">
                        <div class="mb-3 flex items-center gap-2 text-xs font-medium text-yellow-600">
                            <span class="bg-yellow-50 px-2 py-1 rounded-md">Berita Sekolah</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 leading-snug mb-3 group-hover:text-yellow-600 transition-colors">
                            <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}">
                                {{ Str::limit($berita->judul, 55) }}
                            </a>
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4 flex-1">
                            {{ Str::limit(strip_tags($berita->isi ?? 'Klik untuk membaca selengkapnya berita ini.'), 100) }}
                        </p>
                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                {{ $berita->views ?? 0 }} Views
                            </span>
                            <span class="text-yellow-600 text-sm font-semibold group-hover:translate-x-1 transition-transform">Baca &rarr;</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <div class="text-gray-400 mb-3">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <p class="text-lg text-gray-500 font-medium">Belum ada berita terbaru.</p>
                </div>
            @endforelse
        </div>
        
        {{-- Mobile Button --}}
        <div class="mt-10 text-center md:hidden">
            <a href="/informasi" class="inline-block px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-bold">Lihat Semua Berita</a>
        </div>
    </div>
</div>
{{-- 
    =========================================================
    3. BAGIAN TENAGA PENDIDIK (BACKGROUND: SLATE/KEBIRUAN)
    =========================================================
--}}
<section class="py-24 bg-slate-300 relative overflow-hidden"> {{-- bg-slate-50 memberikan kesan elegan & formal --}}
    
    {{-- Dekorasi Blob diubah warnanya agar kontras dengan Slate --}}
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl -z-10 opacity-60"></div>
    <div class="absolute top-1/2 -left-24 w-72 h-72 bg-blue-100 rounded-full blur-3xl -z-10 opacity-60"></div>

    <div class="container px-4 mx-auto max-w-7xl">
        <div class="text-center mb-20">
            <span class="text-yellow-600 font-bold tracking-widest uppercase text-sm bg-yellow-100 px-3 py-1 rounded-full">SDM Unggul</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-6">Tenaga Pendidik</h2>
            <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto rounded-full shadow-md"></div>
            <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">Guru-guru Berdedikasi Tinggi Yang Siap Membimbing Siswa Menuju Masa Depan Yang Gemilang.</p>
        </div>
        @if($tenagaPendidik && $tenagaPendidik->count() > 0)
            <div class="relative overflow-visible splide splide-tenaga" aria-label="Slider Tenaga Pendidik" data-splide='{"type":"loop","perPage":4,"perMove":1,"gap":"2rem","autoplay":true,"interval":3000,"arrows":true,"pagination":false,"breakpoints":{"1024":{"perPage":3},"768":{"perPage":2},"480":{"perPage":1}}}'>
                <div class="splide__track p-4"> 
                    <ul class="splide__list">
                        @foreach($tenagaPendidik as $guru)
                            <li class="splide__slide">
                                <a href="{{ route('guru.show', $guru->id) }}" class="group block bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                    <div class="relative h-72 overflow-hidden bg-gray-100">
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="object-cover object-top w-full h-full transition-transform duration-700 group-hover:scale-105">
                                    </div>
                                    <div class="p-6 text-center relative -mt-12 z-20">
                                        <div class="mx-auto w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center border-4 border-white shadow-lg mb-3 group-hover:bg-yellow-300 transition-colors">
                                            <svg class="w-8 h-8 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">{{ $guru->nama_lengkap }}</h3>
                                        <p class="text-sm font-medium text-gray-500 mt-1 uppercase tracking-wide">{{ $guru->jenis_gtk }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-xl border border-dashed border-gray-300"><p class="text-lg text-gray-500">Data tenaga pendidik belum tersedia.</p></div>
        @endif
    </div>
</section>

{{-- 
    =========================================================
    4. BAGIAN GALERI FOTO & VIDEO (BACKGROUND: AMBER/ORANGE MUDA)
    =========================================================
--}}
<section class="py-24 bg-amber-50 border-t border-orange-100"> {{-- bg-amber-50 agar senada dengan warna sekolah --}}
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="text-center mb-16"> 
            <span class="text-yellow-600 font-bold tracking-widest uppercase text-sm bg-yellow-100 px-3 py-1 rounded-full">Dokumentasi</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-4 mb-6">Galeri Foto & Video</h2>
            <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto rounded-full shadow-md"></div>
        </div>

        {{-- GRID UTAMA: KIRI (FOTO) - KANAN (VIDEO) --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- BAGIAN KIRI: FOTO (GRID) --}}
            <div class="grid grid-cols-2 gap-4 h-full">
                @forelse($photos as $photo)
                    <div class="relative group overflow-hidden rounded-2xl shadow-md h-48 md:h-64 border border-gray-200">
                        <a href="{{ asset('storage/' . $photo->file) }}" class="gallery-lightbox block w-full h-full" data-description="{{ $photo->nama_kegiatan }}">
                            
                            <img src="{{ asset('storage/' . $photo->file) }}" 
                                 alt="{{ $photo->nama_kegiatan }}" 
                                 class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            
                            {{-- TEKS FOTO --}}
                            <div class="absolute inset-0 flex flex-col items-center justify-end p-4 bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                                <p class="text-white font-bold text-sm md:text-base text-center drop-shadow-md">{{ $photo->nama_kegiatan }}</p>
                                <div class="w-8 h-1 bg-yellow-400 mt-2 rounded"></div> 
                            </div>

                        </a>
                    </div>
                @empty
                    <div class="col-span-2 bg-white rounded-2xl h-64 flex items-center justify-center text-gray-500 shadow-sm">
                        Galeri Foto Belum Tersedia
                    </div>
                @endforelse
            </div>

            {{-- BAGIAN KANAN: VIDEO (STACK) --}}
            <div class="flex flex-col gap-6 h-full">
                @foreach($videos as $video)
                    <div class="relative w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200 bg-white h-64 md:h-[265px]">
                        <video class="w-full h-full object-cover" controls controlslist="nodownload">
                            <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                @endforeach

                {{-- Placeholder Jika Video Kurang --}}
                @php $sisaSlot = 2 - $videos->count(); @endphp
                @for($i = 0; $i < $sisaSlot; $i++)
                    <div class="relative w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200 bg-gray-900 h-64 md:h-[265px] flex items-center justify-center">
                         <p class="text-gray-400 text-sm">Slot Video Kosong</p>
                    </div>
                @endfor
            </div>

        </div>
        
        {{-- TOMBOL LIHAT SEMUA --}}
        <div class="mt-12 text-center">
            <a href="{{ url('gallery-foto') }}" class="inline-flex items-center gap-2 px-8 py-3 text-base font-bold text-yellow-900 bg-yellow-400 rounded-full shadow-lg hover:bg-yellow-300 transition-transform transform hover:-translate-y-1">
                Lihat Galeri Lengkap
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

    </div>
</section>

@endsection
@extends('layouts.app')

@section('content')

{{-- 
    =========================================================
    BAGIAN LOGIKA PHP
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

    // LOGIKA BERITA BARU (SPLIT DATA)
    $allBerita = Berita::where('status', 'publish')->latest()->get();
    $beritaUtama = $allBerita->take(4);
    $beritaLama = $allBerita->skip(4);
@endphp

{{-- 1. BAGIAN BANNER SLIDER --}}
<section id="banner-slider" class="relative splide"
         aria-label="Banner dan Pengumuman Sekolah"
         data-splide='{"type":"loop","arrows":false,"autoplay":true,"interval":3000,"pauseOnHover":false,"pauseOnFocus":false,"pagination":true}'>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($banners as $banner)
                <li class="splide__slide">
                    <div class="relative w-full h-[600px] overflow-hidden">
                        <img src="{{ asset('storage/' . $banner->foto) }}" alt="Banner" class="absolute inset-0 z-0 object-cover w-full h-full" />
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
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-amber-600">SELAMAT DATANG</span>
            <span class="block mt-2 text-2xl font-bold text-white md:text-4xl">DI SMP NEGERI 1 MENGGALA</span>
        </h1>
        <div class="flex items-center gap-4 mt-8">
            <a href="{{ url('kata-sambutan') }}" class="inline-flex items-center gap-2 px-6 py-3 text-base font-bold text-yellow-900 transition-transform transform bg-yellow-400 rounded-full shadow-lg hover:bg-yellow-300 hover:-translate-y-1">
                Pelajari Selengkapnya <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

{{-- 
    =========================================================
    2. BAGIAN BERITA TERBARU (LAYOUT HIBRIDA: GRID & SCROLLABLE LIST)
    =========================================================
--}}
<div class="py-24 bg-white relative">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50/50 -z-10 clip-path-slant"></div>

    <div class="container mx-auto max-w-7xl px-4">
        
        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 border-b border-gray-100 pb-6">
            <div class="border-l-8 border-yellow-500 pl-6">
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Berita & Artikel</h2>
                <p class="mt-3 text-lg text-gray-500">Update Kegiatan dan Prestasi Terkini Sekolah.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- KOLOM KIRI (2/3): BERITA UTAMA (GRID BESAR) --}}
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($beritaUtama as $berita)
                    <article class="group flex flex-col bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                        <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="relative h-52 overflow-hidden">
                            <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute top-4 right-4 bg-white/95 shadow-sm px-3 py-1 rounded-lg text-center border border-gray-100">
                                <span class="block text-xs font-bold text-gray-400 uppercase">{{ $berita->created_at->format('M') }}</span>
                                <span class="block text-lg font-extrabold text-slate-800 leading-none">{{ $berita->created_at->format('d') }}</span>
                            </div>
                        </a>
                        <div class="flex flex-col flex-1 p-6">
                            <h3 class="text-lg font-bold text-slate-800 leading-snug mb-3 group-hover:text-blue-700 transition-colors line-clamp-2">
                                <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}">{{ $berita->judul }}</a>
                            </h3>
                            <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ Str::limit(strip_tags($berita->isi), 80) }}</p>
                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs text-gray-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    {{ $berita->views ?? 0 }}
                                </span>
                                <span class="text-yellow-600 text-xs font-bold uppercase tracking-wide group-hover:underline">Baca Selengkapnya</span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-2 py-12 text-center text-gray-500">Belum ada berita terbaru.</div>
                @endforelse
            </div>

            {{-- 
                KOLOM KANAN (1/3): BERITA LAINNYA (SCROLLABLE LIST)
            --}}
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-slate-800 to-blue-900 text-white rounded-3xl shadow-xl p-6 h-full relative overflow-hidden flex flex-col">
                    
                    {{-- Judul Tetap (Sticky Header) --}}
                    <h3 class="text-xl font-extrabold text-white mb-4 pb-3 border-b-2 border-yellow-400 flex-shrink-0">
                        Berita Lainnya
                    </h3>

                    {{-- AREA SCROLLABLE --}}
                    <div class="space-y-6 overflow-y-auto max-h-[600px] pr-2 custom-scrollbar">
                        @forelse ($beritaLama as $berita)
                            <div class="group flex gap-4 items-start">
                                <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden shadow-sm relative border border-slate-600 group-hover:border-yellow-400 transition-colors">
                                    <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}" 
                                         alt="{{ $berita->judul }}" 
                                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                </a>
                                
                                <div>
                                    <h4 class="text-sm font-bold text-gray-200 leading-snug group-hover:text-yellow-400 transition-colors mb-1 line-clamp-2">
                                        <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}">{{ $berita->judul }}</a>
                                    </h4>
                                    
                                    <div class="flex items-center gap-3 text-xs text-gray-400">
                                        {{-- Tanggal --}}
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ $berita->created_at->format('d M Y') }}
                                        </span>
                                        
                                        {{-- Views (Penambahan Baru Disini) --}}
                                        <span class="flex items-center gap-1 border-l border-gray-600 pl-3">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            {{ $berita->views ?? 0 }}
                                        </span>
                                    </div>

                                </div>
                            </div>
                            
                            @if(!$loop->last)
                                <div class="border-b border-gray-700 border-dashed"></div>
                            @endif
                        @empty
                            <p class="text-sm text-gray-400 text-center py-4">Tidak ada berita lain.</p>
                        @endforelse
                    </div>

                    {{-- Tombol Lihat Semua (Sticky Footer) --}}
                    <div class="mt-4 pt-4 border-t border-gray-700 text-center flex-shrink-0 lg:hidden">
                        <a href="/informasi" class="text-sm font-bold text-yellow-400 hover:text-yellow-300 transition-colors">Lihat Arsip Berita &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- 
    STYLE TAMBAHAN UNTUK SCROLLBAR (Opsional)
--}}
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1); 
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #fbbf24;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #f59e0b; 
    }
</style>

{{-- 3. BAGIAN TENAGA PENDIDIK (TIDAK BERUBAH) --}}
<section class="py-24 bg-gradient-to-b from-blue-900 to-slate-900 relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl -z-10 opacity-60"></div>
    <div class="absolute top-1/2 -left-24 w-72 h-72 bg-blue-100 rounded-full blur-3xl -z-10 opacity-60"></div>
    <div class="container px-4 mx-auto max-w-7xl">
        <div class="text-center mb-20">
            <span class="text-yellow-600 font-bold tracking-widest uppercase text-sm bg-yellow-100 px-3 py-1 rounded-full">SDM Unggul</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-4 mb-6">Tenaga Pendidik</h2>
            <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto rounded-full shadow-md"></div>
            <p class="mt-6 text-lg text-white max-w-2xl mx-auto leading-relaxed">Guru-guru Berdedikasi Tinggi Yang Siap Membimbing Siswa Menuju Masa Depan Yang Gemilang.</p>
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

{{-- 4. BAGIAN GALERI FOTO & VIDEO (TIDAK BERUBAH) --}}
<section class="py-24 bg-amber-50 border-t border-orange-100">
    <div class="container px-4 mx-auto max-w-7xl">
        <div class="text-center mb-16"> 
            <span class="text-yellow-600 font-bold tracking-widest uppercase text-sm bg-yellow-100 px-3 py-1 rounded-full">Dokumentasi Sekolah</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-4 mb-6">Galeri Foto & Video</h2>
            <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto rounded-full shadow-md"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="grid grid-cols-2 gap-4 h-full">
                @forelse($photos as $photo)
                    <div class="relative group overflow-hidden rounded-2xl shadow-md h-48 md:h-64 border border-gray-200">
                        <a href="{{ asset('storage/' . $photo->file) }}" class="gallery-lightbox block w-full h-full" data-description="{{ $photo->nama_kegiatan }}">
                            <img src="{{ asset('storage/' . $photo->file) }}" alt="{{ $photo->nama_kegiatan }}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 flex flex-col items-center justify-end p-4 bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                                <p class="text-white font-bold text-sm md:text-base text-center drop-shadow-md">{{ $photo->nama_kegiatan }}</p>
                                <div class="w-8 h-1 bg-yellow-400 mt-2 rounded"></div> 
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-2 bg-white rounded-2xl h-64 flex items-center justify-center text-gray-500 shadow-sm">Galeri Foto Belum Tersedia</div>
                @endforelse
            </div>
            <div class="flex flex-col gap-6 h-full">
                @foreach($videos as $video)
                    <div class="relative w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200 bg-white h-64 md:h-[265px]">
                        <video class="w-full h-full object-cover" controls controlslist="nodownload">
                            <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                @endforeach
                @php $sisaSlot = 2 - $videos->count(); @endphp
                @for($i = 0; $i < $sisaSlot; $i++)
                    <div class="relative w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200 bg-gray-900 h-64 md:h-[265px] flex items-center justify-center">
                         <p class="text-gray-400 text-sm">Slot Video Kosong</p>
                    </div>
                @endfor
            </div>
        </div>
        <div class="mt-12 text-center">
            <a href="{{ url('gallery-foto') }}" class="inline-flex items-center gap-2 px-8 py-3 text-base font-bold text-yellow-900 bg-yellow-400 rounded-full shadow-lg hover:bg-yellow-300 transition-transform transform hover:-translate-y-1">
                Lihat Galeri Lengkap <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')

@section('content')

{{--
    BACKGROUND UTAMA:
    - Menggunakan gradasi 'from-orange-200 to-yellow-200' (Konsisten).
    - 'min-h-screen' dan '-mb-20' untuk perbaikan layout footer.
--}}
<div class="relative w-full min-h-screen -mb-20 overflow-hidden bg-gradient-to-br from-orange-200 to-yellow-200">

    {{-- Elemen Dekorasi Background --}}
    <div class="absolute top-0 left-0 z-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute bg-blue-500 rounded-full -top-24 -right-24 w-96 h-96 blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 bg-purple-500 rounded-full -left-24 w-72 h-72 blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    </div>

    {{-- CONTAINER UTAMA --}}
    <div class="container relative z-10 px-4 py-16 pb-40 mx-auto max-w-7xl">

        {{-- HEADER JUDUL --}}
        <div class="mb-12 overflow-hidden bg-white shadow-2xl rounded-xl">
            <div class="relative p-8 overflow-hidden bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                {{-- Pattern Overlay --}}
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                <h1 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5.5V18a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v2.5"></path></svg>
                    Galeri Kegiatan Sekolah
                </h1>
            </div>
        </div>

        @if($photos && $photos->count() > 0)

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4">
                {{-- Loop Foto --}}
                @foreach($photos as $photo)
                    {{-- Container Kartu --}}
                    <div class="relative overflow-hidden transition-all duration-300 transform bg-white border-4 border-white shadow-xl rounded-xl group hover:-translate-y-1 hover:shadow-2xl">

                        {{-- 1. Link & Gambar --}}
                        {{-- Link inilah yang membuka Pop-up Lightbox --}}
                        <a href="{{ asset('storage/' . $photo->file) }}"
                           class="block w-full h-full gallery-lightbox"
                           data-description="{{ $photo->nama_kegiatan }}">

                            <img src="{{ asset('storage/' . $photo->file) }}"
                                 alt="{{ $photo->nama_kegiatan }}"
                                 class="object-cover w-full h-64 transition-transform duration-700 md:h-72 group-hover:scale-110">
                        </a>

                        {{-- 2. Overlay Teks (Tampilan di Thumbnail/Grid) --}}
                        <div class="absolute inset-0 flex items-end transition-opacity duration-300 opacity-0 pointer-events-none group-hover:opacity-100">

                            {{-- Gradasi background --}}
                            <div class="w-full p-4 bg-gradient-to-t from-black/90 via-black/70 to-transparent">

                                <h3 class="text-lg font-bold leading-snug tracking-tight text-center text-white drop-shadow-md">
                                    {{ $photo->nama_kegiatan }}
                                </h3>

                                <div class="w-32 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto mt-2 rounded shadow-sm"></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        @else
            {{-- Tampilan jika galeri kosong --}}
            <div class="max-w-2xl p-16 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5.5V18a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v2.5"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Galeri Masih Kosong</h3>
                <p class="mt-3 text-lg text-gray-600">Belum ada foto kegiatan yang diunggah saat ini.</p>
            </div>
        @endif

    </div>
</div>

{{--
    =========================================================
    CSS KHUSUS UNTUK POP-UP (LIGHTBOX) AGAR TEKS DI TENGAH
    =========================================================
--}}
<style>
    /* GLightbox (Library yang paling umum dipakai di template Laravel) */
    .gslide-desc,
    .gslide-title,
    .glightbox-desc {
        text-align: center !important;  /* Paksa teks ke tengah */
        margin-left: auto !important;   /* Pastikan margin otomatis */
        margin-right: auto !important;
        width: 100% !important;         /* Pastikan lebar penuh */
    }

    /* SimpleLightbox (Jika pakai library ini) */
    .sl-caption {
        text-align: center !important;
        justify-content: center !important;
    }

    /* Fancybox (Jika pakai library ini) */
    .fancybox-caption {
        text-align: center !important;
        width: 100% !important;
    }
</style>

@endsection

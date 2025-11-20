@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        {{-- Header Judul --}}
        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Galeri Kegiatan Sekolah
                </h1>
            </div>
        </div>

        @if($photos && $photos->count() > 0)

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4"> 
                {{-- Loop Foto --}}
                @foreach($photos as $photo)
                    {{-- Container Kartu --}}
                    <div class="relative overflow-hidden shadow-xl rounded-xl group border-2 border-transparent hover:border-yellow-500 transition-all duration-300">

                        {{-- 1. Link & Gambar --}}
                        {{-- Link inilah yang membuka Pop-up Lightbox --}}
                        <a href="{{ asset('storage/' . $photo->file) }}"
                           class="gallery-lightbox block w-full h-full"
                           data-description="{{ $photo->nama_kegiatan }}">

                            <img src="{{ asset('storage/' . $photo->file) }}"
                                 alt="{{ $photo->nama_kegiatan }}"
                                 class="object-cover w-full h-56 md:h-64 transition-transform duration-500 group-hover:scale-110">
                        </a>

                        {{-- 2. Overlay Teks (Tampilan di Thumbnail/Grid) --}}
                        <div class="absolute inset-0 flex items-end pointer-events-none">
                            
                            {{-- Gradasi background --}}
                            <div class="w-full p-4 bg-gradient-to-t from-black/90 via-black/60 to-transparent">
                                
                                <h3 class="text-lg font-bold text-white text-center tracking-tight leading-snug drop-shadow-md">
                                    {{ $photo->nama_kegiatan }}
                                </h3>
                                
                                <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto mt-2 rounded shadow-sm"></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        @else
            {{-- Tampilan jika galeri kosong --}}
            <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5.5V18a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v2.5"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Galeri Masih Kosong</h3>
                <p class="mt-2 text-gray-500">Belum ada foto kegiatan yang diunggah saat ini.</p>
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
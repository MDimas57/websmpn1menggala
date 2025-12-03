@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN GALERI FOTO (MODERN GRID STYLE)
    =========================================================
--}}

<div class="relative w-full min-h-screen -mb-20 overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-60 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-yellow-100 rounded-full blur-3xl opacity-60 translate-y-1/3 -translate-x-1/4"></div>
    </div>

    {{--
        2. CONTAINER UTAMA (PERBAIKAN)
        Dulu: py-16 -> Tertutup header fixed
        Sekarang: pt-36 (144px) -> Aman dari header fixed h-24
    --}}
    <div class="container relative z-10 px-4 pb-40 mx-auto pt-36 max-w-7xl">

        {{-- Header Halaman --}}
        <div class="flex flex-col items-center mb-16 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Dokumentasi
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Galeri Kegiatan
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
            <p class="max-w-2xl mt-4 text-lg text-slate-600">
                Rekam jejak aktivitas dan momen berharga warga sekolah.
            </p>
        </div>

        @if($photos && $photos->count() > 0)

            {{-- GRID GALERI --}}
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($photos as $photo)
                    {{-- ITEM KARTU --}}
                    <div class="group relative rounded-[2rem] overflow-hidden shadow-lg bg-slate-200 hover:shadow-2xl hover:shadow-slate-300 transition-all duration-500 cursor-pointer h-72 md:h-80">

                        {{-- Link Lightbox --}}
                        <a href="{{ asset('storage/' . $photo->file) }}"
                           class="relative block w-full h-full gallery-lightbox"
                           data-description="{{ $photo->nama_kegiatan }}">

                            {{-- Gambar --}}
                            <img src="{{ asset('storage/' . $photo->file) }}"
                                 alt="{{ $photo->nama_kegiatan }}"
                                 class="object-cover w-full h-full transition-transform duration-700 ease-in-out group-hover:scale-110">

                            {{-- Overlay Hover Effect --}}
                            <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-6 text-center backdrop-blur-[2px]">

                                {{-- Icon Zoom --}}
                                <div class="flex items-center justify-center w-12 h-12 mb-4 transition-transform duration-500 delay-100 transform translate-y-4 bg-yellow-400 rounded-full shadow-lg text-slate-900 group-hover:translate-y-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                </div>

                                {{-- Judul Kegiatan --}}
                                <h3 class="text-lg font-bold leading-snug text-white transition-transform duration-500 delay-75 transform translate-y-4 group-hover:translate-y-0">
                                    {{ $photo->nama_kegiatan }}
                                </h3>

                                {{-- Garis Hiasan --}}
                                <div class="w-16 h-1 mt-3 transition-transform duration-500 delay-150 transform scale-x-0 bg-yellow-400 rounded group-hover:scale-x-100"></div>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Pagination (Jika diperlukan nanti) --}}
            <div class="flex justify-center mt-12">
                {{-- {{ $photos->links() }} --}}
            </div>

        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-slate-100">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5.5V18a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v2.5"></path></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900">Galeri Belum Tersedia</h3>
                <p class="mb-6 text-slate-500">Belum ada foto kegiatan yang diunggah oleh administrator.</p>
                <a href="/" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white rounded-full font-bold hover:bg-slate-800 transition">
                    Kembali ke Beranda
                </a>
            </div>
        @endif

    </div>
</div>

{{--
    CSS TAMBAHAN UNTUK LIGHTBOX
    Memastikan caption berada di tengah
--}}
<style>
    .gslide-desc, .gslide-title, .glightbox-desc {
        text-align: center !important;
        margin-left: auto !important;
        margin-right: auto !important;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
    }
    .glightbox-clean .gslide-title {
        color: #fbbf24 !important; /* Yellow-400 title */
        font-weight: bold;
    }
</style>

@endsection

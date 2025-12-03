@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN GALERI VIDEO (MODERN CINEMA STYLE)
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
                Dokumentasi Digital
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Galeri Video
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
            <p class="max-w-2xl mt-4 text-lg text-slate-600">
                Kumpulan video kegiatan, profil, dan prestasi sekolah.
            </p>
        </div>

        @if($videos && $videos->count() > 0)

            {{-- GRID VIDEO --}}
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($videos as $video)
                    {{-- KARTU VIDEO --}}
                    <div class="group flex flex-col bg-white rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300 border border-slate-100">

                        {{-- Area Player Video --}}
                        <div class="relative w-full overflow-hidden aspect-video bg-slate-900">
                            {{-- Pattern hiasan di balik video (jika video loading/transparent) --}}
                            <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>

                            <video class="relative object-cover w-full h-full" controls controlslist="nodownload" preload="metadata">
                                <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>

                            {{-- Badge "VIDEO" pojok atas (Opsional) --}}
                            <div class="absolute pointer-events-none top-4 right-4">
                                <span class="px-3 py-1 bg-red-600/90 backdrop-blur text-white text-[10px] font-bold uppercase tracking-wider rounded-full shadow-lg flex items-center gap-1">
                                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                    Play
                                </span>
                            </div>
                        </div>

                        {{-- Area Informasi --}}
                        <div class="relative flex flex-col flex-1 p-6">
                            {{-- Dekorasi Garis Kuning --}}
                            <div class="absolute top-0 w-12 h-1 bg-yellow-400 rounded-b-lg left-6"></div>

                            {{-- Tanggal --}}
                            <div class="flex items-center gap-2 mt-2 mb-3 text-xs font-bold tracking-wider uppercase text-slate-400">
                                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $video->created_at->format('d M Y') }}
                            </div>

                            {{-- Judul --}}
                            <h3 class="mb-2 text-xl font-bold leading-snug transition-colors text-slate-800 group-hover:text-yellow-600 line-clamp-2">
                                {{ $video->nama_kegiatan }}
                            </h3>

                            {{-- Deskripsi Singkat (Jika ada field deskripsi, bisa ditambahkan disini) --}}
                            {{-- <p class="text-sm text-slate-500 line-clamp-2">Deskripsi video...</p> --}}

                            {{-- Footer Kartu --}}
                            <div class="flex items-center justify-between pt-4 mt-auto border-t border-slate-50">
                                <span class="text-xs font-medium text-slate-400">SMPN 1 Menggala</span>
                                <div class="flex items-center justify-center w-8 h-8 transition-colors rounded-full bg-slate-50 text-slate-400 group-hover:bg-yellow-400 group-hover:text-slate-900">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Pagination Placehodler --}}
            <div class="flex justify-center mt-12">
                {{-- {{ $videos->links() }} --}}
            </div>

        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-slate-100">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.55 4.55a2 2 0 010 2.83L15 22.95m-3-17l4.55 4.55a2 2 0 010 2.83L12 18.95M7.45 7.45l2.83 2.83a2 2 0 002.83 0L17 7.45m-7-2l4.55 4.55a2 2 0 010 2.83L14.55 12"></path></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900">Galeri Video Kosong</h3>
                <p class="mb-6 text-slate-500">Belum ada dokumentasi video yang tersedia saat ini.</p>
                <a href="/" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white rounded-full font-bold hover:bg-slate-800 transition">
                    Kembali ke Beranda
                </a>
            </div>
        @endif

    </div>
</div>

@endsection

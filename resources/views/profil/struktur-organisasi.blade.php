@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN STRUKTUR SEKOLAH (MODERN CARD STYLE)
    =========================================================
--}}

{{-- Wrapper Utama: Hapus -mb-20 agar footer tidak ketimpah --}}
<div class="relative w-full min-h-screen overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND (Konsisten dengan halaman lain) --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-60 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-yellow-100 rounded-full blur-3xl opacity-60 translate-y-1/3 -translate-x-1/4"></div>
    </div>

    {{--
        2. CONTAINER UTAMA (PERBAIKAN)
        - Hapus pb-40, ganti jadi pb-24 agar jarak ke footer proporsional.
        - pt-36 (144px) tetap dipertahankan agar aman dari header fixed.
    --}}
    <div class="container relative z-10 px-4 pb-24 mx-auto pt-36 max-w-7xl">

        {{-- Header Halaman --}}
        <div class="flex flex-col items-center mb-16 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Organisasi
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Struktur Sekolah
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
            <p class="max-w-2xl mt-4 text-lg text-slate-600">
                Bagan struktur organisasi dan tata kelola SMP Negeri 1 Menggala.
            </p>
        </div>

        @if($struktur && $struktur->count() > 0)
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">

                @foreach($struktur as $item)
                    {{-- CARD STRUKTUR --}}
                    <div class="group relative bg-white rounded-[2.5rem] overflow-hidden shadow-xl border border-slate-100 flex flex-col hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">

                        {{-- Header Card (Judul) --}}
                        <div class="relative z-20 flex items-center justify-between px-8 py-6 bg-slate-900">
                            <div>
                                <h2 class="text-xl font-bold tracking-wide text-white">
                                    {{ $item->judul }}
                                </h2>
                                <div class="w-12 h-1 mt-2 bg-yellow-400 rounded-full"></div>
                            </div>
                            {{-- Icon Dekorasi --}}
                            <div class="flex items-center justify-center w-10 h-10 text-yellow-400 rounded-full bg-white/10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                        </div>

                        {{-- Area Gambar --}}
                        <div class="relative flex-1 overflow-hidden bg-slate-100 group">

                            {{-- Pattern Background di belakang gambar (untuk gambar transparan) --}}
                            <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')]"></div>

                            {{-- Gambar Utama --}}
                            {{-- Menggunakan link ke file asli agar bisa di-zoom/download --}}
                            <a href="{{ asset('storage/'. $item->foto) }}" target="_blank" class="block relative w-full h-full min-h-[300px] cursor-zoom-in">
                                <img src="{{ asset('storage/'. $item->foto) }}"
                                     alt="{{ $item->judul }}"
                                     class="object-contain w-full h-full p-4 transition-transform duration-700 ease-in-out group-hover:scale-105">

                                {{-- Overlay Hover --}}
                                <div class="absolute inset-0 flex items-center justify-center transition-colors duration-300 bg-slate-900/0 group-hover:bg-slate-900/10">
                                    <span class="flex items-center gap-2 px-4 py-2 text-sm font-bold transition-all duration-300 transform translate-y-4 bg-white rounded-full shadow-lg opacity-0 group-hover:opacity-100 group-hover:translate-y-0 text-slate-900">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        Lihat Ukuran Penuh
                                    </span>
                                </div>
                            </a>
                        </div>

                        {{-- Footer Card (Opsional, info tambahan) --}}
                        <div class="flex items-center justify-between px-6 py-3 bg-white border-t border-slate-100">
                            <span class="text-xs font-bold tracking-widest uppercase text-slate-400">Dokumen Resmi</span>
                            <a href="{{ asset('storage/'. $item->foto) }}" download class="flex items-center gap-1 text-xs font-bold text-yellow-600 transition-colors hover:text-yellow-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-slate-100">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900">Struktur Belum Tersedia</h3>
                <p class="mb-6 text-slate-500">Data struktur organisasi belum diunggah oleh administrator.</p>
                <a href="/" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white rounded-full font-bold hover:bg-slate-800 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Beranda
                </a>
            </div>
        @endif

    </div>
</div>

@endsection

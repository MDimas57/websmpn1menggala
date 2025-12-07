@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN INFORMASI SEKOLAH (MODERN DOCS LAYOUT)
    =========================================================
--}}

{{-- Wrapper Utama: Hapus -mb-20 agar footer tidak ketimpah --}}
<div class="relative w-full min-h-screen overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND --}}
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
        <div class="flex flex-col items-center mb-12 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Pusat Informasi
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Informasi Sekolah
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
        </div>

        <div class="grid items-start grid-cols-1 gap-8 lg:grid-cols-4">

            {{--
                A. KOLOM KIRI: SIDEBAR NAVIGASI (Dark Theme)
                Sticky agar menu tetap ada saat konten panjang discroll
                PERBAIKAN: top-32 agar tidak nempel header
            --}}
            <div class="lg:col-span-1 lg:sticky lg:top-32">
                <div class="bg-slate-900 rounded-[2rem] p-6 shadow-2xl overflow-hidden relative">

                    {{-- Judul Menu --}}
                    <h3 class="flex items-center gap-3 pb-4 mb-6 text-lg font-bold text-white border-b border-slate-700">
                        <span class="w-1.5 h-6 bg-yellow-500 rounded-full"></span>
                        Daftar Menu
                    </h3>

                    {{-- List Menu --}}
                    <nav class="flex flex-col space-y-2">
                        @forelse($semuaInformasi as $infoLink)
                            @php
                                $isActive = isset($infoDetail) && $infoDetail->id == $infoLink->id;
                            @endphp

                            <a href="{{ route('informasi.show', $infoLink->id) }}"
                               class="group flex items-center justify-between px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-300
                               {{ $isActive
                                    ? 'bg-yellow-500 text-slate-900 shadow-lg shadow-yellow-500/20 translate-x-2'
                                    : 'text-slate-400 hover:bg-slate-800 hover:text-white hover:translate-x-1'
                               }}">

                                <span>{{ $infoLink->judul }}</span>

                                @if($isActive)
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                @endif
                            </a>
                        @empty
                            <div class="py-6 text-sm italic text-center text-slate-500">
                                Tidak ada menu informasi.
                            </div>
                        @endforelse
                    </nav>

                    {{-- Dekorasi Bawah Sidebar --}}
                    <div class="pt-6 mt-8 text-center border-t border-slate-800">
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">SMPN 1 Menggala</p>
                    </div>
                </div>
            </div>

            {{--
                B. KOLOM KANAN: DETAIL KONTEN (White Paper)
            --}}
            <div class="lg:col-span-3">

                @if($infoDetail)
                    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 relative overflow-hidden min-h-[500px]">

                        {{-- Watermark Background --}}
                        <div class="absolute pointer-events-none -top-10 -right-10 opacity-5">
                            <svg class="w-64 h-64 text-slate-900" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"></path></svg>
                        </div>

                        <div class="relative z-10">
                            {{-- Judul Konten --}}
                            <div class="pb-6 mb-8 border-b border-slate-100">
                                <h2 class="text-3xl font-black leading-tight md:text-4xl text-slate-900">
                                    {{ $infoDetail->judul }}
                                </h2>
                                <div class="flex items-center gap-2 mt-4 text-sm font-medium text-slate-500">
                                    <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Diperbarui: {{ $infoDetail->updated_at->format('d F Y') }}
                                </div>
                            </div>

                            {{-- Isi Konten --}}
                            <div class="mb-10 leading-relaxed prose prose-lg text-justify prose-slate max-w-none text-slate-600">
                                {!! $infoDetail->deskripsi !!}
                            </div>

                            {{-- Download Section (Modern Card) --}}
                            @if($infoDetail->file_upload)
                                <div class="pt-8 mt-8 border-t border-slate-100">
                                    <h4 class="mb-4 text-sm font-bold tracking-widest uppercase text-slate-400">Lampiran</h4>

                                    <a href="{{ asset('storage/' . $infoDetail->file_upload) }}" target="_blank" class="flex items-center p-4 transition-all duration-300 border group bg-slate-50 border-slate-200 rounded-2xl hover:bg-white hover:border-yellow-400 hover:shadow-lg hover:shadow-yellow-100">
                                        {{-- Icon PDF/File --}}
                                        <div class="flex items-center justify-center w-12 h-12 text-blue-600 transition-transform bg-blue-100 rounded-xl shrink-0 group-hover:scale-110">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>

                                        {{-- Text Info --}}
                                        <div class="flex-1 ml-4">
                                            <p class="font-bold transition-colors text-slate-900 group-hover:text-yellow-600">Unduh Dokumen</p>
                                            <p class="mt-1 text-xs text-slate-500">Klik untuk membuka file</p>
                                        </div>

                                        {{-- Arrow --}}
                                        <div class="flex items-center justify-center w-8 h-8 transition-all bg-white border rounded-full border-slate-200 text-slate-400 group-hover:bg-yellow-400 group-hover:text-slate-900 group-hover:border-yellow-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </div>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                @else
                    {{-- STATE KOSONG (Belum memilih menu) --}}
                    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-16 text-center flex flex-col items-center justify-center h-full min-h-[400px]">
                        <div class="flex items-center justify-center w-24 h-24 mb-6 rounded-full bg-slate-50 animate-pulse">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="mb-2 text-2xl font-black text-slate-900">Pilih Informasi</h3>
                        <p class="max-w-sm mx-auto text-slate-500">
                            Silakan pilih salah satu menu di sebelah kiri untuk melihat detail informasi sekolah.
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection

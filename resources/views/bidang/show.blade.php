@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN DETAIL BIDANG/UNIT (MODERN PROFILE STYLE)
    =========================================================
--}}

<div class="relative w-full min-h-screen -mb-20 overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-60 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-yellow-100 rounded-full blur-3xl opacity-60 translate-y-1/3 -translate-x-1/4"></div>
    </div>

    {{-- 2. CONTAINER UTAMA --}}
    <div class="container relative z-10 px-4 py-16 pb-40 mx-auto max-w-7xl">

        {{-- Header Halaman --}}
        <div class="flex flex-col items-center mb-16 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Unit Kerja
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                {{ $judul ?? 'Bidang Sekolah' }}
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
        </div>

        @if($data)
            <div class="grid items-start grid-cols-1 gap-8 lg:grid-cols-12">

                {{--
                    A. KOLOM KIRI: PROFIL KOORDINATOR (Dark Card)
                    Sticky agar foto tetap terlihat saat scroll deskripsi panjang
                --}}
                <div class="lg:col-span-4 lg:sticky lg:top-24">
                    <div class="bg-slate-900 rounded-[2.5rem] shadow-2xl overflow-hidden relative group">

                        {{-- Decorative Gradient --}}
                        <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-slate-800 to-slate-900"></div>

                        <div class="relative flex flex-col items-center p-8 text-center">

                            {{-- Foto Profil --}}
                            <div class="relative w-48 h-48 mb-6 transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 rounded-full bg-yellow-400/20 animate-pulse blur-xl"></div>
                                @if($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}"
                                         alt="{{ $data->nama }}"
                                         class="relative object-cover w-full h-full border-4 rounded-full shadow-lg border-slate-700 bg-slate-800">
                                @else
                                    <img src="https://placehold.co/400x400/1e293b/cbd5e1?text={{ substr($data->nama, 0, 1) }}"
                                         alt="Avatar"
                                         class="relative object-cover w-full h-full border-4 rounded-full shadow-lg border-slate-700">
                                @endif

                                {{-- Badge Icon --}}
                                <div class="absolute flex items-center justify-center w-10 h-10 bg-yellow-400 border-4 rounded-full bottom-2 right-2 text-slate-900 border-slate-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            </div>

                            {{-- Nama & Jabatan --}}
                            <h2 class="mb-2 text-xl font-bold leading-tight text-white">
                                {{ $data->nama }}
                            </h2>
                            <span class="inline-block px-4 py-1.5 bg-slate-800 text-yellow-400 rounded-full text-xs font-bold uppercase tracking-widest border border-slate-700">
                                {{ $data->jabatan }}
                            </span>

                            {{-- Divider --}}
                            <div class="w-full h-px my-6 bg-slate-800"></div>

                            {{-- Info Tambahan (Statistik Dummy/Hiasan) --}}
                            <div class="grid w-full grid-cols-2 gap-4">
                                <div class="p-2 text-center rounded-xl bg-slate-800/50">
                                    <span class="block text-slate-400 text-[10px] uppercase">Status</span>
                                    <span class="block text-sm font-bold text-white">Aktif</span>
                                </div>
                                <div class="p-2 text-center rounded-xl bg-slate-800/50">
                                    <span class="block text-slate-400 text-[10px] uppercase">Periode</span>
                                    <span class="block text-sm font-bold text-white">{{ date('Y') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{--
                    B. KOLOM KANAN: DESKRIPSI & DOKUMEN (Light Paper)
                --}}
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 relative overflow-hidden">

                        {{-- Watermark Background --}}
                        <div class="absolute pointer-events-none -top-6 -right-6 opacity-5">
                            <svg class="w-64 h-64 text-slate-900" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"></path></svg>
                        </div>

                        <div class="relative z-10">
                            <h3 class="flex items-center gap-3 mb-6 text-2xl font-bold text-slate-900">
                                <span class="w-2 h-8 bg-yellow-400 rounded-full"></span>
                                Deskripsi Tugas & Fungsi
                            </h3>

                            {{-- Konten Text --}}
                            <div class="mb-10 space-y-4 leading-relaxed prose prose-lg text-justify prose-slate max-w-none text-slate-600">
                                {!! $data->deskripsi !!}
                            </div>

                            {{-- Bagian Download File --}}
                            @if($data->file_upload)
                                <div class="mt-8">
                                    <h4 class="mb-4 text-sm font-bold tracking-widest uppercase text-slate-400">Lampiran Dokumen</h4>

                                    <a href="{{ asset('storage/' . $data->file_upload) }}" target="_blank" class="flex items-center p-4 transition-all duration-300 border group bg-slate-50 border-slate-200 rounded-2xl hover:bg-white hover:border-yellow-400 hover:shadow-lg hover:shadow-yellow-100">
                                        {{-- Icon File --}}
                                        <div class="flex items-center justify-center w-12 h-12 text-red-500 transition-transform bg-red-100 rounded-xl shrink-0 group-hover:scale-110">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        </div>

                                        {{-- Text Info --}}
                                        <div class="flex-1 ml-4">
                                            <p class="font-bold transition-colors text-slate-900 group-hover:text-yellow-600">Unduh Dokumen Terkait</p>
                                            <p class="mt-1 text-xs text-slate-500">Klik untuk melihat atau mengunduh file</p>
                                        </div>

                                        {{-- Download Arrow --}}
                                        <div class="flex items-center justify-center w-8 h-8 transition-all bg-white border rounded-full border-slate-200 text-slate-400 group-hover:bg-yellow-400 group-hover:text-yellow-900 group-hover:border-yellow-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </div>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-slate-100">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900">Data Belum Tersedia</h3>
                <p class="mb-6 text-slate-500">Administrator belum mengisi informasi untuk bidang ini.</p>
                <a href="/" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white rounded-full font-bold hover:bg-slate-800 transition">
                    Kembali ke Beranda
                </a>
            </div>
        @endif

    </div>
</div>

@endsection

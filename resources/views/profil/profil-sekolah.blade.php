@extends('layouts.app')

@section('content')


<div class="relative w-full min-h-screen -mb-20 overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND (Konsisten dengan Halaman Lain) --}}
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
                Tentang Kami
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Profil Sekolah
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
        </div>

        @if($profil)
            <div class="grid items-start grid-cols-1 gap-8 lg:grid-cols-12">

                {{--
                    A. KOLOM KIRI: IDENTITAS & STATISTIK (Dark Sidebar)
                    Menggunakan sticky agar tetap terlihat saat scroll
                --}}
                <div class="lg:col-span-4 lg:sticky lg:top-24">

                    {{-- Card Identitas Utama --}}
                    <div class="bg-slate-900 rounded-[2.5rem] shadow-2xl overflow-hidden relative group">

                        {{-- Background Accent --}}
                        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-slate-800 to-slate-900"></div>

                        <div class="relative p-8 text-center">
                            {{-- Logo Wrapper --}}
                            <div class="relative w-40 h-40 mx-auto mb-6">
                                <div class="absolute inset-0 rounded-full bg-yellow-400/20 animate-pulse blur-xl"></div>
                                <div class="relative w-full h-full p-2 bg-white border-4 rounded-full shadow-lg border-slate-800">
                                    @if($profil->logo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" class="object-contain w-full h-full rounded-full">
                                    @else
                                        <img src="https://placehold.co/150x150/f8fafc/cbd5e1?text=LOGO" alt="Logo Placeholder" class="object-cover w-full h-full rounded-full">
                                    @endif
                                </div>
                            </div>

                            {{-- Nama Sekolah --}}
                            <h2 class="mb-2 text-2xl font-bold leading-tight text-white">
                                {{ $profil->nama_sekolah ?? 'Sekolah Unggulan' }}
                            </h2>

                            {{-- Badge Akreditasi --}}
                            @if($profil->akreditasi)
                                <div class="inline-flex items-center gap-2 px-4 py-1.5 mt-2 bg-yellow-500 text-yellow-900 rounded-full text-sm font-bold shadow-lg shadow-yellow-500/20">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Terakreditasi {{ $profil->akreditasi }}
                                </div>
                            @endif
                        </div>

                        {{-- Statistik Grid --}}
                        <div class="grid grid-cols-3 border-t divide-x divide-slate-800 border-slate-800 bg-slate-900/50 backdrop-blur-sm">
                            <div class="p-4 text-center transition-colors group/stat hover:bg-slate-800">
                                <p class="text-2xl font-black text-white transition-colors group-hover/stat:text-yellow-400">{{ $profil->jumlah_peserta_didik ?? 0 }}</p>
                                <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mt-1">Siswa</p>
                            </div>
                            <div class="p-4 text-center transition-colors group/stat hover:bg-slate-800">
                                <p class="text-2xl font-black text-white transition-colors group-hover/stat:text-yellow-400">{{ $profil->jumlah_tenaga_pendidik ?? 0 }}</p>
                                <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mt-1">Guru</p>
                            </div>
                            <div class="p-4 text-center transition-colors group/stat hover:bg-slate-800">
                                <p class="text-2xl font-black text-white transition-colors group-hover/stat:text-yellow-400">{{ $profil->jumlah_rombel ?? 0 }}</p>
                                <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mt-1">Rombel</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- B. KOLOM KANAN: DESKRIPSI (Paper Content) --}}
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 relative overflow-hidden">

                        {{-- Watermark Icon --}}
                        <div class="absolute opacity-50 pointer-events-none -top-10 -right-10 text-slate-50">
                            <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2v-2zm0-6h2v4h-2v-4z"></path></svg>
                        </div>

                        <div class="relative z-10">
                            <h3 class="flex items-center gap-3 mb-6 text-2xl font-bold text-slate-900">
                                <span class="w-2 h-8 bg-yellow-400 rounded-full"></span>
                                Sejarah & Gambaran Umum
                            </h3>

                            <div class="leading-relaxed prose prose-lg text-justify prose-slate max-w-none text-slate-600">
                                {!! $profil->deskripsi !!}
                            </div>
                        </div>

                        {{-- Footer Card --}}
                        <div class="flex items-center justify-between pt-6 mt-10 border-t border-slate-100">
                            <div class="flex gap-2">
                                <span class="w-3 h-3 bg-red-400 rounded-full"></span>
                                <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                                <span class="w-3 h-3 bg-green-400 rounded-full"></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-slate-100">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900">Profil Sekolah Belum Tersedia</h3>
                <p class="mb-6 text-slate-500">Administrator belum mengisi data profil sekolah.</p>
                <a href="/" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white rounded-full font-bold hover:bg-slate-800 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Beranda
                </a>
            </div>
        @endif

    </div>
</div>

@endsection

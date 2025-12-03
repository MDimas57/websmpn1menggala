@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN DETAIL GURU (MODERN PROFILE CARD)
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
        Dulu: py-16 -> Tertutup header
        Sekarang: pt-36 (144px) -> Aman dari header fixed h-24
    --}}
    <div class="container relative z-10 max-w-6xl px-4 pb-40 mx-auto pt-36">

        {{-- Navigasi Kembali --}}
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 rounded-full text-sm font-bold text-slate-600 hover:text-white hover:bg-slate-900 hover:border-slate-900 transition-all shadow-sm group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
        </div>

        {{-- Header Halaman --}}
        <div class="flex flex-col items-center mb-12 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Data Tenaga Pendidik
            </span>
            <h1 class="text-3xl font-black tracking-tight md:text-4xl text-slate-900">
                Profil Guru & Staff
            </h1>
        </div>

        <div class="grid items-start grid-cols-1 gap-8 lg:grid-cols-12">

            {{--
                A. KOLOM KIRI: FOTO & STATUS (Dark Profile Card)
                PERBAIKAN: Ditambahkan sticky top-32 agar profil ikut turun saat scroll
            --}}
            <div class="lg:col-span-4 lg:sticky lg:top-32">
                <div class="bg-slate-900 rounded-[2.5rem] shadow-2xl overflow-hidden relative group">

                    {{-- Decorative Gradient --}}
                    <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-slate-800 to-slate-900"></div>

                    <div class="relative flex flex-col items-center p-8 text-center">

                        {{-- Foto Profil --}}
                        <div class="relative w-48 h-48 mb-6 transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 rounded-full bg-yellow-400/20 animate-pulse blur-xl"></div>

                            @if($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                     alt="{{ $guru->nama_lengkap }}"
                                     class="relative object-cover w-full h-full border-4 rounded-full shadow-lg border-slate-700 bg-slate-800">
                            @else
                                <div class="relative flex items-center justify-center w-full h-full border-4 rounded-full shadow-lg border-slate-700 bg-slate-800 text-slate-500">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            @endif

                            {{-- Badge Check --}}
                            <div class="absolute flex items-center justify-center w-10 h-10 text-white bg-green-500 border-4 rounded-full shadow-sm bottom-2 right-2 border-slate-900" title="Aktif">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>

                        {{-- Nama & Jabatan --}}
                        <h2 class="mb-2 text-xl font-bold leading-tight text-white">
                            {{ $guru->nama_lengkap }}
                        </h2>

                        <div class="mt-2">
                            <span class="inline-block px-4 py-1.5 bg-yellow-500 text-slate-900 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg shadow-yellow-500/20">
                                {{ $guru->jenis_gtk }}
                            </span>
                        </div>

                        {{-- Divider --}}
                        <div class="w-full h-px my-8 bg-slate-800"></div>

                        {{-- Quotes/Motto (Optional) --}}
                        <p class="text-sm italic text-slate-400">
                            "Mendidik dengan hati, menginspirasi dengan prestasi."
                        </p>

                    </div>
                </div>
            </div>

            {{--
                B. KOLOM KANAN: BIODATA DETAIL (White Paper)
            --}}
            <div class="lg:col-span-8">
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-10 relative overflow-hidden h-full">

                    {{-- Header Section --}}
                    <div class="flex items-center gap-3 pb-4 mb-8 border-b border-slate-100">
                        <div class="flex items-center justify-center w-10 h-10 text-blue-600 rounded-xl bg-blue-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884-.5 2-2 2h4c-1.5 0-2-1.116-2-2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Biodata Lengkap</h3>
                    </div>

                    {{-- Grid Data --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- NIK --}}
                        <div class="p-4 transition-colors border rounded-2xl bg-slate-50 border-slate-100 group hover:border-blue-200 hover:bg-blue-50">
                            <p class="mb-1 text-xs font-bold tracking-widest uppercase text-slate-400 group-hover:text-blue-500">Nomor Induk (NIK)</p>
                            <p class="text-lg font-bold text-slate-800">{{ $guru->nik ?? '-' }}</p>
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="p-4 transition-colors border rounded-2xl bg-slate-50 border-slate-100 group hover:border-pink-200 hover:bg-pink-50">
                            <p class="mb-1 text-xs font-bold tracking-widest uppercase text-slate-400 group-hover:text-pink-500">Jenis Kelamin</p>
                            <p class="text-lg font-bold text-slate-800">{{ $guru->jenis_kelamin ?? '-' }}</p>
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="p-4 transition-colors border rounded-2xl bg-slate-50 border-slate-100 group hover:border-green-200 hover:bg-green-50">
                            <p class="mb-1 text-xs font-bold tracking-widest uppercase text-slate-400 group-hover:text-green-500">Tempat Lahir</p>
                            <p class="text-lg font-bold text-slate-800">{{ $guru->tempat_lahir ?? '-' }}</p>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="p-4 transition-colors border rounded-2xl bg-slate-50 border-slate-100 group hover:border-purple-200 hover:bg-purple-50">
                            <p class="mb-1 text-xs font-bold tracking-widest uppercase text-slate-400 group-hover:text-purple-500">Tanggal Lahir</p>
                            <p class="text-lg font-bold text-slate-800">{{ $guru->tanggal_lahir ? $guru->tanggal_lahir->format('d F Y') : '-' }}</p>
                        </div>

                    </div>

                    {{-- Watermark --}}
                    <div class="absolute pointer-events-none -bottom-6 -right-6 opacity-5">
                        <svg class="w-48 h-48 text-slate-900" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

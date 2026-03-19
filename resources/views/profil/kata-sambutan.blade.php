@extends('layouts.app')

@section('content')

<style>
    .sambutan-content p {
        margin-bottom: 1.5rem !important;
        line-height: 1.8;
        display: block;
    }
    .sambutan-content ul, .sambutan-content ol {
        margin-bottom: 1.5rem !important;
        padding-left: 1.5rem !important;
        display: block;
    }
    .sambutan-content ul {
        list-style-type: disc !important;
    }
    .sambutan-content ol {
        list-style-type: decimal !important;
    }
    .sambutan-content li {
        margin-bottom: 0.75rem !important;
        display: list-item !important;
    }
    .sambutan-content strong, .sambutan-content b {
        font-weight: 800 !important;
        color: #0f172a;
    }
    /* Font Tanda Tangan */
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    .font-handwriting {
        font-family: 'Dancing Script', cursive;
    }
</style>

<div class="relative w-full min-h-screen overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-60 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-yellow-100 rounded-full blur-3xl opacity-60 translate-y-1/3 -translate-x-1/4"></div>
    </div>

    <div class="container relative z-10 px-4 pb-24 mx-auto pt-36 max-w-7xl">

        {{-- Header Kecil --}}
        <div class="flex flex-col items-center mb-12 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Official Message
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Kata Sambutan
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
        </div>

        @if($sambutan)
            <div class="grid items-start grid-cols-1 gap-8 lg:grid-cols-12">

                {{-- A. KOLOM KIRI: PROFIL KEPSEK --}}
                <div class="lg:col-span-4 lg:sticky lg:top-32">
                    <div class="relative overflow-hidden bg-slate-900 rounded-[2.5rem] shadow-2xl p-8 text-center group">
                        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-slate-800 to-slate-900"></div>

                        <div class="relative w-48 h-48 mx-auto mb-6">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-400 to-amber-600 animate-pulse blur-md opacity-40"></div>
                            <img src="{{ $sambutan->foto ? asset('storage/' . $sambutan->foto) : 'https://ui-avatars.com/api/?name=Kepala+Sekolah&background=fbbf24&color=fff&size=256' }}"
                                 alt="{{ $sambutan->nama_kepsek }}"
                                 class="relative object-cover w-full h-full border-4 rounded-full shadow-xl border-slate-800 bg-slate-700">
                        </div>

                        <h3 class="mb-2 text-xl font-bold leading-tight text-white md:text-2xl">
                            {{ $sambutan->nama_kepsek }}
                        </h3>
                        <p class="inline-block px-4 py-1 text-xs font-bold tracking-widest text-yellow-400 uppercase border rounded-full bg-slate-800 border-slate-700">
                            {{ $sambutan->jabatan ?? 'Kepala Sekolah' }}
                        </p>

                        <div class="pt-8 mt-8 border-t border-slate-800">
                            <p class="text-sm italic text-slate-400">
                                "Pendidikan adalah senjata paling ampuh untuk mengubah dunia."
                            </p>
                        </div>
                    </div>
                </div>

                {{-- B. KOLOM KANAN: ISI SAMBUTAN --}}
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 relative overflow-hidden">

                        {{-- Watermark Kutip --}}
                        <div class="absolute top-4 left-6 text-slate-100 font-serif text-[10rem] leading-none select-none -z-0">“</div>

                        <div class="relative z-10">
                            <h2 class="flex items-center gap-3 mb-6 text-2xl font-bold text-slate-800">
                                Assalamu'alaikum Wr. Wb.
                            </h2>

                            {{-- Konten Utama (Gunakan class sambutan-content) --}}
                            <div class="text-justify text-slate-600 sambutan-content">
                                {!! $sambutan->kata_sambutan !!}
                            </div>

                            <div class="flex items-center justify-end gap-4 pt-8 mt-12 border-t border-slate-100">
                                <div class="text-right">
                                    <p class="text-xs font-bold tracking-wider uppercase text-slate-400">Hormat Kami,</p>
                                    <p class="mt-1 text-3xl font-bold font-handwriting text-slate-800">{{ $sambutan->nama_kepsek }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @else
            {{-- Empty State --}}
            <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-yellow-50">
                    <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900">Sambutan Belum Tersedia</h3>
                <p class="text-slate-500">Data kata sambutan belum diisi oleh administrator.</p>
                <a href="/" class="inline-block px-6 py-2 mt-6 font-bold text-white transition rounded-full bg-slate-900 hover:bg-slate-800">Kembali ke Beranda</a>
            </div>
        @endif

    </div>
</div>

@endsection

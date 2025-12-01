@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN SAMBUTAN KEPALA SEKOLAH (MODERN MAGAZINE STYLE)
    =========================================================
--}}

{{-- Wrapper Utama --}}
<div class="relative w-full min-h-screen -mb-20 overflow-hidden font-sans bg-slate-50">

    {{-- 1. DEKORASI BACKGROUND (Abstrak & Modern) --}}
    <div class="absolute inset-0 pointer-events-none">
        {{-- Pola Dot/Grid Halus --}}
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>

        {{-- Blob Warna (Blur Effect) --}}
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-60 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-yellow-100 rounded-full blur-3xl opacity-60 translate-y-1/3 -translate-x-1/4"></div>
    </div>

    {{-- 2. CONTAINER KONTEN --}}
    <div class="container relative z-10 px-4 py-16 pb-32 mx-auto max-w-7xl">

        {{-- Breadcrumb / Header Kecil --}}
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

                {{-- A. KOLOM KIRI: PROFIL KEPSEK (Dark Card) --}}
                <div class="lg:col-span-4 lg:sticky lg:top-24">
                    <div class="relative overflow-hidden bg-slate-900 rounded-[2.5rem] shadow-2xl p-8 text-center group">

                        {{-- Dekorasi Card --}}
                        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-slate-800 to-slate-900"></div>
                        <div class="absolute top-4 right-4 text-slate-700 opacity-20">
                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 13.1216 16 12.017 16H11.983L11.983 15C11.983 14.8093 11.944 14.6212 11.8711 14.4455C11.6666 13.9525 11.9016 13.3822 12.3838 13.1678L13.8475 12.5173C15.1185 11.9524 16.017 10.7493 16.017 9.32927V9.08333C16.017 6.82823 14.2259 5 12.017 5C9.80811 5 8.01699 6.82823 8.01699 9.08333V9.32927C8.01699 10.7493 8.91553 11.9524 10.1865 12.5173L11.6502 13.1678C12.1324 13.3822 12.3674 13.9525 12.1629 14.4455C12.09 14.6212 12.051 14.8093 12.051 15H12.017C10.9124 16 10.017 16.8954 10.017 18V21H14.017Z"></path></svg>
                        </div>

                        {{-- Foto Profil --}}
                        <div class="relative w-48 h-48 mx-auto mb-6">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-400 to-amber-600 animate-pulse blur-md opacity-40"></div>
                            <img src="{{ $sambutan->foto ? asset('storage/' . $sambutan->foto) : 'https://ui-avatars.com/api/?name=Kepala+Sekolah&background=fbbf24&color=fff&size=256' }}"
                                 alt="{{ $sambutan->nama_kepsek }}"
                                 class="relative object-cover w-full h-full transition-transform duration-500 border-4 rounded-full shadow-xl border-slate-800 group-hover:scale-105 bg-slate-700">
                        </div>

                        {{-- Nama & Jabatan --}}
                        <h3 class="mb-2 text-xl font-bold leading-tight text-white md:text-2xl">
                            {{ $sambutan->nama_kepsek }}
                        </h3>
                        <p class="inline-block px-4 py-1 text-xs font-bold tracking-widest text-yellow-400 uppercase border rounded-full bg-slate-800 border-slate-700">
                            {{ $sambutan->jabatan ?? 'Kepala Sekolah' }}
                        </p>

                        {{-- Quote Singkat (Opsional) --}}
                        <div class="pt-8 mt-8 border-t border-slate-800">
                            <p class="text-sm italic text-slate-400">
                                "Pendidikan adalah senjata paling ampuh untuk mengubah dunia."
                            </p>
                        </div>
                    </div>
                </div>

                {{-- B. KOLOM KANAN: ISI SAMBUTAN (Paper Style) --}}
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 relative overflow-hidden">

                        {{-- Tanda Kutip Besar (Watermark) --}}
                        <div class="absolute top-4 left-6 text-slate-100 font-serif text-[10rem] leading-none select-none -z-0">“</div>

                        {{-- Konten Text --}}
                        <div class="relative z-10">
                            <h2 class="flex items-center gap-3 mb-6 text-2xl font-bold text-slate-800">
                                Assalamu'alaikum Wr. Wb.
                            </h2>

                            <div class="space-y-4 leading-relaxed prose prose-lg text-justify prose-slate max-w-none text-slate-600">
                                {!! $sambutan->kata_sambutan !!}
                            </div>

                            <div class="flex items-center justify-end gap-4 pt-8 mt-12 border-t border-slate-100">
                                <div class="text-right">
                                    <p class="text-xs font-bold tracking-wider uppercase text-slate-400">Hormat Kami,</p>
                                    {{-- Tanda Tangan Digital (Jika ada gambar tanda tangan, ganti teks ini) --}}
                                    <p class="mt-1 text-2xl font-bold font-handwriting text-slate-800">{{ $sambutan->nama_kepsek }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @else
            {{-- STATE KOSONG (Empty State) --}}
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

{{-- Font Tambahan untuk Tanda Tangan (Opsional) --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    .font-handwriting {
        font-family: 'Dancing Script', cursive;
    }
</style>

@endsection

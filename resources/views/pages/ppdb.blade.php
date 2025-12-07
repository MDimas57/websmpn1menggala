@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN INFORMASI PPDB (MODERN FEED STYLE)
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
    <div class="container relative z-10 max-w-5xl px-4 pb-24 mx-auto pt-36">

        {{-- Header Halaman --}}
        <div class="flex flex-col items-center mb-16 text-center">
            <span class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200">
                Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}
            </span>
            <h1 class="text-4xl font-black tracking-tight md:text-5xl text-slate-900">
                Informasi PPDB
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-4"></div>
            <p class="max-w-2xl mt-4 text-lg text-slate-600">
                Pusat informasi resmi Penerimaan Peserta Didik Baru.
            </p>
        </div>

        {{-- LIST POSTINGAN --}}
        <div class="space-y-12">

            @forelse ($informasiItems as $item)

                {{-- KARTU PENGUMUMAN --}}
                <article class="relative bg-white rounded-[2.5rem] p-8 md:p-10 shadow-xl border border-slate-100 overflow-hidden group hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300">

                    {{-- Dekorasi Garis Kiri --}}
                    <div class="absolute left-0 top-10 bottom-10 w-1.5 bg-slate-100 rounded-r-full group-hover:bg-yellow-400 transition-colors duration-300"></div>

                    <div class="flex flex-col items-start gap-8 md:flex-row">

                        {{-- KOLOM KIRI: GAMBAR/ICON --}}
                        <div class="w-full md:w-1/3 shrink-0">
                            <div class="relative overflow-hidden rounded-2xl bg-slate-100 aspect-[4/3] group-hover:scale-[1.02] transition-transform duration-500">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         alt="{{ $item->judul }}"
                                         class="object-cover w-full h-full">
                                @else
                                    {{-- Placeholder Icon Modern --}}
                                    <div class="flex flex-col items-center justify-center w-full h-full p-6 border text-slate-300 bg-slate-50 border-slate-100">
                                        <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                        <span class="text-xs font-bold tracking-widest uppercase text-slate-400">Pengumuman</span>
                                    </div>
                                @endif

                                {{-- Badge Tanggal (Floating) --}}
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur shadow-sm border border-white/50 px-3 py-1.5 rounded-lg text-center min-w-[60px]">
                                    <span class="block text-xs font-bold uppercase text-slate-400">{{ $item->created_at->format('M') }}</span>
                                    <span class="block text-xl font-black leading-none text-slate-900">{{ $item->created_at->format('d') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: KONTEN --}}
                        <div class="flex-1 w-full">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                                <span class="text-xs font-bold tracking-wider text-yellow-600 uppercase">Info Terbaru</span>
                            </div>

                            <h2 class="mb-4 text-2xl font-bold leading-tight transition-colors text-slate-900 group-hover:text-blue-900">
                                {{ $item->judul }}
                            </h2>

                            <div class="space-y-4 leading-relaxed prose prose-lg text-justify prose-slate max-w-none text-slate-600">
                                {!! $item->deskripsi !!}
                            </div>
                        </div>

                    </div>
                </article>

            @empty
                {{-- STATE KOSONG --}}
                <div class="max-w-xl px-6 py-20 mx-auto text-center bg-white border border-dashed shadow-xl rounded-3xl border-slate-300">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-yellow-50">
                        <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-slate-900">Informasi Belum Tersedia</h3>
                    <p class="mb-6 text-slate-500">Panitia belum mengunggah informasi mengenai PPDB saat ini.</p>
                    <a href="/" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white rounded-full font-bold hover:bg-slate-800 transition">
                        Kembali ke Beranda
                    </a>
                </div>
            @endforelse

        </div>

        {{-- Footer Note (Opsional) --}}
        @if($informasiItems->count() > 0)
            <div class="mt-16 text-center">
                <p class="text-sm text-slate-400">
                    Untuk informasi lebih lanjut, silakan hubungi panitia PPDB melalui kontak sekolah.
                </p>
            </div>
        @endif

    </div>
</div>

@endsection

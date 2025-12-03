@extends('layouts.app')

@section('content')

{{--
    =========================================================
    HALAMAN DETAIL BERITA (MODERN ARTICLE LAYOUT)
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
        2. CONTAINER UTAMA (PERBAIKAN DISINI)
        - Dulu: py-16 (64px) -> Tertutup header fixed h-24 (96px).
        - Sekarang: pt-36 (144px) -> Memberi ruang cukup untuk header + jarak nafas.
    --}}
    <div class="container relative z-10 px-4 pb-40 mx-auto pt-36 max-w-7xl">

        {{-- Breadcrumb Kecil --}}
        <div class="flex flex-col items-center mb-12 text-center">
            <a href="{{ url()->previous() }}" class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200 hover:bg-yellow-200 transition-colors">
                &larr; Kembali
            </a>
        </div>

        <div class="grid items-start grid-cols-1 gap-10 lg:grid-cols-12">

            {{--
                A. KOLOM UTAMA: KONTEN BERITA (White Paper Style)
                Lebar 8/12 kolom
            --}}
            <div class="lg:col-span-8">
                <article class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 overflow-hidden relative">

                    {{-- Header Artikel --}}
                    <header class="mb-10 text-center md:text-left">
                        <div class="flex items-center justify-center gap-2 mb-6 md:justify-start">
                            <span class="px-3 py-1 text-xs font-bold tracking-wider text-blue-600 uppercase rounded-lg bg-blue-50">Berita Sekolah</span>
                            <span class="text-slate-300">•</span>
                            <span class="text-xs font-bold tracking-wider uppercase text-slate-500">{{ $berita->created_at->format('d F Y') }}</span>
                        </div>

                        <h1 class="mb-8 text-3xl font-black leading-tight md:text-5xl text-slate-900">
                            {{ $berita->judul }}
                        </h1>

                        {{-- Meta Penulis --}}
                        <div class="flex items-center justify-center gap-4 p-4 border md:justify-start rounded-2xl bg-slate-50 border-slate-100 w-fit">
                            <div class="flex items-center justify-center w-12 h-12 text-xl font-bold bg-yellow-400 rounded-full shadow-md text-slate-900">
                                {{ substr($berita->penulis ?? 'A', 0, 1) }}
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-bold text-slate-900">{{ $berita->penulis ?? 'Administrator' }}</p>
                                <p class="text-xs text-slate-500">Penulis Konten</p>
                            </div>

                            @if(isset($berita->views))
                                <div class="w-px h-8 mx-2 bg-slate-300"></div>
                                <div class="text-left">
                                    <p class="text-sm font-bold text-slate-900">{{ $berita->views }}</p>
                                    <p class="text-xs text-slate-500">Dilihat</p>
                                </div>
                            @endif
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($berita->gambar)
                        <div class="relative w-full mb-12 overflow-hidden shadow-lg aspect-video rounded-3xl group">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                            {{-- Overlay Halus --}}
                            <div class="absolute inset-0 rounded-3xl ring-1 ring-inset ring-black/10"></div>
                        </div>
                    @endif

                    {{-- Isi Konten --}}
                    <div class="mb-12 leading-relaxed prose prose-lg text-justify prose-slate max-w-none text-slate-600">
                        {!! $berita->konten !!}
                    </div>

                    {{-- Footer: Share Buttons --}}
                    <div class="pt-8 mt-8 border-t border-slate-100">
                        <p class="mb-4 text-sm font-bold tracking-widest text-center uppercase md:text-left text-slate-400">Bagikan Artikel Ini</p>

                        <div class="flex flex-wrap justify-center gap-3 md:justify-start">
                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#1877F2] text-white rounded-full font-bold hover:shadow-lg hover:-translate-y-1 transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                <span>Facebook</span>
                            </a>

                            {{-- WhatsApp --}}
                            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white rounded-full font-bold hover:shadow-lg hover:-translate-y-1 transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                <span>WhatsApp</span>
                            </a>

                            {{-- Copy Link --}}
                            <button id="copyBtn" class="flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-600 rounded-full font-bold hover:bg-slate-200 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                <span>Salin Link</span>
                            </button>
                            <span id="copyMsg" class="hidden px-3 py-2 text-sm font-bold text-green-600 rounded-lg bg-green-50 animate-fade-in-up">Link Tersalin!</span>
                        </div>
                    </div>
                </article>
            </div>

            {{--
                B. KOLOM KANAN: SIDEBAR ARSIP (Dark Theme)
                PERBAIKAN: top-24 diubah ke top-32 agar tidak nempel dengan Header
            --}}
            <aside class="lg:col-span-4 lg:sticky lg:top-32">
                <div class="bg-slate-900 rounded-[2.5rem] p-6 shadow-2xl overflow-hidden relative">

                    {{-- Judul Sidebar --}}
                    <h3 class="flex items-center gap-3 pb-4 mb-6 text-xl font-bold text-white border-b border-slate-700">
                        <span class="w-1.5 h-6 bg-yellow-500 rounded-full"></span>
                        Berita Lainnya
                    </h3>

                    {{-- Scrollable List --}}
                    <div class="space-y-5 overflow-y-auto max-h-[600px] pr-2 custom-scrollbar">
                        @if(isset($unreadBeritas) && $unreadBeritas->count())
                            @php
                                $others = $unreadBeritas->where('id', '!=', $berita->id)->values()->take(8);
                            @endphp

                            @forelse($others as $u)
                                <a href="{{ route('berita.show', $u->slug) }}" class="flex gap-4 p-2 transition-colors group rounded-xl hover:bg-white/5">
                                    {{-- Thumbnail Kecil --}}
                                    <div class="relative w-20 h-20 overflow-hidden rounded-lg shrink-0 bg-slate-800">
                                        @if($u->gambar)
                                            <img src="{{ asset('storage/' . $u->gambar) }}" alt="{{ $u->judul }}" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                                        @else
                                            <div class="flex items-center justify-center w-full h-full text-slate-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Text --}}
                                    <div class="flex-1 min-w-0">
                                        <h4 class="mb-1 text-sm font-bold leading-snug transition-colors text-slate-200 group-hover:text-yellow-400 line-clamp-2">
                                            {{ $u->judul }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-[10px] text-slate-400">
                                            <span>{{ $u->created_at->diffForHumans() }}</span>
                                            @if(isset($u->views))
                                                <span class="w-1 h-1 rounded-full bg-slate-600"></span>
                                                <span>{{ $u->views }} Views</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="py-8 text-sm text-center text-slate-500">Tidak ada berita lain.</div>
                            @endforelse
                        @else
                            <div class="py-8 text-sm text-center text-slate-500">Tidak ada berita lain.</div>
                        @endif
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>

{{-- SCRIPT COPY LINK --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyBtn = document.getElementById('copyBtn');
        const copyMsg = document.getElementById('copyMsg');

        if(copyBtn && copyMsg) {
            copyBtn.addEventListener('click', function() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    copyMsg.classList.remove('hidden');
                    setTimeout(() => copyMsg.classList.add('hidden'), 2000);
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                });
            });
        }
    });
</script>

{{-- STYLE SCROLLBAR --}}
<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); border-radius: 10px; margin-block: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #475569; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #fbbf24; }
</style>

@endsection

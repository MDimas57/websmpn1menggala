@extends('layouts.app')

@section('content')

<style>
    .berita-content p {
        margin-bottom: 1.5rem !important;
        line-height: 1.8;
        display: block;
    }
    .berita-content ul, .berita-content ol {
        margin-bottom: 1.5rem !important;
        padding-left: 2rem !important;
        display: block;
    }
    .berita-content ul {
        list-style-type: disc !important;
    }
    .berita-content ol {
        list-style-type: decimal !important;
    }
    .berita-content li {
        margin-bottom: 0.5rem !important;
    }
    .berita-content h2, .berita-content h3, .berita-content h4 {
        font-weight: 700 !important;
        margin-top: 2rem !important;
        margin-bottom: 1rem !important;
        color: #0f172a; /* Slate 900 */
    }
    .berita-content strong {
        font-weight: 700 !important;
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

        {{-- Breadcrumb / Kembali --}}
        <div class="flex flex-col items-center mb-12 text-center">
            <a href="{{ url()->previous() }}" class="px-4 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold tracking-widest uppercase mb-4 border border-yellow-200 hover:bg-yellow-200 transition-colors">
                &larr; Kembali
            </a>
        </div>

        <div class="grid items-start grid-cols-1 gap-10 lg:grid-cols-12">

            {{-- A. KOLOM UTAMA --}}
            <div class="lg:col-span-8">
                <article class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-12 overflow-hidden relative">

                    <header class="mb-10 text-center md:text-left">
                        <div class="flex items-center justify-center gap-2 mb-6 md:justify-start">
                            <span class="px-3 py-1 text-xs font-bold tracking-wider text-blue-600 uppercase rounded-lg bg-blue-50">Berita Sekolah</span>
                            <span class="text-slate-300">•</span>
                            <span class="text-xs font-bold tracking-wider uppercase text-slate-500">{{ $berita->created_at->format('d F Y') }}</span>
                        </div>

                        <h1 class="mb-8 text-3xl font-black leading-tight md:text-5xl text-slate-900">
                            {{ $berita->judul }}
                        </h1>

                        <div class="flex items-center justify-center gap-4 p-4 border md:justify-start rounded-2xl bg-slate-50 border-slate-100 w-fit">
                            <div class="flex items-center justify-center w-12 h-12 text-xl font-bold bg-yellow-400 rounded-full shadow-md text-slate-900">
                                {{ substr($berita->penulis ?? 'A', 0, 1) }}
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-bold text-slate-900">{{ $berita->penulis ?? 'Administrator' }}</p>
                                <p class="text-xs text-slate-500">Penulis Konten</p>
                            </div>
                        </div>
                    </header>

                    {{-- Featured Image --}}
                    @if($berita->gambar)
                        <div class="relative w-full mb-12 overflow-hidden shadow-lg aspect-video rounded-3xl group">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                        </div>
                    @endif

                    {{-- ISI KONTEN (Dengan Class Khusus) --}}
                    <div class="mb-12 text-justify text-slate-600 berita-content">
                        {!! $berita->konten !!}
                    </div>

                    {{-- Share Buttons --}}
                    <div class="pt-8 mt-8 border-t border-slate-100">
                        <p class="mb-4 text-sm font-bold tracking-widest text-center uppercase md:text-left text-slate-400">Bagikan Artikel Ini</p>
                        <div class="flex flex-wrap justify-center gap-3 md:justify-start">
                            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white rounded-full font-bold hover:shadow-lg transition-all">
                                <span>WhatsApp</span>
                            </a>
                            <button id="copyBtn" class="flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-600 rounded-full font-bold hover:bg-slate-200 transition-colors">
                                <span>Salin Link</span>
                            </button>
                            <span id="copyMsg" class="hidden px-3 py-2 text-sm font-bold text-green-600 rounded-lg bg-green-50">Tersalin!</span>
                        </div>
                    </div>
                </article>
            </div>

            {{-- B. SIDEBAR ARSIP --}}
            <aside class="lg:col-span-4 lg:sticky lg:top-32">
                <div class="bg-slate-900 rounded-[2.5rem] p-6 shadow-2xl relative">
                    <h3 class="flex items-center gap-3 pb-4 mb-6 text-xl font-bold text-white border-b border-slate-700">
                        <span class="w-1.5 h-6 bg-yellow-500 rounded-full"></span>
                        Berita Lainnya
                    </h3>
                    <div class="space-y-5 overflow-y-auto max-h-[600px] pr-2 custom-scrollbar">
                        @if(isset($unreadBeritas))
                            @foreach($unreadBeritas->where('id', '!=', $berita->id)->take(6) as $u)
                                <a href="{{ route('berita.show', $u->slug) }}" class="flex gap-4 p-2 transition-colors group rounded-xl hover:bg-white/5">
                                    <div class="relative w-20 h-20 overflow-hidden rounded-lg shrink-0 bg-slate-800">
                                        @if($u->gambar)
                                            <img src="{{ asset('storage/' . $u->gambar) }}" class="object-cover w-full h-full transition-transform group-hover:scale-110">
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="mb-1 text-sm font-bold text-slate-200 group-hover:text-yellow-400 line-clamp-2">
                                            {{ $u->judul }}
                                        </h4>
                                        <span class="text-[10px] text-slate-400">{{ $u->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyBtn = document.getElementById('copyBtn');
        const copyMsg = document.getElementById('copyMsg');
        if(copyBtn) {
            copyBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    copyMsg.classList.remove('hidden');
                    setTimeout(() => copyMsg.classList.add('hidden'), 2000);
                });
            });
        }
    });
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #475569; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #fbbf24; }
</style>

@endsection

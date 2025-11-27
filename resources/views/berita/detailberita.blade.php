@extends('layouts.app')

@section('content')

<div class="py-16 bg-gray-50">
    <div class="container max-w-6xl px-4 mx-auto">

        <div class="items-start md:grid md:grid-cols-3 md:gap-10">

            {{-- BAGIAN KONTEN BERITA UTAMA (TIDAK BERUBAH) --}}
            <div class="p-8 bg-white border border-gray-100 shadow-sm md:col-span-2 rounded-2xl">

                <span class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-widest text-blue-600 uppercase rounded-full bg-blue-50">
                    Berita Sekolah
                </span>

                <h1 class="mb-6 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-4xl">
                    {{ $berita->judul }}
                </h1>

                @if($berita->gambar)
                    <div class="w-full mb-8 overflow-hidden shadow-lg rounded-xl">
                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="object-cover object-center w-full transition-transform duration-700 h-96 hover:scale-105">
                     </div>
                @endif


                <div class="flex items-center gap-4 pb-6 mb-8 text-sm text-gray-500 border-b border-gray-100">
                    <div class="flex items-center gap-2">
                        <div class="flex items-center justify-center w-8 h-8 font-bold text-yellow-600 bg-yellow-100 rounded-full">
                            {{ substr($berita->penulis ?? 'A', 0, 1) }}
                        </div>
                        <span class="font-medium text-gray-700">{{ $berita->penulis ?? 'Admin' }}</span>
                    </div>
                    <span class="text-gray-300">•</span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>{{ $berita->created_at->format('d F Y') }}</span>
                    </div>
                    {{-- Tambahan Views jika ada di database --}}
                    @if(isset($berita->views))
                    <span class="text-gray-300">•</span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        <span>{{ $berita->views }}x Dibaca</span>
                    </div>
                    @endif
                </div>

                <div class="space-y-4 leading-relaxed prose prose-lg text-justify text-gray-600 prose-blue max-w-none">
                    {!! $berita->konten !!}
                </div>

                <div class="pt-8 mt-10 border-t border-gray-100">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="mr-2 text-sm font-bold tracking-wide text-gray-700 uppercase">Bagikan:</span>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-[#1877F2] rounded-full hover:opacity-90 transition-opacity shadow-sm">
                           <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                           Facebook
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition-opacity bg-black rounded-full shadow-sm hover:opacity-80">
                           <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                           X
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-[#25D366] rounded-full hover:opacity-90 transition-opacity shadow-sm">
                           <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                           WhatsApp
                        </a>

                         <button id="copyBtn-{{ $berita->id }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-gray-100 rounded-full shadow-sm hover:bg-gray-200">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                           Salin Link
                        </button>
                        <span id="copyMsg-{{ $berita->id }}" class="hidden ml-2 text-sm font-bold text-green-600 transition-opacity">Tersalin!</span>
                    </div>
                </div>

                <script>
                    (function(){
                    var btn = document.getElementById('copyBtn-{{ $berita->id }}');
                    var msg = document.getElementById('copyMsg-{{ $berita->id }}');
                    if (!btn) return;
                    btn.addEventListener('click', function () {
                        var url = window.location.href;
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(url).then(function () {
                            msg.classList.remove('hidden');
                            setTimeout(function () { msg.classList.add('hidden'); }, 2000);
                        });
                        } else {
                        var input = document.createElement('input');
                        input.value = url;
                        document.body.appendChild(input);
                        input.select();
                        try { document.execCommand('copy'); msg.classList.remove('hidden'); setTimeout(function () { msg.classList.add('hidden'); }, 2000); } catch(e) {}
                        document.body.removeChild(input);
                        }
                    });
                    })();
                </script>
            </div>


            {{--
                =========================================================
                BAGIAN SIDEBAR / ASIDE (TELAH DIPERBARUI)
                =========================================================
            --}}
            <aside class="mt-10 space-y-8 md:mt-0 md:col-span-1">

                <div class="relative flex flex-col h-auto p-6 overflow-hidden text-white shadow-xl bg-gradient-to-br from-slate-800 to-blue-900 rounded-3xl">

                    {{-- Judul Tetap --}}
                    <h3 class="flex-shrink-0 pb-3 mb-4 text-xl font-extrabold text-white border-b-2 border-yellow-400">
                        Berita Lainnya
                    </h3>

                    {{-- AREA SCROLLABLE --}}
                    <div class="space-y-6 overflow-y-auto max-h-[600px] pr-2 custom-scrollbar">

                        @if(isset($unreadBeritas) && $unreadBeritas->count())
                            @php
                                $others = $unreadBeritas->where('id', '!=', $berita->id)->values()->take(8);
                            @endphp

                            @forelse($others as $u)
                                <div class="flex items-start gap-4 group">
                                    {{-- Gambar Thumbnail --}}
                                    <a href="{{ route('berita.show', $u->slug) }}" class="relative flex-shrink-0 w-20 h-20 overflow-hidden transition-colors border rounded-lg shadow-sm border-slate-600 group-hover:border-yellow-400">
                                        @if($u->gambar)
                                            <img src="{{ asset('storage/' . $u->gambar) }}"
                                                 alt="{{ $u->judul }}"
                                                 class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                                        @else
                                            {{-- Fallback image jika tidak ada --}}
                                            <div class="flex items-center justify-center w-full h-full bg-slate-700">
                                                <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </a>

                                    {{-- Konten Text --}}
                                    <div>
                                        <h4 class="mb-1 text-sm font-bold leading-snug text-gray-200 transition-colors group-hover:text-yellow-400 line-clamp-2">
                                            <a href="{{ route('berita.show', $u->slug) }}">{{ $u->judul }}</a>
                                        </h4>

                                        <div class="flex items-center gap-3 text-xs text-gray-400">
                                            {{-- Tanggal --}}
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                {{ $u->created_at->diffForHumans() }}
                                            </span>

                                            {{-- Views (Optional jika ada) --}}
                                            @if(isset($u->views))
                                            <span class="flex items-center gap-1 pl-3 border-l border-gray-600">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                {{ $u->views }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- Garis putus-putus pemisah --}}
                                @if(!$loop->last)
                                    <div class="border-b border-gray-700 border-dashed"></div>
                                @endif

                            @empty
                                <div class="py-12 text-center text-gray-400">
                                    <p>Tidak ada berita lain.</p>
                                </div>
                            @endforelse
                        @else
                            <div class="py-12 text-center text-gray-400">
                                <p>Tidak ada berita lain.</p>
                            </div>
                        @endif

                    </div>
                </div>

            </aside>

        </div>
    </div>
</div>

{{-- Style Tambahan untuk Scrollbar agar lebih estetik --}}
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #fbbf24;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #f59e0b;
    }
</style>

@endsection

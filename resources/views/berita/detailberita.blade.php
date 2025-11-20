@extends('layouts.app')

@section('content')

<div class="py-16 bg-gray-50">
    <div class="container max-w-6xl px-4 mx-auto">

        <div class="items-start md:grid md:grid-cols-3 md:gap-10"> <div class="p-8 bg-white border border-gray-100 shadow-sm md:col-span-2 rounded-2xl">

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


            <aside class="mt-10 space-y-8 md:mt-0 md:col-span-1">

                <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-2xl">

                    <div class="p-6 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                        <h2 class="flex items-center gap-2 text-xl font-bold text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            Berita Lainnya
                        </h2>
                    </div>

                    <div class="p-6">
                        @if(isset($unreadBeritas) && $unreadBeritas->count())
                            @php
                                $others = $unreadBeritas->where('id', '!=', $berita->id)->values()->take(6); // Ambil 6 saja agar pas
                            @endphp

                            @if($others->count())
                                <ul class="space-y-6">
                                    @foreach($others as $u)
                                        <li>
                                            <a href="{{ route('berita.show', $u->slug) }}" class="block group">
                                                <h4 class="mb-1 text-sm font-bold leading-snug text-gray-800 transition-colors group-hover:text-blue-600">
                                                    {{ \Illuminate\Support\Str::limit($u->judul, 60) }}
                                                </h4>
                                                <div class="flex items-center gap-2 text-xs text-gray-400">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <span>{{ $u->created_at->diffForHumans() }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        @if(!$loop->last) <hr class="border-gray-100"> @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="py-4 text-sm text-center text-gray-500">Tidak ada berita lain.</p>
                            @endif
                        @else
                            <p class="py-4 text-sm text-center text-gray-500">Tidak ada berita lain.</p>
                        @endif
                    </div>
                </div>

            </aside>

        </div>
    </div>
</div>
@endsection

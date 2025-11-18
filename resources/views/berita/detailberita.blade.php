@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="container max-w-6xl px-4 mx-auto">

        <!-- Layout 2 kolom: konten utama (2/3) + sidebar (1/3) -->
        <div class="md:grid md:grid-cols-3 md:gap-6">

            <!-- Konten utama (tanpa box: no bg, no shadow) -->
            <div class="md:col-span-2">
            <!-- Judul Berita -->
            <h1 class="mb-4 text-3xl font-bold text-justify text-gray-900">
                {{ $berita->judul }}
            </h1>

            <!-- Gambar Utama -->
            @if($berita->gambar)
                <div class="w-full mb-6 overflow-hidden bg-gray-100 rounded-lg">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     alt="{{ $berita->judul }}"
                     class="object-cover w-full h-120">
                </div>
            @endif

            <!-- Info Meta (Tanggal & Penulis) -->
            <div class="mb-6 text-sm text-gray-500">
                <span>Oleh: {{ $berita->penulis ?? 'Admin' }}</span>
                <span class="mx-2">|</span>
                <span>Diposting: {{ $berita->created_at->format('d F Y') }}</span>
            </div>

            <!-- Konten (disembunyikan jika benar-benar tidak ingin tampil; sekarang tetap ada tapi tanpa box)
                 Jika ingin sepenuhnya tidak terlihat, bisa hapus atau beri class "hidden" di bawah -->
            <div class="space-y-4 text-justify text-gray-700 max-w-none">
                {!! $berita->konten !!}
            </div>

            <!-- Tombol Share -->
            <div class="flex flex-wrap items-center gap-2 mt-6 ">
                <span class="mr-2 text-sm text-gray-600">Bagikan:</span>

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:opacity-90">
                Facebook
                </a>

                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="px-3 py-1 text-sm text-white rounded bg-sky-500 hover:opacity-90">
                X / Twitter
                </a>

                <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="px-3 py-1 text-sm text-white bg-green-500 rounded hover:opacity-90">
                WhatsApp
                </a>

                <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="px-3 py-1 text-sm text-white bg-indigo-600 rounded hover:opacity-90">
                Telegram
                </a>

                <button id="copyBtn-{{ $berita->id }}"
                    class="px-3 py-1 text-sm text-gray-800 bg-gray-100 rounded hover:bg-gray-200">
                Salin Link
                </button>

                <span id="copyMsg-{{ $berita->id }}" class="hidden ml-2 text-sm text-green-600">Tersalin!</span>
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
                    // Fallback
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

            <!-- Sidebar kanan: 10 berita terbaru selain yang sedang dibuka -->
            <aside class="mt-8 md:mt-0 md:col-span-1">
                <div class="p-4">
                    <h2 class="mb-3 text-xl font-semibold text-gray-800">Berita Lainnya</h2>

                    @if(isset($unreadBeritas) && $unreadBeritas->count())
                        @php
                            // Buat koleksi tanpa berita yang sedang dibuka, ambil maksimal 10 item
                            $others = $unreadBeritas->where('id', '!=', $berita->id)->values()->take(10);
                        @endphp

                        @if($others->count())
                            <ul class="space-y-3">
                                @foreach($others as $u)
                                    <li>
                                        <a href="{{ route('berita.show', $u->slug) }}"
                                           class="block text-sm text-gray-700 hover:text-blue-600">
                                            <div class="font-medium">{{ \Illuminate\Support\Str::limit($u->judul, 70) }}</div>
                                            <div class="text-xs text-gray-500">{{ $u->created_at->diffForHumans() }}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500">Tidak ada berita lain.</p>
                        @endif
                    @else
                        <p class="text-sm text-gray-500">Tidak ada berita lain.</p>
                    @endif
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="container max-w-6xl px-4 mx-auto">

        <!-- Layout 2 kolom: konten utama (2/3) + sidebar (1/3) -->
        <div class="md:grid md:grid-cols-3 md:gap-6">

            <!-- Konten utama (tanpa box: no bg, no shadow) -->
            <div class="md:col-span-2">
                <!-- Judul Berita -->
                <h1 class="mb-4 text-3xl font-bold text-gray-900">
                    {{ $berita->judul }}
                </h1>

                <!-- Gambar Utama -->
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="w-full h-auto mb-6 rounded-lg">
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

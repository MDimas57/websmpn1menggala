@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Informasi PPDB
                </h1>
            </div>
        </div>
        {{-- Wadah untuk semua postingan, beri jarak lebih besar antar artikel --}}
        <div class="space-y-12">

            {{-- Loop untuk setiap item informasi --}}
            @forelse ($informasiItems as $item)

                <article class="grid items-start grid-cols-1 gap-6 md:grid-cols-3 md:gap-8">

                    {{-- ======================== --}}
                    {{--         KOLOM KIRI         --}}
                    {{-- ======================== --}}
                    <div class="overflow-hidden bg-white rounded-lg shadow-lg md:col-span-1">

                        @if ($item->foto)
                            {{--
                              PERUBAHAN DI SINI:
                              - 'h-80' (tinggi tetap) DIHAPUS.
                              - 'object-cover' (pemotong) DIHAPUS.
                              - 'h-auto' DITAMBAHKAN agar tinggi gambar menyesuaikan lebarnya secara otomatis.
                            --}}
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 alt="{{ $item->judul }}"
                                 class="w-full h-auto">
                        @else
                            {{-- Tampilan jika tidak ada foto (kita beri tinggi 64 agar tidak hilang) --}}
                            <div class="flex items-center justify-center w-full h-64 bg-gray-200">
                                <span class="text-gray-400">Tidak ada gambar</span>
                            </div>
                        @endif

                        {{-- Judul diletakkan di bawah gambar, di dalam kartu --}}
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-bold text-gray-900">
                                {{ $item->judul }}
                            </h3>
                        </div>
                    </div>

                    {{-- ======================== --}}
                    {{--         KOLOM KANAN        --}}
                    {{-- ======================== --}}
                    <div class="md:col-span-2">

                        <div class="mb-4 text-sm text-gray-500">
                            Diposting pada: {{ $item->created_at->format('d F Y') }}
                        </div>

                        {{-- Teks deskripsi --}}
                        <div class="prose prose-lg max-w-none">
                            {!! $item->deskripsi !!}
                        </div>
                    </div>

                </article>

            @empty
                {{-- Tampilan jika belum ada data --}}
                <div class="p-8 text-center bg-white rounded-lg shadow-md">
                    <p class="text-gray-500">
                        Belum ada informasi PPDB untuk ditampilkan saat ini.
                    </p>
                </div>
            @endforelse

        </div>

    </div>
</div>

@endsection

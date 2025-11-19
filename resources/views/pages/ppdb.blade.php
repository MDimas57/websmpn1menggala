@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        {{-- Header Judul (Warna Utama) --}}
        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Informasi PPDB
                </h1>
            </div>
        </div>

        {{-- Wadah untuk semua postingan --}}
        <div class="space-y-12">

            {{-- Loop untuk setiap item informasi --}}
            @forelse ($informasiItems as $item)

                {{-- 
                    PERUBAHAN 1: 
                    Border atas diubah dari 'border-blue-800' menjadi 'border-yellow-500' 
                --}}
                <article class="p-8 bg-white shadow-xl rounded-2xl border-t-4 border-yellow-500 transition-all hover:shadow-2xl">

                    <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-3">

                        {{-- ======================== --}}
                        {{--      KOLOM KIRI (VISUAL)      --}}
                        {{-- ======================== --}}
                        <div class="md:col-span-1">

                            {{-- Hiasan garis kecil di atas (Opsional, sudah serasi) --}}
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                            {{-- 
                                PERUBAHAN 2: 
                                Background pembungkus foto diubah dari 'bg-blue-800' 
                                menjadi Gradient Kuning (Sama seperti Header)
                            --}}
                            <div class="p-4 rounded-xl shadow-lg bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         alt="{{ $item->judul }}"
                                         class="w-full h-auto rounded-lg border-4 border-white object-cover">
                                @else
                                    <div class="flex items-center justify-center w-full h-48 bg-white/20 rounded-lg backdrop-blur-sm">
                                        <span class="text-white font-semibold">Tidak ada gambar</span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-0 pt-4 text-center">
                                <h3 class="text-xl font-extrabold text-gray-900 tracking-tight leading-snug">
                                    {{ $item->judul }}
                                </h3>
                            </div>
                        </div>

                        {{-- ======================== --}}
                        {{--      KOLOM KANAN (KONTEN)     --}}
                        {{-- ======================== --}}
                        <div class="md:col-span-2">

                            <div class="flex items-center gap-2 mb-4 text-sm font-medium text-gray-600 border-b border-gray-100 pb-2">
                                {{-- 
                                    PERUBAHAN 3: 
                                    Ikon kalender diubah dari 'text-blue-800' menjadi 'text-amber-600'
                                --}}
                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>Diposting: {{ $item->created_at->format('d F Y') }}</span>
                            </div>

                            <div class="prose prose-lg max-w-none space-y-4 text-justify text-gray-800">
                                {!! $item->deskripsi !!}
                            </div>
                        </div>

                    </div>
                </article>

            @empty
                <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Informasi PPDB Belum Tersedia</h3>
                    <p class="mt-2 text-gray-500">Belum ada informasi penerimaan peserta didik baru yang diunggah saat ini.</p>
                </div>
            @endforelse

        </div>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
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

                <article class="p-8 bg-white shadow-xl rounded-2xl border-t-4 border-blue-800 transition-all hover:shadow-2xl">

                    <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-3">

                        {{-- ======================== --}}
                        {{--      KOLOM KIRI (VISUAL)      --}}
                        {{-- ======================== --}}
                        <div class="md:col-span-1">

                            <div class="bg-blue-800 p-4 rounded-xl shadow-lg">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                        alt="{{ $item->judul }}"
                                        class="w-full h-auto rounded-lg border-4 border-white object-cover">
                                @else
                                    <div class="flex items-center justify-center w-full h-48 bg-gray-200 rounded-lg">
                                        <span class="text-gray-400">Tidak ada gambar</span>
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
                                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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

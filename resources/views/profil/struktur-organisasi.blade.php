@extends('layouts.app')

@section('content')

{{--
    BACKGROUND UTAMA:
    - Sama persis dengan halaman Profil & Kata Sambutan.
    - Menggunakan gradasi 'from-orange-200 to-yellow-200'.
    - 'min-h-screen' dan '-mb-20' agar footer menyatu.
--}}
<div class="relative w-full min-h-screen -mb-20 overflow-hidden bg-gradient-to-br from-orange-200 to-yellow-200">

    {{-- Elemen Dekorasi Background --}}
    <div class="absolute top-0 left-0 z-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute bg-blue-500 rounded-full -top-24 -right-24 w-96 h-96 blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 bg-purple-500 rounded-full -left-24 w-72 h-72 blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    </div>

    {{-- CONTAINER UTAMA --}}
    <div class="container relative z-10 px-4 py-16 pb-40 mx-auto max-w-7xl">

        {{-- HEADER JUDUL --}}
        <div class="mb-12 overflow-hidden bg-white shadow-2xl rounded-xl">
            <div class="relative p-8 overflow-hidden bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                {{-- Pattern Overlay Header --}}
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                <h1 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Struktur Sekolah
                </h1>
            </div>
        </div>

        @if($struktur && $struktur->count() > 0)
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2">

                @foreach($struktur as $item)
                    {{-- KARTU STRUKTUR --}}
                    <div class="overflow-hidden transition-all duration-300 border shadow-2xl bg-white/95 backdrop-blur-sm rounded-2xl border-white/20 hover:-translate-y-2 hover:shadow-orange-200 group">

                        {{-- Garis Aksen Atas --}}
                        <div class="h-2 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                        <div class="p-8">
                            <h2 class="mb-4 text-2xl font-extrabold text-center text-gray-900 transition-colors group-hover:text-amber-600">
                                {{ $item->judul }}
                            </h2>

                            <div class="w-20 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mx-auto mb-8 shadow-sm"></div>

                            {{-- Container Foto --}}
                            <div class="relative max-w-md mx-auto overflow-hidden bg-gray-100 border-4 border-white shadow-lg rounded-xl">
                                {{-- Efek Overlay saat Hover --}}
                                <div class="absolute inset-0 z-10 transition-colors pointer-events-none bg-black/0 group-hover:bg-black/5"></div>

                                <img src="{{ asset('storage/'. $item->foto) }}"
                                     alt="{{ $item->judul }}"
                                     class="object-cover w-full h-auto transition-transform duration-700 ease-out group-hover:scale-105">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-2xl p-16 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Data Belum Tersedia</h3>
                <p class="mt-3 text-lg text-gray-600">Struktur organisasi sekolah belum ditambahkan.</p>
            </div>
        @endif

    </div>
</div>
@endsection

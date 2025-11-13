{{-- 1. Gunakan layout utama (header & footer otomatis) --}}
@extends('layouts.app')

{{-- 2. Masukkan konten ini ke @yield('content') --}}
@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Galeri Kegiatan Sekolah
        </h1>

        @php
            // Hitung foto saja (untuk pesan 'kosong' yang lebih akurat)
            $photoItems = $photos->where('tipe', 'foto');
        @endphp

        {{-- 3. Cek apakah ada foto --}}
        @if($photoItems->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                {{-- 4. Loop setiap data --}}
                @foreach ($photos as $photo)

                    {{-- 5. PENTING: Kita hanya tampilkan yang tipenya 'foto' --}}
                    @if ($photo->tipe == 'foto')
                        <div class="rounded-xl overflow-hidden shadow-lg bg-white transition-transform duration-300 hover:scale-105">
                            
                            {{-- 
                              INI ADALAH PERBAIKANNYA:
                              Gunakan '$photo->file' (bukan 'foto')
                              Gunakan '$photo->nama_kegiatan' (bukan 'judul')
                            --}}
                            <img src="{{ asset('storage/' . $photo->file) }}" alt="{{ $photo->nama_kegiatan }}" class="w-full h-64 object-cover">
                            
                            <div class="p-4">
                                <p class="text-gray-700 text-sm font-semibold">{{ $photo->nama_kegiatan }}</p>
                            </div>
                        </div>
                    @endif {{-- Akhir dari if 'foto' --}}

                @endforeach
            </div>
        @else
            {{-- Tampilkan ini jika tidak ada foto (hanya foto) --}}
            <p class="text-center text-gray-500">Belum ada foto di galeri.</p>
        @endif
    </div>
</div>
@endsection
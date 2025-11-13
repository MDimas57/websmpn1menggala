{{-- 1. Gunakan layout utama (header & footer otomatis) --}}
@extends('layouts.app')

{{-- 2. Masukkan konten ini ke @yield('content') --}}
@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Galeri Kegiatan Sekolah
        </h1>

        {{-- 3. Cek apakah ada foto --}}
        @if($photos->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                {{-- 4. Loop setiap foto --}}
                @foreach ($photos as $photo)
                    <div class="rounded-xl overflow-hidden shadow-lg bg-white transition-transform duration-300 hover:scale-105">
                        <img src="{{ asset('storage/' . $photo->gambar) }}" alt="{{ $photo->keterangan }}" class="w-full h-64 object-cover">

                        @if($photo->keterangan)
                        <div class="p-4">
                            <p class="text-gray-700 text-sm">{{ $photo->keterangan }}</p>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            {{-- Tampilkan ini jika tidak ada foto --}}
            <p class="text-center text-gray-500">Belum ada foto di galeri.</p>
        @endif
    </div>
</div>
@endsection
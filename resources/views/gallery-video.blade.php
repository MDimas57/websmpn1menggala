{{-- 1. Gunakan layout utama (header & footer otomatis) --}}
@extends('layouts.app')

{{-- 2. Masukkan konten ini ke @yield('content') --}}
@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Galeri Video Sekolah
        </h1>

        {{-- 3. Cek apakah ada video --}}
        @if($videos->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                {{-- 4. Loop setiap video --}}
                @foreach ($videos as $video)
                    <div class="rounded-xl overflow-hidden shadow-lg bg-white">
                        
                        {{-- KITA GUNAKAN TAG <video> --}}
                        <video class="w-full h-64 object-cover" controls>
                            <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                        
                        <div class="p-4">
                            <p class="text-gray-700 text-sm font-semibold">{{ $video->nama_kegiatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Tampilkan ini jika tidak ada video --}}
            <p class="text-center text-gray-500">Belum ada video di galeri.</p>
        @endif
    </div>
</div>
@endsection
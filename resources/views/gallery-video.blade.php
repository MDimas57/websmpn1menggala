{{-- 1. Gunakan layout utama (header & footer otomatis) --}}
@extends('layouts.app')

{{-- 2. Masukkan konten ini ke @yield('content') --}}
@section('content')
<div class="py-12 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-8 overflow-hidden bg-white shadow-lg rounded-xl"> <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Galeri Video Sekolah
                </h1>
            </div>
        </div>
        {{-- 3. Cek apakah ada video --}}
        @if($videos->count())
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">

                {{-- 4. Loop setiap video --}}
                @foreach ($videos as $video)
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">

                        {{-- KITA GUNAKAN TAG <video> --}}
                        <video class="object-cover w-full h-64" controls>
                            <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>

                        <div class="p-4">
                            <p class="text-sm font-semibold text-gray-700">{{ $video->nama_kegiatan }}</p>
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

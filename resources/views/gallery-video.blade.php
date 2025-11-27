@extends('layouts.app')

@section('content')

{{--
    BACKGROUND UTAMA:
    - Menggunakan gradasi 'from-orange-200 to-yellow-200' (Konsisten).
    - 'min-h-screen' dan '-mb-20' untuk perbaikan layout footer.
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
                {{-- Pattern Overlay --}}
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                <h1 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.55 4.55a2 2 0 010 2.83L15 22.95m-3-17l4.55 4.55a2 2 0 010 2.83L12 18.95M7.45 7.45l2.83 2.83a2 2 0 002.83 0L17 7.45m-7-2l4.55 4.55a2 2 0 010 2.83L14.55 12"></path></svg>
                    Galeri Video Sekolah
                </h1>
            </div>
        </div>

        {{-- Cek apakah ada video --}}
        @if($videos && $videos->count() > 0)
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">

                {{-- Loop setiap video --}}
                @foreach ($videos as $video)
                    <div class="overflow-hidden transition-all duration-300 bg-white border-4 border-white shadow-xl rounded-2xl group hover:-translate-y-2 hover:shadow-2xl">

                        {{-- Hiasan Garis Atas --}}
                        <div class="h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                        {{-- Player Video --}}
                        <div class="relative transition-opacity bg-black group-hover:opacity-95">
                            <video class="object-cover w-full h-56 md:h-64" controls controlslist="nodownload">
                                <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div>

                        {{-- Info Video --}}
                        <div class="p-5 bg-white">
                            <h4 class="text-lg font-bold leading-snug text-gray-800 transition-colors group-hover:text-amber-600 line-clamp-2">
                                {{ $video->nama_kegiatan }}
                            </h4>

                            <div class="flex items-center mt-3 text-xs font-medium text-gray-500">
                                <svg class="w-4 h-4 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $video->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Tampilan jika galeri kosong --}}
            <div class="max-w-2xl p-16 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.55 4.55a2 2 0 010 2.83L15 22.95m-3-17l4.55 4.55a2 2 0 010 2.83L12 18.95M7.45 7.45l2.83 2.83a2 2 0 002.83 0L17 7.45m-7-2l4.55 4.55a2 2 0 010 2.83L14.55 12"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Galeri Video Masih Kosong</h3>
                <p class="mt-3 text-lg text-gray-600">Belum ada video kegiatan yang diunggah saat ini.</p>
            </div>
        @endif
    </div>
</div>
@endsection

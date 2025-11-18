@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Galeri Video Sekolah
                </h1>
            </div>
        </div>

        {{-- Cek apakah ada video --}}
        @if($videos->count())
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">

                {{-- Loop setiap video --}}
                @foreach ($videos as $video)
                    <div class="overflow-hidden bg-white shadow-xl rounded-2xl group border border-gray-100 transition-transform hover:-translate-y-1 duration-300">

                        <div class="h-1 bg-yellow-500"></div>

                        <div class="relative">
                            <video class="object-cover w-full h-56 md:h-64" controls controlslist="nodownload">
                                <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div>

                        <div class="p-4 md:p-5">
                            <h4 class="text-base font-extrabold text-gray-800 leading-snug group-hover:text-blue-700 transition-colors">
                                {{ $video->nama_kegiatan }}
                            </h4>
                            <p class="text-xs text-gray-500 mt-1">
                                Dipublikasikan: {{ $video->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.55 4.55a2 2 0 010 2.83L15 22.95m-3-17l4.55 4.55a2 2 0 010 2.83L12 18.95M7.45 7.45l2.83 2.83a2 2 0 002.83 0L17 7.45m-7-2l4.55 4.55a2 2 0 010 2.83L14.55 12"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Galeri Video Masih Kosong</h3>
                <p class="mt-2 text-gray-500">Belum ada video kegiatan yang diunggah saat ini.</p>
            </div>
        @endif
    </div>
</div>
@endsection

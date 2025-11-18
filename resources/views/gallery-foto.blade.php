@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Galeri Kegiatan Sekolah
                </h1>
            </div>
        </div>

        @if($photos && $photos->count() > 0)

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4"> {{-- Loop untuk setiap foto dari controller --}}
                @foreach($photos as $photo)
                    <div class="relative overflow-hidden shadow-xl rounded-xl group border-2 border-transparent hover:border-blue-500 transition-all duration-300">

                        <a href="{{ asset('storage/' . $photo->file) }}"
                           class="gallery-lightbox"
                           data-description="{{ $photo->nama_kegiatan }}">

                            <img src="{{ asset('storage/' . $photo->file) }}"
                                 alt="{{ $photo->nama_kegiatan }}"
                                 class="object-cover w-full h-56 md:h-64 transition-transform duration-500 group-hover:scale-110">
                        </a>

                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-500 flex items-end">
                            <div class="w-full p-4 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-lg font-bold text-white text-center tracking-tight leading-snug">
                                    {{ $photo->nama_kegiatan }}
                                </h3>
                                <div class="w-8 h-1 bg-yellow-400 mx-auto mt-2 rounded"></div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        @else
            <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5.5V18a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v2.5"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Galeri Masih Kosong</h3>
                <p class="mt-2 text-gray-500">Belum ada foto kegiatan yang diunggah saat ini.</p>
            </div>
        @endif

    </div>
</div>
@endsection

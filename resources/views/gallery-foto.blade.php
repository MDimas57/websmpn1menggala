@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Galeri Kegiatan Sekolah
                </h1>
            </div>
        </div>
        @if($photos && $photos->count() > 0)

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-8">

                {{-- Loop untuk setiap foto dari controller --}}
                @foreach($photos as $photo)
                    <div class="relative overflow-hidden shadow-lg rounded-xl group">
                        <a href="{{ asset('storage/' . $photo->file) }}"
                           class="gallery-lightbox"
                           data-description="{{ $photo->nama_kegiatan }}">
                            <img src="{{ asset('storage/' . $photo->file) }}"
                                 alt="{{ $photo->nama_kegiatan }}"
                                 class="object-cover w-full transition-transform duration-300 h-72 group-hover:scale-105">
                        </a>
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent">
                            <h3 class="text-lg font-bold text-center text-white">
                                {{ $photo->nama_kegiatan }}
                            </h3>
                        </div>
                    </div>
                @endforeach

            </div>

        @else
            {{-- Tampilan jika galeri masih kosong --}}
            <div class="p-8 text-center bg-white rounded-lg shadow-md">
                <p class="text-gray-500">
                    Belum ada foto untuk ditampilkan di galeri.
                </p>
            </div>
        @endif

    </div>
</div>
@endsection

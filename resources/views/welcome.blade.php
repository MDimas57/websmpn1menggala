@extends('layouts.app')

@section('content')

@php
    use App\Models\Banner;
    use App\Models\Berita;

    $banners = Banner::latest()->get();
    $beritaTerbaru = Berita::latest()->take(3)->get();
@endphp

<!-- SLIDER BANNER -->
<section id="banner-slider" class="splide" aria-label="Banner dan Pengumuman Sekolah">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($banners as $banner)
                <li class="splide__slide">
                    <div class="relative w-full h-[600px] overflow-hidden">
                       <img 
    src="{{ asset('storage/' . $banner->foto) }}" 
    alt="{{ $banner->judul }}" 
    class="absolute inset-0 w-full h-full object-cover z-0"
/>

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent z-10"></div>
                        <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white p-8 z-20">
                            <h2 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow-lg">{{ $banner->judul }}</h2>
                            <p class="text-lg md:text-xl max-w-2xl drop-shadow-lg">{{ $banner->keterangan }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- BERITA TERBARU -->
<div class="p-8 md:p-12 bg-gray-100">
    <div class="container mx-auto max-w-7xl">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($beritaTerbaru as $berita)
                <div class="rounded-xl overflow-hidden shadow-lg bg-white transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3">{{ $berita->ringkasan }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
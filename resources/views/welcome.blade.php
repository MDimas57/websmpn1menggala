@extends('layouts.app')

@section('content')

@php
    use App\Models\Banner;
    use App\Models\Berita;

    $banners = Banner::latest()->get();
    $beritaTerbaru = Berita::latest()->take(3)->get();
@endphp

<!-- SLIDER BANNER (MODIFIED) -->
<section id="banner-slider" class="relative splide" aria-label="Banner dan Pengumuman Sekolah"
         data-splide='{"type":"loop","arrows":false,"autoplay":true,"interval":3000,"pauseOnHover":false,"pauseOnFocus":false,"pagination":true}'>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($banners as $banner)
                <li class="splide__slide">
                    <div class="relative w-full h-[600px] overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $banner->foto) }}"
                            alt="Banner Sekolah"
                            class="absolute inset-0 z-0 object-cover w-full h-full"
                        />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

    <div class="absolute bottom-0 left-0 z-20 p-8 text-white md:p-12">
        <h2 class="text-4xl font-bold text-green-400 md:text-5xl drop-shadow-lg" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">
            SELAMAT DATANG
        </h2>
        <h3 class="mt-1 text-3xl font-bold md:text-4xl drop-shadow-lg" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">
            DI SMP NEGERI 1 MENGGALA
        </h3>
        <p class="mt-2 text-lg md:text-xl drop-shadow-lg">
            Mendidik generasi masa depan dengan karakter kuat, akademik unggul, dan siap menghadapi tantangan global.
        </p>

    </div>
</section>

<!-- BERITA TERBARU -->
<div class="p-8 bg-gray-100 md:p-12">
    <div class="container mx-auto max-w-7xl">
        <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Berita Terbaru</h2>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @forelse ($beritaTerbaru as $berita)
                <div class="overflow-hidden transition-transform duration-300 bg-white shadow-lg rounded-xl hover:scale-105">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-56">
                    <div class="p-4">
                        <h3 class="mb-2 text-xl font-bold text-gray-800">{{ $berita->judul }}</h3>
                        <p class="text-sm text-gray-600 line-clamp-3">{{ $berita->ringkasan }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Inisialisasi Splide: non-aktifkan panah dan aktifkan autoplay -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Splide !== 'undefined') {
            new Splide('.splide', {
                type: 'loop',
                arrows: false,       // hilangkan ikon prev/next
                autoplay: true,      // ganti slide otomatis
                interval: 5000,      // waktu tiap slide (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                pagination: true
            }).mount();
        } else {
            console.warn('Splide tidak ditemukan. Pastikan library Splide.js dimuat.');
        }
    });
</script>

@endsection

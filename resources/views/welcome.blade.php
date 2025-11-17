@extends('layouts.app')

@section('content')

@php
    use App\Models\Banner;
    use App\Models\Berita;
    use App\Models\Guru;
    use Illuminate\Support\Str;

    $banners = Banner::latest()->get();
    // 1. TETAP 20 BERITA
    $beritaTerbaru = Berita::latest()->take(20)->get();
    $tenagaPendidik = Guru::latest()->get();
@endphp

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

<div class="p-8 bg-gray-100 md:p-12">
    <div class="container mx-auto max-w-7xl">
        <h2 class="mb-10 text-3xl font-bold text-center text-gray-800">Berita Terbaru</h2>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse ($beritaTerbaru as $berita)
                <article class="flex gap-4">

                    <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="flex-shrink-0 block w-1/3">
                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}"
                             alt="{{ $berita->judul }}"
                             class="object-cover w-full h-32 shadow-lg rounded-xl"> </a>

                    <div class="flex flex-col justify-center flex-1">

                        <h3 class="mb-2 text-base font-bold leading-tight text-gray-700">
                            <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}" class="hover:text-green-600">{{ Str::limit($berita->judul, 70) }}</a>
                        </h3>

                        <div class="flex items-center gap-4 text-xs text-gray-500"> <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M5.75 3a.75.75 0 00-1.5 0v1.5H3a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3v-8a3 3 0 00-3-3h-1.25V3a.75.75 0 00-1.5 0v1.5H5.75V3zM3 8.5h10V16a1 1 0 01-1 1H4a1 1 0 01-1-1V8.5z" clip-rule="evenodd" />
                                </svg>
                                <time datetime="{{ $berita->created_at? $berita->created_at->toDateString() : '' }}">
                                    {{ $berita->created_at ? $berita->created_at->format('M j, Y') : '-' }}
                                </time>
                            </div>

                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M3.45 2.502a.75.75 0 010 1.06L1.22 5.79a.75.75 0 01-1.06-1.06l2.22-2.22a.75.75 0 011.06 0zm1.06 1.06a.75.75 0 000-1.06L2.28 1.44a.75.75 0 00-1.06 1.06l2.22 2.22zM8.75 2.5a.75.75 0 01.75-.75h7.5a.75.75 0 01.75.75v7.5a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-7.5zM9.5 9.5h6V3.25h-6v6.25zM12 12.75a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v3a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-3z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $berita->views ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <p class="col-span-1 text-center text-gray-500 md:col-span-2 lg:col-span-3">Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="container px-4 mx-auto max-w-7xl">
        <h2 class="mb-8 text-3xl font-bold text-center text-gray-900">
            Tenaga Pendidik
        </h2>

        @if($tenagaPendidik && $tenagaPendidik->count() > 0)
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach($tenagaPendidik as $guru)
                    <div class="overflow-hidden transition-transform duration-300 bg-white shadow-lg rounded-xl hover:scale-105">
                        <div class="p-4 bg-blue-700">
                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 alt="{{ $guru->nama_lengkap }}"
                                 class="object-cover object-top w-full h-56 border-4 border-white rounded-lg shadow-md">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-gray-900 text-md">
                                {{ $guru->nama_lengkap }}
                            </h3>
                            <p class="text-sm text-gray-600">
                                {{ $guru->jenis_gtk }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">
                Data tenaga pendidik belum tersedia.
            </p>
        @endif
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Splide !== 'undefined') {
            new Splide('.splide', {
                type: 'loop',
                arrows: false,
                autoplay: true,
                interval: 5000,
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

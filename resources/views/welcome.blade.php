@extends('layouts.app')

@section('content')

@php
    use App\Models\Banner;
    use App\Models\Berita;
    use App\Models\Guru;
    use Illuminate\Support\Str;

    $banners = Banner::latest()->get();

    $beritaTerbaru = Berita::latest()->where('status', 'publish')->take(20)->get();
    $tenagaPendidik = Guru::latest()->get();
@endphp


<section id="banner-slider" class="relative splide"
         aria-label="Banner dan Pengumuman Sekolah"
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

    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/75 via-black/40 to-transparent"></div>

    <div class="absolute bottom-0 left-0 z-20 max-w-3xl p-6 text-white md:p-12">
        <div class="inline-flex items-center gap-3 mb-4">
            <span class="block w-16 h-1 bg-green-400 rounded-full animate-pulse"></span>
        </div>

        <h1 class="text-3xl font-extrabold leading-tight md:text-5xl lg:text-6xl">
            <span class="block text-transparent bg-gradient-to-r from-yellow-300 via-green-400 to-green-600 bg-clip-text">
                SELAMAT DATANG
            </span>
            <span class="block mt-1 text-2xl font-bold md:text-3xl text-white/90">
                DI <span class="text-green-300">SMP NEGERI 1 MENGGALA</span>
            </span>
        </h1>

        <div class="flex items-center gap-4 mt-6">
            <a href="{{ url('kata-sambutan') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-sm md:text-base font-semibold text-white bg-green-500 hover:bg-green-600 rounded-full shadow-lg transition-transform transform hover:-translate-y-0.5">
                Pelajari Selengkapnya
            </a>
        </div>
    </div>
</section>


<div class="py-20 bg-gray-100 md:py-24">
    <div class="container mx-auto max-w-7xl">
        <h2 class="mb-12 text-3xl font-bold text-center text-gray-800">Berita Terbaru</h2>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($beritaTerbaru as $berita)

                <article class="flex gap-4">

                    <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}"
                       class="flex-shrink-0 block w-1/3">
                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}"
                             alt="{{ $berita->judul }}"
                             class="object-cover w-full h-32 shadow-lg rounded-xl">
                    </a>

                    <div class="flex flex-col justify-center flex-1">

                        <h3 class="mb-2 text-base font-bold leading-tight text-gray-700">
                            <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}"
                               class="hover:text-green-600">
                                {{ Str::limit($berita->judul, 70) }}
                            </a>
                        </h3>

                        <div class="flex items-center gap-4 text-xs text-gray-500">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.75 3a.75.75 0 00-1.5 0v1.5H3a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3v-8a3 3 0 00-3-3h-1.25V3a.75.75 0 00-1.5 0v1.5H5.75V3z"
                                          clip-rule="evenodd" />
                                </svg>
                                <time>{{ $berita->created_at ? $berita->created_at->format('M j, Y') : '-' }}</time>
                            </div>

                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M3.45 2.502a.75.75 0 010 1.06L1.22 5.79a.75.75 0 01-1.06-1.06l2.22-2.22a.75.75 0 011.06 0z"
                                          clip-rule="evenodd" />
                                </svg>
                                <span>{{ $berita->views ?? 0 }}</span>
                            </div>
                        </div>

                    </div>

                </article>

            @empty
                <p class="col-span-1 text-center text-gray-500 md:col-span-2 lg:col-span-3">
                    Belum ada berita untuk ditampilkan.
                </p>
            @endforelse
        </div>
    </div>
</div>



<section class="py-24 bg-yellow-100"> {{-- PERBAIKAN: jarak sangat lega --}}
    <div class="container px-4 mx-auto max-w-7xl">

        <h2 class="mb-12 text-3xl font-bold text-center text-gray-900">
            Tenaga Pendidik
        </h2>

        @if($tenagaPendidik && $tenagaPendidik->count() > 0)

            <div class="relative overflow-visible splide splide-tenaga"
                 aria-label="Slider Tenaga Pendidik"
                 data-splide='{
                     "type":"loop",
                     "perPage":4,
                     "perMove":1,
                     "gap":"2rem",
                     "autoplay":true,
                     "interval":3000,
                     "pauseOnHover":true,
                     "pauseOnFocus":true,
                     "arrows":true,
                     "pagination":false,
                     "breakpoints":{
                        "1024":{"perPage":3},
                        "768":{"perPage":2},
                        "480":{"perPage":1}
                     }
                 }'>

                <div class="splide__track">
                    <ul class="px-2 splide__list">

                        @foreach($tenagaPendidik as $guru)
                            <li class="py-4 splide__slide">

                                <a href="{{ route('guru.show', $guru->id) }}"
                                   class="block transition-transform duration-300 bg-white shadow-lg rounded-xl hover:shadow-2xl hover:scale-105">

                                    <div class="pb-4">
                                        <div class="p-6 bg-blue-700 rounded-t-xl">
                                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                                 alt="{{ $guru->nama_lengkap }}"
                                                 class="object-cover object-top w-full h-56 border-4 border-white rounded-lg shadow-md">
                                        </div>

                                        <div class="p-5 text-center">
                                            <h3 class="mb-1 font-bold text-gray-900 text-md">
                                                {{ $guru->nama_lengkap }}
                                            </h3>
                                            <p class="text-sm text-gray-600">
                                                {{ $guru->jenis_gtk }}
                                            </p>
                                        </div>
                                    </div>

                                </a>

                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>

        @else
            <p class="text-center text-gray-500">
                Data tenaga pendidik belum tersedia.
            </p>
        @endif

    </div>
</section>

@endsection

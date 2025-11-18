@extends('layouts.app')

@section('content')

@php
    use App\Models\Banner;
    use App\Models\Berita;
    use App\Models\Guru;
    use Illuminate\Support\Str;

    $banners = Banner::latest()->get();
    $beritaTerbaru = Berita::latest()->where('status', 'publish')->take(20)->get();
    $beritaTerbaru = Berita::latest()->take(20)->get();
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


<div class="py-20 bg-white md:py-24">
    <div class="container px-4 mx-auto max-w-7xl">
        
        <div class="flex flex-col justify-between pb-4 mb-12 border-b border-gray-200 md:flex-row md:items-end">
            <div class="pl-6 border-l-8 border-blue-600">
                <h2 class="text-3xl font-extrabold text-gray-900">Berita Terbaru</h2>
                <p class="mt-2 text-lg text-gray-500">Update kegiatan dan prestasi terkini sekolah.</p>
            </div>
            <a href="#" class="items-center hidden mt-4 font-semibold text-blue-600 transition-colors md:inline-flex hover:text-blue-800 md:mt-0">
                Lihat Semua Berita 
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($beritaTerbaru as $berita)

                <article class="flex gap-4">
                    <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}"
                       class="relative flex-shrink-0 block w-1/3 overflow-hidden rounded-xl">
                        <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}"
                             alt="{{ $berita->judul }}"
                             class="object-cover w-full h-32 transition-transform duration-500 shadow-lg hover:scale-110">
                    </a>

                    <div class="flex flex-col justify-center flex-1">
                        <h3 class="mb-2 text-base font-bold leading-tight text-gray-800 transition-colors hover:text-blue-600">
                            <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}">
                                {{ Str::limit($berita->judul, 60) }}
                            </a>
                        </h3>

                        <div class="flex items-center gap-3 mt-auto text-xs text-gray-400">
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.75 3a.75.75 0 00-1.5 0v1.5H3a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3v-8a3 3 0 00-3-3h-1.25V3a.75.75 0 00-1.5 0v1.5H5.75V3z" clip-rule="evenodd" />
                                </svg>
                                <time>{{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}</time>
                            </div>
                        </div>
                    </div>
                </article>

            @empty
                <p class="col-span-1 text-center text-gray-500 md:col-span-3">
                    Belum ada berita untuk ditampilkan.
                </p>
            @endforelse
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="#" class="inline-block px-6 py-2 font-semibold text-blue-600 transition-colors border border-blue-600 rounded-full hover:bg-blue-600 hover:text-white">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</div>


<section class="relative py-24 bg-white">
    <div class="absolute top-0 left-0 w-full h-1/2 bg-green-50/50 -z-10 rounded-b-[3rem]"></div>

    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-16 text-center">
            <span class="text-sm font-bold tracking-widest text-green-600 uppercase">Sumber Daya Manusia</span>
            <h2 class="mt-2 mb-4 text-4xl font-extrabold text-gray-900">Tenaga Pendidik</h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-green-400 to-emerald-600 mx-auto rounded-full"></div>
            <p class="max-w-2xl mx-auto mt-4 text-gray-500">
                Guru-guru berdedikasi yang siap membimbing siswa menuju masa depan yang gemilang.
            </p>
        </div>

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

                <div class="p-2 splide__track"> 
                    <ul class="splide__list">
                        @foreach($tenagaPendidik as $guru)
                            <li class="splide__slide">
                                <a href="{{ route('guru.show', $guru->id) }}"
                                   class="block overflow-hidden transition-all duration-300 transform bg-white border border-white group rounded-2xl hover:shadow-xl hover:-translate-y-1">
                                    
                                    <div class="relative h-64 overflow-hidden">
                                        <div class="absolute inset-0 z-10 transition-colors bg-black/20 group-hover:bg-black/0"></div>
                                        
                                        <img src="{{ asset('storage/' . $guru->foto) }}"
                                             alt="{{ $guru->nama_lengkap }}"
                                             class="object-cover object-top w-full h-full transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <div class="relative p-6 text-center">
                                        <div class="absolute z-20 flex items-center justify-center w-10 h-10 transform -translate-x-1/2 bg-green-500 border-4 border-white rounded-full -top-6 left-1/2">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>

                                        <h3 class="mt-4 text-lg font-bold text-gray-900 transition-colors group-hover:text-green-600">
                                            {{ $guru->nama_lengkap }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $guru->jenis_gtk }}
                                        </p>
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
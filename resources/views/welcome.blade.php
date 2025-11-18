@extends('layouts.app')

@section('content')

@php
    use App\Models\Banner;
    use App\Models\Berita;
    use App\Models\Guru;
    use Illuminate\Support\Str;

    $banners = Banner::latest()->get();
    $beritaTerbaru = Berita::latest()->take(15)->get();
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

    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

    <div class="absolute bottom-0 left-0 z-20 max-w-3xl p-8 text-white md:p-16">

        <div class="inline-flex items-center gap-3 mb-6">
            <span class="block w-20 h-1.5 bg-yellow-400 rounded-full animate-pulse shadow-lg shadow-yellow-400/50"></span>
        </div>

        <h1 class="text-4xl font-extrabold leading-tight tracking-tight md:text-6xl lg:text-7xl drop-shadow-lg">
            <span class="block text-yellow-400">
                SELAMAT DATANG
            </span>
            <span class="block mt-2 text-2xl font-bold text-white md:text-4xl">
                DI SMP NEGERI 1 MENGGALA
            </span>
        </h1>

        <div class="flex items-center gap-4 mt-8">
            <a href="{{ url('kata-sambutan') }}"
               class="inline-flex items-center gap-2 px-6 py-3 text-base font-bold text-yellow-900 transition-transform transform bg-yellow-400 rounded-full shadow-lg hover:bg-yellow-300 hover:-translate-y-1">
                Pelajari Selengkapnya
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>


<div class="py-24 bg-gray-50">
    <div class="container mx-auto max-w-7xl px-4">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 border-b border-gray-200 pb-6">
            <div class="border-l-8 border-yellow-500 pl-6">
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Berita Terbaru</h2>
                <p class="mt-3 text-lg text-gray-500">Update kegiatan dan prestasi terkini sekolah.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($beritaTerbaru as $berita)

                <article class="group flex gap-5 bg-white p-5 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-yellow-200">

                    <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}"
                       class="flex-shrink-0 block w-1/3 overflow-hidden rounded-xl relative h-32"> <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default-news.jpg') }}"
                             alt="{{ $berita->judul }}"
                             class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                    </a>

                    <div class="flex flex-col justify-between flex-1">
                        <h3 class="text-lg font-bold leading-snug text-gray-800 group-hover:text-blue-700 transition-colors">
                            <a href="{{ url('berita/' . ($berita->slug ?? $berita->id)) }}">
                                {{ Str::limit($berita->judul, 60) }}
                            </a>
                        </h3>

                        <div class="flex items-center gap-4 text-xs font-medium text-gray-400 mt-2">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                <time>{{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}</time>
                            </div>
                        </div>
                    </div>
                </article>

            @empty
                <div class="col-span-3 text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <p class="text-lg text-gray-500 font-medium">Belum ada berita untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>


<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-yellow-50 rounded-full blur-3xl -z-10"></div>
    <div class="absolute top-1/2 -left-24 w-72 h-72 bg-blue-50 rounded-full blur-3xl -z-10"></div>

    <div class="container px-4 mx-auto max-w-7xl">

        <div class="text-center mb-20">
            <span class="text-blue-600 font-bold tracking-widest uppercase text-sm bg-blue-50 px-3 py-1 rounded-full">SDM Unggul</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-6">Tenaga Pendidik</h2>
            <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 mx-auto rounded-full shadow-md"></div>
            <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Guru-guru berdedikasi tinggi yang siap membimbing siswa menuju masa depan yang gemilang dan berkarakter.
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

                <div class="splide__track p-4"> <ul class="splide__list">
                        @foreach($tenagaPendidik as $guru)
                            <li class="splide__slide">
                                <a href="{{ route('guru.show', $guru->id) }}"
                                   class="group block bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-2xl hover:shadow-yellow-100 transition-all duration-300 transform hover:-translate-y-2">

                                    <div class="relative h-72 overflow-hidden bg-gray-100">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity z-10"></div>

                                        <img src="{{ asset('storage/' . $guru->foto) }}"
                                             alt="{{ $guru->nama_lengkap }}"
                                             class="object-cover object-top w-full h-full transition-transform duration-700 group-hover:scale-105">
                                    </div>

                                    <div class="p-6 text-center relative -mt-12 z-20">
                                        <div class="mx-auto w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center border-4 border-white shadow-lg mb-3 group-hover:bg-yellow-300 transition-colors">
                                            <svg class="w-8 h-8 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>

                                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition-colors">
                                            {{ $guru->nama_lengkap }}
                                        </h3>
                                        <p class="text-sm font-medium text-gray-500 mt-1 uppercase tracking-wide">
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
            <div class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <p class="text-lg text-gray-500">Data tenaga pendidik belum tersedia.</p>
            </div>
        @endif

    </div>
</section>

@endsection

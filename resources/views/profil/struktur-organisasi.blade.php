@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100 md:py-16">
    <div class="container px-4 mx-auto max-w-7xl">

        <!--
          MODIFIKASI BAGIAN JUDUL:
          Diganti menjadi box dengan background gradient kuning/amber
          sesuai permintaan Anda.
        -->
        <div class="mb-10 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Struktur Sekolah
                </h1>
            </div>
        </div>
        <!-- AKHIR MODIFIKASI JUDUL -->

        @if($struktur && $struktur->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                @foreach($struktur as $item)
                    <div class="overflow-hidden bg-white shadow-xl rounded-xl">

                        <!-- Aksen gradasi biru-hijau di kartu item tetap dipertahankan -->
                        <div class="h-1.5 bg-gradient-to-r from-blue-700 to-green-500"></div>

                        <div class="p-6">
                            <!-- Judul Item -->
                            <h2 class="mb-6 text-2xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-green-500">
                                {{ $item->judul }}
                            </h2>

                            <!-- Gambar Item -->
                            <div class="overflow-hidden shadow-lg rounded-xl">
                                <img src="{{ asset('storage/'. $item->foto) }}"
                                     alt="{{ $item->judul }}"
                                     class="w-full h-auto transition-transform duration-300 ease-in-out hover:scale-105">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <!-- Tampilan jika data kosong -->
            <div class="p-12 text-center bg-white shadow-lg rounded-xl">
                <p class="text-xl text-gray-500">Struktur organisasi belum tersedia.</p>
            </div>
        @endif

    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100 md:py-20">
    <div class="container max-w-6xl px-4 mx-auto">

        @if($sambutan)
            <div class="flex flex-col md:flex-row md:items-start md:gap-12">

                <!-- KOLOM KIRI (FOTO) -->
                <div class="flex-shrink-0 md:w-1/3">
                    <!--
                      Mempertahankan style unik:
                      rounded-t-xl rounded-bl-xl [border-bottom-right-radius:2.5rem]
                    -->
                    <div class="overflow-hidden text-center bg-white shadow-xl
                                rounded-t-xl rounded-bl-xl
                                [border-bottom-right-radius:2.5rem]
                                flex flex-col items-center justify-center p-8 md:p-12">

                        <img src="{{ $sambutan->foto ? asset('storage/' . $sambutan->foto) : 'https://placehold.co/200x200/eeeeee/cccccc?text=Foto' }}"
                             alt="{{ $sambutan->nama_kepsek }}"
                             class="object-cover w-48 h-48 mx-auto rounded-full shadow-lg">

                        <h3 class="mt-6 text-2xl font-bold text-gray-900">{{ $sambutan->nama_kepsek }}</h3>
                        <p class="text-lg font-semibold text-blue-700">{{ $sambutan->jabatan }}</p>

                    </div>
                </div>

                <!-- KOLOM KANAN (TEKS SAMBUTAN) -->
                <div class="w-full mt-8 md:w-2/3 md:mt-0">

                    <!--
                      MODIFIKASI JUDUL:
                      Menggunakan Card Header dengan Gradasi Kuning/Amber
                    -->
                    <div class="mb-6 overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="p-6 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                            <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                                Kata Sambutan
                            </h1>
                        </div>
                    </div>
                    <!-- AKHIR MODIFIKASI -->

                    <div class="space-y-4 prose text-justify max-w-none prose-p:text-gray-700 prose-headings:text-gray-800">
                        {!! $sambutan->kata_sambutan !!}
                    </div>
                </div>
            </div>
        @else
            <div class="p-12 text-center bg-white shadow-lg rounded-xl">
                <p class="text-gray-500">Kata sambutan belum tersedia.</p>
            </div>
        @endif

    </div>
</div>
@endsection

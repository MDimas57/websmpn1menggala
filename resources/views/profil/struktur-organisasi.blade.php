@extends('layouts.app')

@section('content')

<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
<div class="py-12 bg-gray-100 md:py-16">
    <div class="container px-4 mx-auto max-w-7xl">

        <h1 class="mb-10 text-4xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-green-500">
            Struktur Sekolah
        </h1>

        @if($struktur && $struktur->count() > 0)

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                @foreach($struktur as $item)
                    <div class="bg-white shadow-lg rounded-xl p-6">
                        
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                            {{ $item->judul }}
                        </h2>
                        
                        <a href="{{ asset('storage/'. $item->foto) }}" 
                           class="gallery-lightbox" 
                           data-description="{{ $item->judul }}">
                            
                            <img src="{{ asset('storage/'. $item->foto) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-auto rounded-lg shadow-md cursor-pointer transition-transform duration-300 hover:scale-105">
                        </a>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                @foreach($struktur as $item)
                    <div class="overflow-hidden bg-white shadow-xl rounded-xl">

                        <div class="h-1.5 bg-gradient-to-r from-blue-700 to-green-500"></div>

                        <div class="p-6">

                            <h2 class="mb-6 text-2xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-green-500">
                                {{ $item->judul }}
                            </h2>

                            <div class="overflow-hidden shadow-lg rounded-xl">
                                <img src="{{ asset('storage/'. $item->foto) }}"
                                     alt="{{ $item->judul }}"
                                     class="w-full h-auto transition-transform duration-300 ease-in-out hover:scale-105">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div> @else
            <div class="text-center text-gray-500">
                <p>Struktur organisasi belum tersedia.</p>
            <div class="p-12 text-center bg-white shadow-lg rounded-xl">
                <p class="text-xl text-gray-500">Struktur organisasi belum tersedia.</p>
            </div>
        @endif

    </div>
</div>
@endsection

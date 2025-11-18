@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
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

                    </div>
                @endforeach

            </div> @else
            <div class="text-center text-gray-500">
                <p>Struktur organisasi belum tersedia.</p>
            </div>
        @endif

    </div>
</div>
@endsection
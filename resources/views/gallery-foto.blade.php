@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Galeri Kegiatan Sekolah
        </h1>

        @php
            $photoItems = $photos->where('tipe', 'foto');
        @endphp

        @if($photoItems->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                @foreach ($photos as $photo)
                    @if ($photo->tipe == 'foto')
                        
                        {{-- KITA UBAH BAGIAN INI --}}
                        <div class="rounded-xl overflow-hidden shadow-lg bg-white">
                            
                            {{-- 
                              1. Kita bungkus <img> dengan <a>
                              2. href="" mengarah ke gambar ukuran penuh
                              3. class="" adalah 'selector' yang dibaca GLightbox
                              4. data-description="" akan menjadi caption
                            --}}
                            <a href="{{ asset('storage/' . $photo->file) }}" 
                               class="gallery-lightbox" 
                               data-description="{{ $photo->nama_kegiatan }}">
                                
                                <img src="{{ asset('storage/' . $photo->file) }}" 
                                     alt="{{ $photo->nama_kegiatan }}" 
                                     class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                            </a>
                            
                            <div class="p-4">
                                <p class="text-gray-700 text-sm font-semibold">{{ $photo->nama_kegiatan }}</p>
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">Belum ada foto di galeri.</p>
        @endif
    </div>
</div>
@endsection
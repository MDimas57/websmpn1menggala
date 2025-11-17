@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-4xl px-4 bg-white shadow-lg rounded-xl p-8">
        
        <!-- Judul Berita -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4">
            {{ $berita->judul }}
        </h1>
        
        <!-- Info Meta (Tanggal & Penulis) -->
        <!-- Pastikan Anda memiliki kolom 'penulis' di tabel 'beritas' Anda -->
        <div class="text-gray-500 text-sm mb-6">
            <span>Oleh: {{ $berita->penulis ?? 'Admin' }}</span>
            <span class="mx-2">|</span>
            <span>Diposting: {{ $berita->created_at->format('d F Y') }}</span>
        </div>

        <!-- Gambar Utama -->
        @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                 alt="{{ $berita->judul }}"
                 class="w-full h-auto rounded-lg shadow-md mb-8">
        @endif

        <!-- Isi Berita -->
        {{-- Kita gunakan {!! ... !!} untuk merender HTML dari rich text editor --}}
        <div class="prose max-w-none">
            {!! $berita->isi_berita !!}
        </div>

    </div>
</div>
@endsection
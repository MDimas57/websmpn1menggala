@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-4xl px-4 bg-white shadow-lg rounded-xl p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Kata Sambutan
        </h1>
        
        @if($sambutan)
            <div class="flex flex-col md:flex-row gap-8 items-center">
                
                <div class="md:w-1/3 text-center">
                    {{-- DISESUAIKAN: Menggunakan 'foto' (bukan 'foto_kepala_sekolah') --}}
                    <img src="{{ asset('storage/' . $sambutan->foto) }}" 
                         {{-- DISESUAIKAN: Menggunakan 'nama_kepsek' --}}
                         alt="{{ $sambutan->nama_kepsek }}" 
                         class="w-48 h-48 rounded-full object-cover mx-auto shadow-md">
                    
                    {{-- DISESUAIKAN: Menggunakan 'nama_kepsek' --}}
                    <h3 class="text-xl font-bold mt-4">{{ $sambutan->nama_kepsek }}</h3>
                    
                    {{-- BENAR: 'jabatan' sudah benar --}}
                    <p class="text-gray-600">{{ $sambutan->jabatan }}</p>
                </div>

                <div class="md:w-2/3">
                    <div class="prose max-w-none">
                        {{-- DISESUAIKAN: Menggunakan 'kata_sambutan' (bukan 'isi_sambutan') --}}
                        {!! $sambutan->kata_sambutan !!}
                    </div>
                </div>
            </div>
        @else
            <p class="text-center text-gray-500">Kata sambutan belum tersedia.</p>
        @endif
    </div>
</div>
@endsection
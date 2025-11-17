@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-4xl px-4 bg-white shadow-lg rounded-xl p-8">
        
        <!-- Judul Halaman (dinamis dari Controller) -->
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            {{ $judul ?? 'Bidang Sekolah' }}
        </h1>
        
        <!-- Cek apakah data ada -->
        @if($data)
            <div class="flex flex-col md:flex-row gap-8">
                
                <!-- Kolom Kiri: Foto, Nama, Jabatan -->
                <div class="md:w-1/3 flex-shrink-0 text-center">
                    @if($data->foto)
                        <img src="{{ asset('storage/' . $data->foto) }}" 
                             alt="{{ $data->nama }}" 
                             class="w-full h-auto rounded-lg shadow-md mb-4">
                    @else
                        <!-- Placeholder jika tidak ada foto -->
                        <img src="https://placehold.co/400x400/eeeeee/cccccc?text=Foto" 
                             alt="{{ $data->nama }}" 
                             class="w-full h-auto rounded-lg shadow-md mb-4">
                    @endif
                    <h2 class="text-xl font-bold text-gray-800">{{ $data->nama }}</h2>
                    <p class="text-md text-gray-600">{{ $data->jabatan }}</p>
                </div>
                
                <!-- Kolom Kanan: Deskripsi dan File Upload -->
                <div class="md:w-2/3">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi</h3>
                    <div class="prose max-w-none mb-6">
                        <!-- Menampilkan deskripsi dari rich text editor -->
                        {!! $data->deskripsi !!}
                    </div>
                    
                    <!-- Tampilkan tombol download HANYA JIKA ada file -->
                    @if($data->file_upload)
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Dokumen Terkait</h3>
                        <a href="{{ asset('storage/' . $data->file_upload) }}" 
                           target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                            <!-- Ikon download -->
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download File
                        </a>
                    @endif
                </div>
            </div>
        @else
            <!-- Ini akan tampil jika data untuk bidang tsb belum diisi di admin -->
            <p class="text-center text-gray-500">Data untuk bidang ini belum tersedia.</p>
        @endif

    </div>
</div>
@endsection
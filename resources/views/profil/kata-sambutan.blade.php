@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-6xl px-4">
        
        <!-- 
          PERUBAHAN 1:
          - Card utama sekarang menjadi container untuk 'flex'
          - 'overflow-hidden' penting untuk menjaga 'rounded-xl'
        -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            
            @if($sambutan)
                <!-- PERUBAHAN 2: Tata letak diubah menjadi 'flex-row' di desktop -->
                <div class="flex flex-col md:flex-row">
                    
                    <!-- 
                      Kolom Kiri (Biru):
                      - Latar belakang biru, teks putih
                      - Dibuat 'flex' untuk menengahkan konten secara vertikal/horizontal
                    -->
                    <div class="md:w-1/3 flex-shrink-0 bg-blue-700 p-8 md:p-12 text-center flex flex-col items-center justify-center">
                        <img src="{{ $sambutan->foto ? asset('storage/' . $sambutan->foto) : 'https://placehold.co/200x200/eeeeee/cccccc?text=Foto' }}" 
                             alt="{{ $sambutan->nama_kepsek }}" 
                             class="w-48 h-48 rounded-lg object-cover shadow-md border-4 border-white">
                        
                        <h3 class="text-2xl font-bold mt-6 text-white">{{ $sambutan->nama_kepsek }}</h3>
                        <p class="text-lg text-blue-100">{{ $sambutan->jabatan }}</p>
                    </div>

                    <!-- 
                      Kolom Kanan (Putih):
                      - Latar belakang putih
                      - Judul "Kata Sambutan" sekarang ada di sini
                    -->
                    <div class="md:w-2/3 p-8 md:p-12">
                        <h1 class="text-3xl font-bold text-gray-900 mb-6">
                            Kata Sambutan
                        </h1>
                        <div class="prose max-w-none prose-p:text-gray-700 prose-headings:text-gray-800">
                            {!! $sambutan->kata_sambutan !!}
                        </div>
                    </div>
                </div>
            @else
                <!-- Pesan 'else' diletakkan di dalam padding -->
                <div class="p-8 md:p-12">
                    <p class="text-center text-gray-500">Kata sambutan belum tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
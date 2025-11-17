@extends('layouts.app')

@section('content')

{{-- Latar belakang halaman --}}
<div class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">
        
        <h1 class="mb-12 text-3xl font-bold text-center text-gray-900">
            Galeri Kegiatan Sekolah
        </h1>

        {{-- Cek jika ada foto --}}
        {{-- Asumsi $photos sudah difilter 'foto' dari Controller --}}
        @if($photos && $photos->count() > 0)
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                
                {{-- Loop untuk setiap foto dari controller --}}
                @foreach($photos as $photo)
                    
                    {{-- 
                      KARTU BINGKAI FOTO:
                      - 'relative' diperlukan agar caption bisa di-overlay.
                      - 'overflow-hidden' agar sudut gambar mengikuti 'rounded-xl'.
                      - 'group' digunakan untuk efek hover pada gambar.
                    --}}
                    <div class="relative overflow-hidden shadow-lg rounded-xl group">
                        
                        {{-- 
                          Wrapper <a> untuk GLightbox
                          Menggunakan kolom 'file' dan 'nama_kegiatan' dari kode Anda
                        --}}
                        <a href="{{ asset('storage/' . $photo->file) }}" 
                           class="gallery-lightbox" 
                           data-description="{{ $photo->nama_kegiatan }}">
                            
                            {{-- 
                              GAMBAR:
                              - 'h-72' (tinggi 288px) membuat semua kartu sama tinggi.
                              - 'object-cover' memastikan gambar mengisi bingkai.
                              - Menggunakan 'file' dan 'nama_kegiatan'
                            --}}
                            <img src="{{ asset('storage/' . $photo->file) }}" 
                                 alt="{{ $photo->nama_kegiatan }}" 
                                 class="w-full h-72 object-cover transition-transform duration-300 group-hover:scale-105">
                        </a>

                        {{-- 
                          CAPTION OVERLAY (Gaya Gambar 1):
                          - 'absolute' menempatkannya di atas gambar.
                          - 'bottom-0 left-0 right-0' menempel di bagian bawah.
                          - 'bg-gradient-to-t...' memberi efek bayangan gelap.
                          - Menggunakan 'nama_kegiatan'
                        --}}
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent">
                            
                            {{-- 
                              PERUBAHAN DI SINI: 
                              Menambahkan 'text-center' untuk membuat teks ke tengah
                            --}}
                            <h3 class="text-lg font-bold text-white text-center">
                                {{ $photo->nama_kegiatan }}
                            </h3>
                        </div>
                    </div>
                @endforeach

            </div>

        @else
            {{-- Tampilan jika galeri masih kosong --}}
            <div class_alias="p-8 text-center bg-white rounded-lg shadow-md">
                <p class="text-gray-500">
                    Belum ada foto untuk ditampilkan di galeri.
                </p>
            </div>
        @endif

    </div>
</div>

{{-- 
  CATATAN: 
  Pastikan GLightbox CSS & JS sudah dimuat di layout 'app.blade.php' Anda,
  dan Anda memiliki skrip untuk menginisialisasinya, seperti:
  <script>
      const lightbox = GLightbox({
          selector: '.gallery-lightbox'
      });
  </script>
--}}

@endsection
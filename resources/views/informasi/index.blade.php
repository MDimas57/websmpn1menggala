@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        
        <!-- Judul Halaman (Tetap sama) -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500 p-8">
                <h1 class="text-3xl font-bold text-white text-center" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Informasi Sekolah
                </h1>
            </div>
        </div>

        <!-- 
          PERUBAHAN UTAMA:
          Grid 2 kolom untuk Sidebar Navigasi + Konten Detail
        -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- ================================== -->
            <!--   Kolom Kiri (SIDEBAR NAVIGASI)    -->
            <!-- ================================== -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Card "Daftar Informasi" -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar Informasi</h3>
                        
                        <!-- Daftar link dari semua informasi -->
                        <nav class="flex flex-col space-y-2">
                            @forelse($semuaInformasi as $infoLink)
                                <!-- 
                                  Cek apakah link ini adalah link yang sedang 'aktif'
                                  Jika ya, tambahkan background biru
                                -->
                                <a href="{{ route('informasi.show', $infoLink->id) }}" 
                                   class="block px-4 py-3 rounded-lg font-semibold transition-colors
                                   @if(isset($infoDetail) && $infoDetail->id == $infoLink->id)
                                        bg-blue-600 text-white shadow-md
                                   @else
                                        text-gray-700 hover:bg-gray-200
                                   @endif
                                  ">
                                    {{ $infoLink->judul }}
                                </a>
                            @empty
                                <p class="text-gray-500 text-sm">Belum ada informasi.</p>
                            @endforelse
                        </nav>
                    </div>
                </div>
            </div> <!-- Penutup Kolom Kiri -->

            
            <!-- ================================== -->
            <!--   Kolom Kanan (KONTEN DETAIL)      -->
            <!-- ================================== -->
            <div class="lg:col-span-3 space-y-6">
                
                @if($infoDetail)
                    <!-- Card untuk detail informasi yang dipilih -->
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                        <div class="p-6 md:p-8">
                            
                            <!-- Judul dari item yang dipilih -->
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                                {{ $infoDetail->judul }}
                            </h2>
                            
                            <!-- Deskripsi (dari rich text editor) -->
                            <div class="prose max-w-none mb-6">
                                {!! $infoDetail->deskripsi !!}
                            </div>
                            
                            <!-- Tombol Download (HANYA MUNCUL JIKA ADA FILE) -->
                            @if($infoDetail->file_upload)
                                <a href="{{ asset('storage/' . $infoDetail->file_upload) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download
                                </a>
                            @endif

                        </div>
                    </div>
                @else
                    <!-- Tampil jika tidak ada informasi sama sekali -->
                    <div class="bg-white shadow-lg rounded-xl p-8 text-center">
                        <p class="text-gray-500">Belum ada informasi untuk ditampilkan.</p>
                        <p class="text-sm text-gray-400 mt-2">Silakan tambahkan data melalui admin panel.</p>
                    </div>
                @endif
                
            </div> <!-- Penutup Kolom Kanan -->

        </div> <!-- Penutup .grid -->
    </div>
</div>
@endsection
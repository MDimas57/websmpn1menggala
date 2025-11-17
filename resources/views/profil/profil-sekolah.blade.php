@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <!-- 
      - Mengganti max-w-4xl menjadi max-w-7xl agar lebih lebar
    -->
    <div class="container mx-auto max-w-7xl px-4">
        
        @if($profil)
            <!-- Card Putih Utama -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                
                <!-- Bagian Header Profil (Logo, Nama, Akreditasi) -->
                <div class="p-8">
                    <div class="flex flex-col sm:flex-row items-center gap-6">
                        <!-- Logo -->
                        @if($profil->logo)
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="w-32 h-32 rounded-full shadow-md border-4 border-gray-200">
                        @else
                            <img src="https://placehold.co/128x128/eeeeee/cccccc?text=Logo" alt="Logo Sekolah" class="w-32 h-32 rounded-full shadow-md border-4 border-gray-200">
                        @endif
                        
                        <!-- Nama dan Akreditasi -->
                        <div class="text-center sm:text-left">
                            <h1 class="text-3xl font-bold text-gray-900">
                                {{ $profil->nama_sekolah ?? 'Nama Sekolah Belum Diatur' }}
                            </h1>
                            @if($profil->akreditasi)
                                <span class="inline-block bg-green-200 text-green-800 text-sm font-semibold px-3 py-1 rounded-full mt-2">
                                    Akreditasi: {{ $profil->akreditasi }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Bagian Statistik (Jumlah Siswa, Guru, Rombel) -->
                <div class="bg-gray-50 border-t border-b border-gray-200 px-8 py-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                        <div>
                            <p class="text-3xl font-bold text-blue-600">{{ $profil->jumlah_peserta_didik ?? '0' }}</p>
                            <p class="text-sm font-semibold text-gray-500">Peserta Didik</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-blue-600">{{ $profil->jumlah_tenaga_pendidik ?? '0' }}</p>
                            <p class="text-sm font-semibold text-gray-500">Tenaga Pendidik</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-blue-600">{{ $profil->jumlah_rombel ?? '0' }}</p>
                            <p class="text-sm font-semibold text-gray-500">Rombongan Belajar</p>
                        </div>
                    </div>
                </div>
                
                <!-- 
                  ▼▼▼ BAGIAN DESKRIPSI BARU DITAMBAHKAN DI SINI ▼▼▼
                -->
                <div class="p-8">
                    <!-- 'prose' sangat penting untuk styling HTML dari admin panel -->
                    <div class="prose max-w-none">
                        <!-- 
                          Menggunakan 'deskripsi' sesuai nama kolom baru di Model Anda 
                        -->
                        {!! $profil->deskripsi !!}
                    </div>
                </div>
                <!-- ▲▲▲ AKHIR BAGIAN DESKRIPSI ▲▲▲ -->

            </div>
        @else
            <!-- Ini akan tampil jika tidak ada data sama sekali -->
            <div class="bg-white shadow-lg rounded-xl p-8 text-center">
                <p class="text-center text-gray-500">Profil sekolah belum tersedia.</p>
                <p class="text-sm text-gray-400 mt-2">Silakan tambahkan data melalui admin panel.</p>
            </div>
        @endif
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        @if($profil)
            <div class="flex flex-col md:flex-row md:items-start md:gap-8">

                <!-- KOLOM KIRI (PROFIL & STATISTIK) - Tidak Berubah -->
                <div class="w-full md:w-1/3">
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">

                        <div class="p-8">
                            <div class="flex flex-col items-center gap-4">
                                @if($profil->logo)
                                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="w-32 h-32 border-4 border-gray-200 rounded-full shadow-md">
                                @else
                                    <img src="https://placehold.co/128x128/eeeeee/cccccc?text=Logo" alt="Logo Sekolah" class="w-32 h-32 border-4 border-gray-200 rounded-full shadow-md">
                                @endif

                                <div class="text-center">
                                    <h1 class="text-2xl font-bold text-gray-900"> {{ $profil->nama_sekolah ?? 'Nama Sekolah Belum Diatur' }}
                                    </h1>
                                    @if($profil->akreditasi)
                                        <span class="inline-block px-3 py-1 mt-2 text-sm font-semibold text-green-800 bg-green-200 rounded-full">
                                            Akreditasi: {{ $profil->akreditasi }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="px-8 py-6 border-t border-gray-200 bg-gray-50">
                            <div class="grid grid-cols-1 gap-6 text-center sm:grid-cols-3">
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

                    </div>
                </div>

                <!-- KOLOM KANAN (DESKRIPSI) -->
                <div class="w-full md:w-2/3">

                    <div class="mt-8 md:mt-0">

                        <!-- Judul (Sudah benar 'text-center') -->
                        <h2 class="mb-6 text-3xl font-bold text-center text-transparent  bg-clip-text bg-gradient-to-r from-blue-700 to-green-500">
                            Tentang Sekolah
                        </h2>

                        <!--
                          PERUBAHAN DI SINI UNTUK MEMPERBAIKI OVERLAP:
                          - 'mt-4' ditambahkan untuk memberi jarak dari judul.
                          - Kelas 'prose' disederhanakan menjadi 'prose prose-gray'
                            agar styling default (termasuk margin paragraf) diterapkan.
                        -->
                        <div class="mt-4 prose prose-gray max-w-none">
                            {!! $profil->deskripsi !!}
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="p-8 text-center bg-white shadow-lg rounded-xl">
                <p class="text-center text-gray-500">Profil sekolah belum tersedia.</p>
                <p class="mt-2 text-sm text-gray-400">Silakan tambahkan data melalui admin panel.</p>
            </div>
        @endif
    </div>
</div>
@endsection

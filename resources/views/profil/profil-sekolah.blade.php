@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        @if($profil)
            <div class="flex flex-col md:flex-row md:items-start md:gap-8">

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

                <div class="w-full md:w-2/3">

                    <div class="mt-8 md:mt-0">

                        <div class="mb-6 overflow-hidden bg-white shadow-lg rounded-xl"> <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                                <h2 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                                    Tentang Sekolah
                                </h2>
                            </div>
                        </div>
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

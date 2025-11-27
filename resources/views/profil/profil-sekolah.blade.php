@extends('layouts.app')

@section('content')

{{--
    BACKGROUND UTAMA:
    - Diubah menjadi 'from-orange-200 to-yellow-200' agar warnanya lebih lembut
      dan sama persis dengan kode referensi Anda.
--}}
<div class="relative w-full min-h-screen -mb-20 overflow-hidden bg-gradient-to-br from-orange-200 to-yellow-200">

    {{-- Elemen Dekorasi Background --}}
    <div class="absolute top-0 left-0 z-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute bg-blue-500 rounded-full -top-24 -right-24 w-96 h-96 blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 bg-purple-500 rounded-full -left-24 w-72 h-72 blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    </div>

    {{-- CONTAINER UTAMA --}}
    <div class="container relative z-10 px-4 py-16 pb-40 mx-auto max-w-7xl">

        @if($profil)
            <div class="flex flex-col md:flex-row md:items-start md:gap-10">

                {{-- KOLOM KIRI: IDENTITAS & DATA POKOK --}}
                <div class="w-full md:w-1/3">
                    <div class="relative overflow-hidden bg-white border shadow-2xl rounded-2xl border-white/20 group">

                        {{-- Hiasan Atas --}}
                        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                        <div class="p-8 bg-white">
                            <div class="flex flex-col items-center gap-6 text-center">

                                <div class="relative">
                                    <div class="absolute transition duration-500 rounded-full opacity-25 -inset-1 bg-gradient-to-r from-yellow-400 to-amber-500 blur group-hover:opacity-50"></div>
                                    @if($profil->logo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="relative object-cover w-32 h-32 border-4 border-white rounded-full shadow-lg">
                                    @else
                                        <img src="https://placehold.co/128x128/eeeeee/cccccc?text=Logo" alt="Logo Sekolah" class="relative object-cover w-32 h-32 border-4 border-white rounded-full shadow-lg">
                                    @endif
                                </div>

                                <div>
                                    <h1 class="text-2xl font-extrabold leading-snug tracking-tight text-gray-900">
                                        {{ $profil->nama_sekolah ?? 'Nama Sekolah Belum Diatur' }}
                                    </h1>

                                    @if($profil->akreditasi)
                                        <span class="inline-flex items-center px-3 py-1 mt-3 text-xs font-bold tracking-wider text-blue-800 uppercase bg-blue-100 rounded-full">
                                            Akreditasi: {{ $profil->akreditasi }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Statistik Data --}}
                        <div class="px-6 py-6 border-t border-gray-100 bg-gray-50/80">
                            <div class="grid grid-cols-1 gap-4 text-center divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">

                                <div class="p-2">
                                    <p class="text-2xl font-black text-yellow-500">
                                        {{ $profil->jumlah_peserta_didik ?? '0' }}
                                    </p>
                                    <p class="mt-1 text-xs font-bold tracking-wide text-gray-500 uppercase">Siswa</p>
                                </div>

                                <div class="p-2">
                                    <p class="text-2xl font-black text-blue-600">
                                        {{ $profil->jumlah_tenaga_pendidik ?? '0' }}
                                    </p>
                                    <p class="mt-1 text-xs font-bold tracking-wide text-gray-500 uppercase">Guru</p>
                                </div>

                                <div class="p-2">
                                    <p class="text-2xl font-black text-green-600">
                                        {{ $profil->jumlah_rombel ?? '0' }}
                                    </p>
                                    <p class="mt-1 text-xs font-bold tracking-wide text-gray-500 uppercase">Rombel</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- KOLOM KANAN: DESKRIPSI SEKOLAH --}}
                <div class="w-full md:w-2/3">

                    <div class="mt-8 md:mt-0">

                        <div class="mb-12 overflow-hidden bg-white shadow-2xl rounded-xl">
                            <div class="relative p-6 overflow-hidden bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                                <h2 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    Tentang Sekolah
                                </h2>
                            </div>
                        </div>

                        {{-- Card Konten Deskripsi --}}
                        <div class="p-8 border shadow-xl bg-white/95 backdrop-blur-sm rounded-2xl border-white/20">
                            <div class="leading-relaxed prose prose-lg text-justify text-gray-700 prose-gray max-w-none">
                                {!! $profil->deskripsi !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-2xl p-12 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-xl border-white/20">
                <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full shadow-inner bg-blue-50">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Profil Belum Tersedia</h3>
                <p class="mt-2 text-gray-600">Silakan tambahkan data profil sekolah melalui panel admin.</p>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        @if($profil)
            <div class="flex flex-col md:flex-row md:items-start md:gap-10">

                <div class="w-full md:w-1/3">
                    <div class="overflow-hidden bg-white shadow-xl rounded-2xl border border-gray-100">

                        <div class="p-8 bg-white">
                            <div class="flex flex-col items-center gap-6 text-center">

                                <div class="relative">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full blur opacity-25"></div>
                                    @if($profil->logo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="relative w-32 h-32 border-4 border-white rounded-full shadow-lg object-cover">
                                    @else
                                        <img src="https://placehold.co/128x128/eeeeee/cccccc?text=Logo" alt="Logo Sekolah" class="relative w-32 h-32 border-4 border-white rounded-full shadow-lg object-cover">
                                    @endif
                                </div>

                                <div>
                                    <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight leading-snug">
                                        {{ $profil->nama_sekolah ?? 'Nama Sekolah Belum Diatur' }}
                                    </h1>

                                    @if($profil->akreditasi)
                                        <span class="inline-flex items-center px-3 py-1 mt-3 text-xs font-bold text-blue-800 uppercase tracking-wider bg-blue-100 rounded-full">
                                            Akreditasi: {{ $profil->akreditasi }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="px-6 py-6 border-t border-gray-100 bg-gray-50/50">
                            <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-gray-200">

                                <div class="p-2">
                                    <p class="text-2xl font-black text-yellow-500">
                                        {{ $profil->jumlah_peserta_didik ?? '0' }}
                                    </p>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mt-1">Siswa</p>
                                </div>

                                <div class="p-2">
                                    <p class="text-2xl font-black text-blue-600">
                                        {{ $profil->jumlah_tenaga_pendidik ?? '0' }}
                                    </p>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mt-1">Guru</p>
                                </div>

                                <div class="p-2">
                                    <p class="text-2xl font-black text-green-600">
                                        {{ $profil->jumlah_rombel ?? '0' }}
                                    </p>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mt-1">Rombel</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-full md:w-2/3">

                    <div class="mt-8 md:mt-0">

                        <div class="mb-8 overflow-hidden bg-white shadow-lg rounded-xl">
                            <div class="p-6 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                                <h2 class="text-3xl font-bold text-center text-white flex items-center justify-center gap-3" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    Tentang Sekolah
                                </h2>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <div class="prose prose-lg prose-gray max-w-none text-justify leading-relaxed text-gray-600">
                                {!! $profil->deskripsi !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @else
            <div class="p-12 text-center bg-white shadow-lg rounded-xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Profil Belum Tersedia</h3>
                <p class="mt-2 text-gray-500">Silakan tambahkan data profil sekolah melalui panel admin.</p>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

{{--
    BACKGROUND UTAMA:
    - Menggunakan gradasi 'from-orange-200 to-yellow-200' (Konsisten).
    - 'min-h-screen' dan '-mb-20' untuk perbaikan layout footer.
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

        {{-- HEADER JUDUL --}}
        <div class="mb-12 overflow-hidden bg-white shadow-2xl rounded-xl">
            <div class="relative p-8 overflow-hidden bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                {{-- Pattern Overlay --}}
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                <h1 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    {{ $judul ?? 'Bidang Sekolah' }}
                </h1>
            </div>
        </div>

        @if($data)
            {{-- KARTU KONTEN UTAMA --}}
            <div class="flex flex-col gap-10 p-8 border shadow-2xl md:flex-row bg-white/95 backdrop-blur-sm rounded-2xl md:p-10 border-white/20">

                {{-- KOLOM KIRI: FOTO & IDENTITAS --}}
                <div class="flex-shrink-0 text-center md:w-1/3">

                    {{-- Bingkai Foto --}}
                    <div class="bg-gradient-to-br from-yellow-500 to-amber-600 rounded-tl-3xl rounded-br-3xl p-1.5 mb-6 shadow-xl relative overflow-hidden group">
                        <div class="absolute inset-0 transition-opacity opacity-0 pointer-events-none bg-white/20 group-hover:opacity-20"></div>

                        <div class="bg-white rounded-[20px] overflow-hidden">
                            @if($data->foto)
                                <img src="{{ asset('storage/' . $data->foto) }}"
                                     alt="{{ $data->nama }}"
                                     class="relative z-10 object-cover object-top w-full h-auto transition-transform duration-500 group-hover:scale-105">
                            @else
                                <img src="https://placehold.co/400x400/eeeeee/cccccc?text=Foto"
                                     alt="{{ $data->nama }}"
                                     class="relative z-10 object-cover w-full h-auto">
                            @endif
                        </div>
                    </div>

                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">{{ $data->nama }}</h2>

                    <div class="mt-3">
                        <span class="inline-block px-4 py-1.5 bg-yellow-100 text-yellow-800 rounded-full text-sm font-bold border border-yellow-200">
                            {{ $data->jabatan }}
                        </span>
                    </div>

                    <div class="w-20 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mx-auto mt-6 shadow-sm"></div>

                </div>

                {{-- KOLOM KANAN: DESKRIPSI & DOKUMEN --}}
                <div class="md:w-2/3">

                    <div class="mb-8 space-y-4 leading-relaxed prose prose-lg text-justify text-gray-700 max-w-none">
                        {!! $data->deskripsi !!}
                    </div>

                    @if($data->file_upload)
                        <div class="pt-8 border-t border-gray-200/60">
                            <h3 class="flex items-center gap-2 mb-4 text-lg font-bold text-gray-800">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Dokumen Terkait
                            </h3>

                            <a href="{{ asset('storage/' . $data->file_upload) }}"
                               target="_blank"
                               class="inline-flex items-center px-6 py-3 font-bold text-white transition-all transform shadow-lg bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl hover:from-blue-700 hover:to-blue-800 hover:-translate-y-1 hover:shadow-blue-500/30">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download Dokumen
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-2xl p-16 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Data Bidang Belum Tersedia</h3>
                <p class="mt-3 text-lg text-gray-600">Silakan tambahkan data Koordinator dan deskripsi melalui panel admin.</p>
            </div>
        @endif

    </div>
</div>
@endsection

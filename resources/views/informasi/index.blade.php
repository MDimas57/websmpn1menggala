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
                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Informasi Sekolah
                </h1>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-10 lg:grid-cols-4">

            {{-- ======================== --}}
            {{-- KOLOM KIRI: SIDEBAR NAV --}}
            {{-- ======================== --}}
            <div class="lg:col-span-1">
                <div class="sticky overflow-hidden border shadow-xl bg-white/95 backdrop-blur-sm rounded-2xl border-white/20 top-24">
                    <div class="p-6">
                        <h3 class="flex items-center gap-2 pb-3 mb-4 text-xl font-extrabold text-gray-900 border-b border-orange-200">
                             <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                            Daftar Informasi
                        </h3>

                        <nav class="flex flex-col mt-4 space-y-2">
                            @forelse($semuaInformasi as $infoLink)
                                <a href="{{ route('informasi.show', $infoLink->id) }}"
                                   class="block px-4 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:translate-x-1
                                   @if(isset($infoDetail) && $infoDetail->id == $infoLink->id)
                                        bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg shadow-blue-500/30 ring-2 ring-white/50
                                   @else
                                        text-gray-700 hover:bg-orange-50 hover:text-amber-700
                                   @endif
                                    ">
                                    {{ $infoLink->judul }}
                                </a>
                            @empty
                                <p class="py-4 text-sm italic text-center text-gray-500">Belum ada informasi.</p>
                            @endforelse
                        </nav>
                    </div>
                </div>
            </div>

            {{-- ======================== --}}
            {{-- KOLOM KANAN: DETAIL KONTEN --}}
            {{-- ======================== --}}
            <div class="lg:col-span-3">

                @if($infoDetail)
                    <div class="overflow-hidden border-t-4 shadow-2xl bg-white/95 backdrop-blur-sm rounded-2xl border-amber-500">
                        <div class="p-8 md:p-10">

                            <h2 class="pb-4 mb-6 text-3xl font-extrabold leading-tight text-gray-900 border-b border-gray-100">
                                {{ $infoDetail->judul }}
                            </h2>

                            <div class="mb-8 space-y-4 leading-relaxed prose prose-lg text-justify text-gray-700 max-w-none">
                                {!! $infoDetail->deskripsi !!}
                            </div>

                            @if($infoDetail->file_upload)
                                <div class="pt-8 border-t border-gray-100">
                                    <h3 class="flex items-center gap-2 mb-4 text-lg font-bold text-gray-800">
                                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        Dokumen Terkait
                                    </h3>
                                    <a href="{{ asset('storage/' . $infoDetail->file_upload) }}"
                                       target="_blank"
                                       class="inline-flex items-center px-6 py-3 font-bold text-white transition-all bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg hover:from-blue-700 hover:to-blue-800 hover:shadow-blue-500/30 transform hover:-translate-y-0.5">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Download Dokumen
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                @else
                    {{-- STATE KOSONG --}}
                    <div class="p-16 text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                        <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Silakan Pilih Informasi</h3>
                        <p class="mt-2 text-lg text-gray-600">Pilih salah satu item dari daftar di samping untuk melihat detailnya.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

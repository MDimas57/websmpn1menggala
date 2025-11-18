@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Struktur Sekolah
                </h1>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-10 lg:grid-cols-4">

            {{-- ======================== --}}
            {{-- KOLOM KIRI: SIDEBAR NAV --}}
            {{-- ======================== --}}
            <div class="lg:col-span-1">
                <div class="overflow-hidden bg-white shadow-xl rounded-2xl border border-gray-100">
                    <div class="p-6">
                        <h3 class="mb-4 text-2xl font-extrabold text-gray-900 border-b pb-2 border-yellow-500 flex items-center gap-2">
                             <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                            Daftar Informasi
                        </h3>

                        <nav class="flex flex-col space-y-2 mt-4">
                            @forelse($semuaInformasi as $infoLink)
                                <a href="{{ route('informasi.show', $infoLink->id) }}"
                                   class="block px-4 py-3 rounded-lg font-semibold transition-all duration-200
                                   @if(isset($infoDetail) && $infoDetail->id == $infoLink->id)
                                        bg-blue-800 text-white shadow-lg hover:bg-blue-900
                                   @else
                                        text-gray-700 hover:bg-yellow-50 hover:text-blue-800
                                   @endif
                                    ">
                                    {{ $infoLink->judul }}
                                </a>
                            @empty
                                <p class="text-sm text-gray-500">Belum ada informasi.</p>
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
                    <div class="overflow-hidden bg-white shadow-xl rounded-2xl border-t-4 border-yellow-500">
                        <div class="p-6 md:p-10">

                            <h2 class="mb-6 text-3xl font-extrabold text-blue-800 border-b pb-3 border-gray-100">
                                {{ $infoDetail->judul }}
                            </h2>

                            <div class="mb-8 prose prose-lg max-w-none text-justify space-y-4 text-gray-700">
                                {!! $infoDetail->deskripsi !!}
                            </div>

                            @if($infoDetail->file_upload)
                                <h3 class="text-xl font-bold text-gray-800 mb-4 pt-4 border-t">Dokumen Terkait</h3>
                                <a href="{{ asset('storage/' . $infoDetail->file_upload) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-6 py-3 font-bold text-white transition-colors bg-blue-800 rounded-lg shadow-md hover:bg-blue-900 transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download Dokumen
                                </a>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 mb-4">
                            <svg class="w-8 h-8 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Silakan Pilih Informasi</h3>
                        <p class="mt-2 text-gray-500">Pilih salah satu item dari daftar di samping untuk melihat detailnya.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-7xl px-4">

        <div class="mb-10 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    {{ $judul ?? 'Bidang Sekolah' }}
                </h1>
            </div>
        </div>

        @if($data)
            <div class="flex flex-col md:flex-row gap-8 bg-white shadow-xl rounded-2xl p-8 md:p-10 border border-gray-100">

                <div class="md:w-1/3 flex-shrink-0 text-center">

                    {{-- Bagian FOTO yang disesuaikan --}}
                    <div class="bg-gradient-to-br from-yellow-500 to-blue-500 rounded-tl-3xl rounded-br-3xl p-5 mb-6 shadow-xl relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 opacity-20 transform -rotate-3 skew-y-3 scale-150 pointer-events-none"></div>
                        @if($data->foto)
                            <img src="{{ asset('storage/' . $data->foto) }}"
                                 alt="{{ $data->nama }}"
                                 class="w-full h-auto rounded-lg shadow-lg border-4 border-white object-cover object-top relative z-10">
                        @else
                            <img src="https://placehold.co/400x400/eeeeee/cccccc?text=Foto"
                                 alt="{{ $data->nama }}"
                                 class="w-full h-auto rounded-lg shadow-lg border-4 border-white relative z-10">
                        @endif
                    </div>

                    <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">{{ $data->nama }}</h2>
                    <p class="text-md font-semibold text-yellow-600 mt-1">
                        <span class="inline-block px-3 py-0.5 bg-yellow-100 rounded-full text-sm">
                            {{ $data->jabatan }}
                        </span>
                    </p>

                    <div class="w-18 h-2 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mx-auto mt-4"></div>

                </div>

                <div class="md:w-2/3">

                    <div class="prose prose-lg max-w-none mb-8 text-gray-600 leading-relaxed text-justify space-y-4">
                        {!! $data->deskripsi !!}
                    </div>

                    @if($data->file_upload)
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pt-6 border-t border-gray-100 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Dokumen Terkait
                        </h3>

                        <a href="{{ asset('storage/' . $data->file_upload) }}"
                            target="_blank"
                            class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:bg-blue-800 transition-colors transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download Dokumen
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Data Bidang Belum Tersedia</h3>
                <p class="mt-2 text-gray-500">Silakan tambahkan data Koordinator dan deskripsi melalui panel admin.</p>
            </div>
        @endif

    </div>
</div>
@endsection

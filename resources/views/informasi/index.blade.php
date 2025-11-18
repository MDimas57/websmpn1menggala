@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-10 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Struktur Sekolah
                </h1>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">

            <div class="space-y-6 lg:col-span-1">
                <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                    <div class="p-6">
                        <h3 class="mb-4 text-2xl font-bold text-gray-800">Daftar Informasi</h3>

                        <nav class="flex flex-col space-y-2">
                            @forelse($semuaInformasi as $infoLink)
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
                                <p class="text-sm text-gray-500">Belum ada informasi.</p>
                            @endforelse
                        </nav>
                    </div>
                </div>
            </div> <div class="space-y-6 lg:col-span-3">

                @if($infoDetail)
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="p-6 md:p-8">

                            <h2 class="mb-4 text-3xl font-bold text-gray-800">
                                {{ $infoDetail->judul }}
                            </h2>

                            <div class="mb-6 prose max-w-none">
                                {!! $infoDetail->deskripsi !!}
                            </div>

                            @if($infoDetail->file_upload)
                                <a href="{{ asset('storage/' . $infoDetail->file_upload) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-4 py-2 font-semibold text-white transition-colors bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download
                                </a>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="p-8 text-center bg-white shadow-lg rounded-xl">
                        <p class="text-gray-500">Belum ada informasi untuk ditampilkan.</p>
                        <p class="mt-2 text-sm text-gray-400">Silakan tambahkan data melalui admin panel.</p>
                    </div>
                @endif

            </div> </div> </div>
</div>
@endsection

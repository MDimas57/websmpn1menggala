@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-50"> <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Struktur Sekolah
                </h1>
            </div>
        </div>

        @if($struktur && $struktur->count() > 0)
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2">

                @foreach($struktur as $item)
                    <div class="overflow-hidden bg-white shadow-xl rounded-2xl border border-gray-100 transition-transform hover:-translate-y-1 duration-300 group">

                        <div class="h-2 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                        <div class="p-8">
                            <h2 class="mb-6 text-2xl font-extrabold text-center text-gray-900 group-hover:text-blue-700 transition-colors">
                                {{ $item->judul }}
                            </h2>

                            <div class="w-16 h-1 bg-yellow-400 rounded-full mx-auto mb-8"></div>

                            <div class="overflow-hidden shadow-lg rounded-xl border-4 border-white bg-gray-100 relative">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors z-10 pointer-events-none"></div>
                                <img src="{{ asset('storage/'. $item->foto) }}"
                                     alt="{{ $item->judul }}"
                                     class="w-full h-auto transition-transform duration-500 ease-in-out group-hover:scale-105">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Data Belum Tersedia</h3>
                <p class="mt-2 text-gray-500">Struktur organisasi sekolah belum ditambahkan.</p>
            </div>
        @endif

    </div>
</div>
@endsection

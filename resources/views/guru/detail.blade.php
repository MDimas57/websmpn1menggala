@extends('layouts.app')

@section('content')

<div class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-5xl px-4">

        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-bold text-gray-600 hover:text-blue-600 hover:border-blue-200 hover:bg-blue-50 transition-all shadow-sm">
                <svg class="w-4 h-4 mr-2 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="mb-8 overflow-hidden bg-white shadow-lg rounded-xl">
            <div class="p-6 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                <h1 class="text-2xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    Profil Tenaga Pendidik
                </h1>
            </div>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden md:flex border border-gray-100">

            <div class="md:w-1/3 bg-gray-100 relative group">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 z-10"></div>

                @if($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}"
                         alt="{{ $guru->nama_lengkap }}"
                         class="w-full h-full object-cover object-top min-h-[350px] transition-transform duration-500 group-hover:scale-105">
                @else
                     <div class="w-full h-full min-h-[350px] flex items-center justify-center bg-gray-200 text-gray-400">
                        <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                     </div>
                @endif
            </div>

            <div class="md:w-2/3 p-8 md:p-10">

                <div class="mb-8 border-b border-gray-100 pb-6">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-2">
                        {{ $guru->nama_lengkap }}
                    </h1>
                    <span class="inline-block px-3 py-1 text-sm font-bold text-white bg-blue-600 rounded-full shadow-sm">
                        {{ $guru->jenis_gtk }}
                    </span>
                </div>

                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">

                    <div class="flex flex-col p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <dt class="flex items-center text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884-.5 2-2 2h4c-1.5 0-2-1.116-2-2z"></path></svg>
                            NIK
                        </dt>
                        <dd class="text-lg font-semibold text-gray-900 pl-6">
                            {{ $guru->nik ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <dt class="flex items-center text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Jenis Kelamin
                        </dt>
                        <dd class="text-lg font-semibold text-gray-900 pl-6">
                            {{ $guru->jenis_kelamin ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <dt class="flex items-center text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Tempat Lahir
                        </dt>
                        <dd class="text-lg font-semibold text-gray-900 pl-6">
                            {{ $guru->tempat_lahir ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <dt class="flex items-center text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Tanggal Lahir
                        </dt>
                        <dd class="text-lg font-semibold text-gray-900 pl-6">
                            {{ $guru->tanggal_lahir ? $guru->tanggal_lahir->format('d F Y') : '-' }}
                        </dd>
                    </div>

                </dl>
            </div>

        </div>
    </div>
</div>
@endsection

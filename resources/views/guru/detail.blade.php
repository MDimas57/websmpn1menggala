@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto max-w-5xl px-4">
        
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-gray-600 hover:text-green-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden md:flex">
            
            <div class="md:w-1/3">
                <img src="{{ asset('storage/' . $guru->foto) }}" 
                     alt="{{ $guru->nama_lengkap }}" 
                     class="w-full h-full object-cover object-top min-h-[300px]">
            </div>

            <div class="md:w-2/3 p-8">
                
                <h1 class="text-3xl font-bold text-gray-900">{{ $guru->nama_lengkap }}</h1>
                <p class="text-lg text-green-600 font-semibold mt-1">{{ $guru->jenis_gtk }}</p>

                <hr class="my-6">

                <dl class="space-y-4">
                    
                    {{-- 1. Mengganti 'nip' menjadi 'nik' --}}
                    <div class="flex flex-col sm:flex-row">
                        <dt class="w-full sm:w-1/3 text-gray-500 font-semibold">NIK</dt>
                        <dd class="w-full sm:w-2/3 text-gray-800">{{ $guru->nik ?? '-' }}</dd>
                    </div>
                    
                    {{-- 2. Mengganti 'Mata Pelajaran' menjadi 'Jenis Kelamin' --}}
                    <div class="flex flex-col sm:flex-row">
                        <dt class="w-full sm:w-1/3 text-gray-500 font-semibold">Jenis Kelamin</dt>
                        <dd class="w-full sm:w-2/3 text-gray-800">{{ $guru->jenis_kelamin ?? '-' }}</dd>
                    </div>

                    {{-- 3. Mengganti 'Status' menjadi 'Tempat Lahir' --}}
                    <div class="flex flex-col sm:flex-row">
                        <dt class="w-full sm:w-1/3 text-gray-500 font-semibold">Tempat Lahir</dt>
                        <dd class="w-full sm:w-2/3 text-gray-800">{{ $guru->tempat_lahir ?? '-' }}</dd>
                    </div>

                    {{-- 4. Mengganti 'Pendidikan' menjadi 'Tanggal Lahir' dan memformatnya --}}
                    <div class="flex flex-col sm:flex-row">
                        <dt class="w-full sm:w-1/3 text-gray-500 font-semibold">Tanggal Lahir</dt>
                        <dd class="w-full sm:w-2/3 text-gray-800">
                            {{-- 
                              Ini berfungsi karena kita menambah $casts di Model.
                              'd F Y' akan menghasilkan format seperti '18 November 2025'
                            --}}
                            {{ $guru->tanggal_lahir ? $guru->tanggal_lahir->format('d F Y') : '-' }}
                        </dd>
                    </div>
                    
                </dl>
            </div>

        </div>
    </div>
</div>
@endsection 
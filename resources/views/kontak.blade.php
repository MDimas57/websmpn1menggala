@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">

        <div class="mb-12 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
            <div class="p-8 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500 relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                <h1 class="text-3xl font-extrabold text-center text-white relative z-10 tracking-tight" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    HUBUNGI KAMI
                </h1>
            </div>
        </div>

        {{-- Kita gunakan grid untuk membagi 2 kolom --}}
        <div class="grid grid-cols-1 gap-12 md:grid-cols-3">

            {{-- KOLOM KIRI: FORMULIR (2/3 lebar) --}}
            <div class="p-10 bg-white shadow-xl md:col-span-2 rounded-2xl border border-gray-100">
                <h2 class="mb-8 text-3xl font-extrabold text-gray-900 border-b pb-4 border-yellow-500 tracking-tight">
                    Kirim Pesan
                </h2>

                {{-- ▼▼▼ MENAMPILKAN PESAN SUKSES ▼▼▼ --}}
                @if(session('success'))
                    <div class="mb-6 p-4 text-white bg-green-500 border border-green-300 rounded-lg shadow-md font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kontak.store') }}" method="POST" class="space-y-6">
                    @csrf {{-- Penting untuk keamanan Laravel --}}

                    {{-- Baris 1: Nama, Email, No. Ponsel --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-700 focus:ring-blue-700 transition duration-150">
                            @error('nama')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-700 focus:ring-blue-700 transition duration-150">
                             @error('email')
                                 <span class="text-sm text-red-600">{{ $message }}</span>
                             @enderror
                        </div>
                        <div>
                            <label for="no_telepon" class="block text-sm font-medium text-gray-700">Nomor Ponsel</label>
                            <input type="tel" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-700 focus:ring-blue-700 transition duration-150">
                             @error('no_telepon')
                                 <span class="text-sm text-red-600">{{ $message }}</span>
                             @enderror
                        </div>
                    </div>

                    {{-- Baris 2: Pesan --}}
                    <div>
                        <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan atau Saran</label>
                        <textarea name="pesan" id="pesan" rows="5" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-700 focus:ring-blue-700 transition duration-150">{{ old('pesan') }}</textarea>
                         @error('pesan')
                             <span class="text-sm text-red-600">{{ $message }}</span>
                         @enderror
                    </div>

                    {{-- Baris 3: Tombol Submit (Kuning Emas) --}}
                    <div>
                        <button type="submit" class="inline-flex justify-center px-8 py-3 text-base font-extrabold text-yellow-900 bg-yellow-400 border border-transparent rounded-lg shadow-lg hover:bg-yellow-500 transition-colors transform hover:scale-[1.02] focus:ring-4 focus:ring-yellow-500/50">
                            KIRIM PESAN SEKARANG
                        </button>
                    </div>
                </form>
            </div>

            {{-- KOLOM KANAN: INFO KONTAK (1/3 lebar) --}}
            <div class="md:col-span-1">
                <div class="h-full p-8 text-white bg-blue-700 shadow-xl rounded-2xl">
                    <h2 class="mb-6 text-2xl font-extrabold border-b border-yellow-400 pb-3 tracking-tight">Detail Kontak</h2>
                    <div class="space-y-6">
                        @php
                            // Menggunakan array untuk informasi kontak
                            $contacts = [
                                ['title' => 'Nomor Telepon', 'detail' => '0726-75157187', 'icon' => '<svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.717 21 3 14.283 3 6V5z"></path></svg>'],
                                ['title' => 'Alamat Email', 'detail' => 'smpnegeri1menggala.com', 'icon' => '<svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'],
                                ['title' => 'Website URL', 'detail' => 'smpn1menggala.mysch.id', 'icon' => '<svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>'],
                                ['title' => 'Alamat Kami', 'detail' => 'Jl. Suay Umpu No. 308 Menggala Kota, Kabupaten Tulang Bawang, Lampung, 34596', 'icon' => '<svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>'],
                            ];
                        @endphp

                        @foreach($contacts as $contact)
                            <div class="flex items-start gap-3 pt-4 border-t border-blue-600">
                                {!! $contact['icon'] !!}
                                <div>
                                    <h3 class="text-sm font-extrabold uppercase text-yellow-400 tracking-wider">{{ $contact['title'] }}</h3>
                                    <p class="text-gray-100 mt-0.5 text-sm">{{ $contact['detail'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div> {{-- <-- Penutup 'grid' --}}

        {{-- =============================================== --}}
        {{-- ▼▼▼ BAGIAN GOOGLE MAPS ▼▼▼ --}}
        {{-- =============================================== --}}
        <div class="mt-12">
            <h2 class="mb-6 text-3xl font-extrabold text-gray-800 text-center tracking-tight">
                Lokasi Kami
            </h2>

            {{-- Iframe Map --}}
            <div class="p-4 overflow-hidden bg-white shadow-xl rounded-2xl border border-gray-100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.7077199639393!2d105.25620707473738!3d-4.465332695508955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3f3a36ee34f707%3A0x133ba7fbdd782e3a!2sState%20Junior%20High%20School%201%20Menggala!5e0!3m2!1sen!2sid!4v1763131663224!5m2!1sen!2sid"
                    class="w-full rounded-lg h-96 border-4 border-blue-700"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        {{-- =============================================== --}}
        {{-- ▲▲▲ AKHIR BAGIAN GOOGLE MAPS ▲▲▲ --}}
        {{-- =============================================== --}}

    </div>
</div>
@endsection

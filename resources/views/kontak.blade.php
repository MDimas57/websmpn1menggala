{{-- 1. Gunakan layout utama (header & footer otomatis) --}}
@extends('layouts.app')

{{-- 2. Masukkan konten ini ke @yield('content') --}}
@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl px-4">
        
        {{-- Kita gunakan grid untuk membagi 2 kolom --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            {{-- KOLOM KIRI: FORMULIR (2/3 lebar) --}}
            <div class="md:col-span-2 bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
                
                {{-- 
                  CATATAN: 
                  Saat ini 'action' form masih kosong (#). 
                  Nanti kita perlu membuat Rute 'POST' untuk memproses data ini.
                --}}
                <form action="#" method="POST" class="space-y-6">
                    @csrf {{-- Penting untuk keamanan Laravel --}}
                    
                    {{-- Baris 1: Nama, Email, No. Ponsel --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        </div>
                        <div>
                            <label for="nomor_ponsel" class="block text-sm font-medium text-gray-700">Nomor Ponsel</label>
                            <input type="tel" name="nomor_ponsel" id="nomor_ponsel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        </div>
                    </div>

                    {{-- Baris 2: Pesan --}}
                    <div>
                        <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan atau Saran</label>
                        <textarea name="pesan" id="pesan" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"></textarea>
                    </div>

                    {{-- Baris 3: Tombol --}}
                    <div>
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-700 py-3 px-6 text-base font-medium text-white shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            KIRIM PESAN SEKARANG
                        </button>
                    </div>
                </form>
            </div>

            {{-- KOLOM KANAN: INFO KONTAK (1/3 lebar) --}}
            <div class="md:col-span-1">
                <div class="bg-red-800 text-white p-8 rounded-xl shadow-lg h-full">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold uppercase">Nomor Telpon</h3>
                            <p class="text-gray-200">0726-75157187</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold uppercase">Alamat Email</h3>
                            <p class="text-gray-200">smpnegeri1menggala.com</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold uppercase">Alamat Kami</h3>
                            <p class="text-gray-200">Jl. Suay Umpu No. 308  Menggala Kota, Kabupaten Tulang Bawang, Lampung, 34596</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold uppercase">Website URL</h3>
                            <p class="text-gray-200">smpn1menggala.mysch.id</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
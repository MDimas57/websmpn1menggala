{{-- 1. Gunakan layout utama (header & footer otomatis) --}}
@extends('layouts.app')

{{-- 2. Masukkan konten ini ke @yield('content') --}}
@section('content')
<div class="py-12 bg-gray-100">
    <div class="container px-4 mx-auto max-w-7xl">

        {{-- Kita gunakan grid untuk membagi 2 kolom --}}
        <div class="grid grid-cols-1 gap-12 md:grid-cols-3">

            {{-- KOLOM KIRI: FORMULIR (2/3 lebar) --}}
            <div class="p-8 bg-white shadow-lg md:col-span-2 rounded-xl">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">Kirim Pesan</h2>

                {{--
                  CATATAN:
                  Saat ini 'action' form masih kosong (#).
                  Nanti kita perlu membuat Rute 'POST' untuk memproses data ini.
                --}}
                <form action="#" method="POST" class="space-y-6">
                    @csrf {{-- Penting untuk keamanan Laravel --}}

                    {{-- Baris 1: Nama, Email, No. Ponsel --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                            <input type="email" name="email" id="email" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        </div>
                        <div>
                            <label for="nomor_ponsel" class="block text-sm font-medium text-gray-700">Nomor Ponsel</label>
                            <input type="tel" name="nomor_ponsel" id="nomor_ponsel" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        </div>
                    </div>

                    {{-- Baris 2: Pesan --}}
                    <div>
                        <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan atau Saran</label>
                        <textarea name="pesan" id="pesan" rows="5" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"></textarea>
                    </div>

                    {{-- Baris 3: Tombol --}}
                    <div>
                        <button type="submit" class="inline-flex justify-center px-6 py-3 text-base font-medium text-white bg-red-700 border border-transparent rounded-md shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            KIRIM PESAN SEKARANG
                        </button>
                    </div>
                </form>
            </div>

            {{-- KOLOM KANAN: INFO KONTAK (1/3 lebar) --}}
            <div class="md:col-span-1">
                <div class="h-full p-8 text-white bg-red-800 shadow-lg rounded-xl">
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

        </div> {{-- <-- Penutup 'grid' --}}

        {{-- =============================================== --}}
        {{-- ▼▼▼ BAGIAN GOOGLE MAPS (SESUAI LINK BARU) ▼▼▼ --}}
        {{-- =============================================== --}}
        <div class="mt-12">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">
                Lokasi Kami
            </h2>

            {{-- Kita bungkus iframe dalam div agar bisa di-style (rounded, shadow) --}}
            <div class="p-4 overflow-hidden bg-white shadow-lg rounded-xl">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.7077199639393!2d105.25620707473738!3d-4.465332695508955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3f3a36ee34f707%3A0x133ba7fbdd782e3a!2sState%20Junior%20High%20School%201%20Menggala!5e0!3m2!1sen!2sid!4v1763131663224!5m2!1sen!2sid"
                    class="w-full rounded-md h-96" {{-- h-96 adalah sekitar 384px --}}
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

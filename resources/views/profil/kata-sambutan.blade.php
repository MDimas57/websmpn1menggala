@extends('layouts.app')

@section('content')

{{--
    PERBAIKAN STRUKTUR:
    1. 'flex items-center' DIHAPUS agar konten panjang bisa di-scroll dengan normal dan tidak terpotong.
    2. '-mb-20' tetap ada untuk menarik footer agar menempel (menghilangkan celah putih).
    3. Warna background disesuaikan dengan kode Anda (Orange-Yellow).
       *Catatan: Jika 'orange-350' tidak muncul warnanya, ganti ke 'orange-400'.
--}}
<div class="relative w-full min-h-screen -mb-20 overflow-hidden bg-gradient-to-br from-orange-200 to-yellow-200">

    {{-- Elemen Dekorasi Background --}}
    <div class="absolute top-0 left-0 z-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute bg-blue-500 rounded-full -top-24 -right-24 w-96 h-96 blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 bg-purple-500 rounded-full -left-24 w-72 h-72 blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    </div>

    {{--
        PERBAIKAN CONTAINER:
        padding-bottom diubah menjadi 'pb-32' (lebih besar) untuk memastikan
        teks paling bawah tidak tertutup oleh Footer yang ditarik ke atas.
    --}}
    <div class="container relative z-10 max-w-6xl px-4 py-16 pb-32 mx-auto">

        @if($sambutan)
            <div class="flex flex-col md:flex-row md:items-start md:gap-12">

                {{-- KARTU PROFIL KEPSEK --}}
                <div class="flex-shrink-0 w-full md:w-1/3">
                    <div class="overflow-hidden text-center bg-white shadow-2xl border border-white/20
                                rounded-t-2xl rounded-bl-2xl
                                [border-bottom-right-radius:3rem]
                                flex flex-col items-center justify-center p-8 md:p-10 relative group transition-transform hover:-translate-y-2 duration-300">

                        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                        <div class="relative mb-6">
                             <div class="absolute transition duration-500 rounded-full -inset-1 bg-gradient-to-br from-blue-500 to-cyan-400 blur opacity-30 group-hover:opacity-50"></div>
                            <img src="{{ $sambutan->foto ? asset('storage/' . $sambutan->foto) : 'https://placehold.co/200x200/eeeeee/cccccc?text=Foto' }}"
                                 alt="{{ $sambutan->nama_kepsek }}"
                                 class="relative object-cover w-48 h-48 mx-auto border-4 border-white rounded-full shadow-lg">
                        </div>

                        <h3 class="text-2xl font-extrabold tracking-tight text-gray-900">
                            {{ $sambutan->nama_kepsek }}
                        </h3>

                        <div class="w-12 h-1 mx-auto my-3 bg-yellow-400 rounded-full"></div>

                        <p class="text-sm font-bold tracking-tight text-gray-500 uppercase text-1xl">
                            {{ $sambutan->jabatan }}
                        </p>

                    </div>
                </div>

                {{-- KONTEN SAMBUTAN --}}
                <div class="w-full mt-10 md:w-2/3 md:mt-0">

                    {{-- Header Judul --}}
                    <div class="mb-12 overflow-hidden bg-white shadow-2xl rounded-xl">
                        <div class="relative p-6 overflow-hidden bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                            <h1 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
                                <svg class="w-8 h-8 text-yellow-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                Kata Sambutan
                            </h1>
                        </div>
                    </div>

                    {{-- Isi Teks --}}
                    <div class="p-8 border shadow-xl bg-white/95 backdrop-blur-sm rounded-2xl border-white/20">
                        <div class="space-y-4 leading-relaxed prose prose-lg text-justify text-gray-700 prose-blue max-w-none">
                            {!! $sambutan->kata_sambutan !!}
                        </div>

                        <div class="flex justify-end pt-6 mt-10 border-t border-gray-200">
                            <div class="text-right">
                                <p class="text-sm italic text-gray-500">Hormat Kami,</p>
                                <p class="mt-1 text-lg font-bold text-gray-900">{{ $sambutan->nama_kepsek }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="max-w-2xl p-16 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Sambutan Belum Tersedia</h3>
                <p class="mt-3 text-lg text-gray-600">Silakan tambahkan data kata sambutan melalui panel admin.</p>
            </div>
        @endif

    </div>
</div>
@endsection

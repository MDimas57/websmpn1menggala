@extends('layouts.app')

@section('content')
{{--
    PERBAIKAN:
    - Mengubah py-20 menjadi pt-36 pb-20 agar konten tidak tertutup header fixed.
    - Menambahkan min-h-screen agar footer tidak naik jika konten sedikit.
--}}
<div class="relative min-h-screen pb-20 overflow-hidden pt-36 bg-slate-50">

    {{-- Dekorasi Background (Blob Halus) --}}
    <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-yellow-100/50 to-transparent -z-10"></div>
    <div class="absolute bg-blue-100 rounded-full -top-24 -right-24 w-72 h-72 blur-3xl -z-10 opacity-60"></div>
    <div class="absolute bg-yellow-100 rounded-full top-1/2 -left-24 w-96 h-96 blur-3xl -z-10 opacity-60"></div>

    <div class="container px-4 mx-auto max-w-7xl">

        {{-- Header Section --}}
        <div class="max-w-3xl mx-auto mb-16 text-center">
            <span class="text-yellow-600 font-bold tracking-widest uppercase text-sm bg-yellow-50 px-4 py-1.5 rounded-full border border-yellow-200 shadow-sm">
                Hubungi Kami
            </span>
            <h1 class="mt-6 mb-4 text-4xl font-extrabold text-gray-900 md:text-5xl">
                Kami Siap <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-amber-600">Mendengar Anda</span>
            </h1>
            <p class="text-lg text-gray-600">
                Punya pertanyaan seputar PPDB, akademik, atau kegiatan sekolah? Jangan ragu untuk mengirimkan pesan kepada kami.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:gap-12">

            {{-- ========================== --}}
            {{-- KOLOM KIRI: FORMULIR (2/3) --}}
            {{-- ========================== --}}
            <div class="lg:col-span-2">
                <div class="relative p-8 overflow-hidden bg-white border border-gray-100 shadow-xl rounded-3xl md:p-10">

                    {{-- Hiasan Garis Atas --}}
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                    <h2 class="flex items-center gap-3 mb-6 text-2xl font-bold text-gray-800">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Formulir Pesan
                    </h2>

                    @if(session('success'))
                        <div class="flex items-center gap-3 p-4 mb-8 text-green-700 border border-green-200 bg-green-50 rounded-xl">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            {{-- Input Nama --}}
                            <div class="col-span-2 md:col-span-1">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                    <input type="text" name="nama" value="{{ old('nama') }}" required
                                           class="w-full py-3 pl-10 transition-all border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-yellow-500 focus:ring-yellow-500"
                                           placeholder="Masukkan nama Anda">
                                </div>
                                @error('nama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            {{-- Input Telepon --}}
                            <div class="col-span-2 md:col-span-1">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">Nomor Ponsel / WA</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.717 21 3 14.283 3 6V5z"/></svg>
                                    </div>
                                    <input type="tel" name="no_telepon" value="{{ old('no_telepon') }}"
                                           class="w-full py-3 pl-10 transition-all border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-yellow-500 focus:ring-yellow-500"
                                           placeholder="Contoh: 08123456789">
                                </div>
                                @error('no_telepon') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            {{-- Input Email --}}
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">Alamat Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                           class="w-full py-3 pl-10 transition-all border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-yellow-500 focus:ring-yellow-500"
                                           placeholder="nama@email.com">
                                </div>
                                @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            {{-- Input Pesan --}}
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">Pesan atau Pertanyaan</label>
                                <div class="relative">
                                    <textarea name="pesan" rows="5" required
                                              class="w-full p-4 transition-all border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-yellow-500 focus:ring-yellow-500"
                                              placeholder="Tuliskan pesan Anda di sini...">{{ old('pesan') }}</textarea>
                                </div>
                                @error('pesan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full inline-flex justify-center items-center gap-2 px-8 py-4 text-base font-bold text-yellow-900 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-xl shadow-lg hover:shadow-yellow-500/30 hover:scale-[1.01] active:scale-95 transition-all duration-200">
                                <span>KIRIM PESAN SEKARANG</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ========================== --}}
            {{-- KOLOM KANAN: INFO (1/3) --}}
            {{-- ========================== --}}
            <div class="lg:col-span-1">

                {{-- KARTU KONTAK (Tampilan Baru: Biru Navy Elegan) --}}
                <div class="relative h-full p-8 overflow-hidden text-white shadow-xl bg-gradient-to-br from-slate-800 to-blue-900 rounded-3xl">

                    {{-- Pattern Hiasan --}}
                    <div class="absolute top-0 right-0 w-40 h-40 -mt-10 -mr-10 bg-white rounded-full opacity-5 blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 -mb-10 -ml-10 bg-yellow-500 rounded-full opacity-10 blur-3xl"></div>

                    <h3 class="pb-4 mb-8 text-2xl font-extrabold border-b border-white/20">Kontak Sekolah</h3>

                    <div class="relative z-10 space-y-8">
                        {{-- Item 1: Telepon --}}
                        <div class="flex items-start gap-4 group">
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 transition-all duration-300 bg-white/10 rounded-xl group-hover:bg-yellow-500 group-hover:text-yellow-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.717 21 3 14.283 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold tracking-wider text-gray-300 uppercase">Telepon</p>
                                <p class="mt-1 text-lg font-bold">0726-75157187</p>
                            </div>
                        </div>

                        {{-- Item 2: Email --}}
                        <div class="flex items-start gap-4 group">
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 transition-all duration-300 bg-white/10 rounded-xl group-hover:bg-yellow-500 group-hover:text-yellow-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold tracking-wider text-gray-300 uppercase">Email</p>
                                <p class="mt-1 text-lg font-bold break-all">info@smpnegeri1menggala.com</p>
                            </div>
                        </div>

                        {{-- Item 3: Website --}}
                        <div class="flex items-start gap-4 group">
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 transition-all duration-300 bg-white/10 rounded-xl group-hover:bg-yellow-500 group-hover:text-yellow-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold tracking-wider text-gray-300 uppercase">Website</p>
                                <p class="mt-1 text-lg font-bold">smpn1menggala.mysch.id</p>
                            </div>
                        </div>

                        {{-- Item 4: Alamat --}}
                        <div class="flex items-start gap-4 group">
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 transition-all duration-300 bg-white/10 rounded-xl group-hover:bg-yellow-500 group-hover:text-yellow-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold tracking-wider text-gray-300 uppercase">Alamat</p>
                                <p class="mt-1 text-base font-medium leading-snug text-gray-200">Jl. Suay Umpu No. 308 Menggala Kota, Kab. Tulang Bawang, Lampung, 34596</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- =============================================== --}}
        {{-- BAGIAN GOOGLE MAPS (Full Width & Modern)        --}}
        {{-- =============================================== --}}
        <div class="mt-16">
            <div class="p-4 bg-white border border-gray-100 shadow-xl rounded-3xl">
                 <h2 class="mb-4 text-2xl font-bold text-center text-gray-800">Lokasi Sekolah Kami</h2>
                 <div  class="w-32 h-2 mx-auto mb-8 rounded-full shadow-md bg-gradient-to-r from-yellow-400 to-amber-500"></div>
                <div class="relative overflow-hidden rounded-2xl h-96">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.7077199639393!2d105.25620707473738!3d-4.465332695508955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3f3a36ee34f707%3A0x133ba7fbdd782e3a!2sState%20Junior%20High%20School%201%20Menggala!5e0!3m2!1sen!2sid!4v1763131663224!5m2!1sen!2sid"
                        class="w-full h-full"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

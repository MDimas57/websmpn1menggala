@extends('layouts.app')

@section('content')

{{--
    BACKGROUND UTAMA:
    - Menggunakan gradasi 'from-orange-200 to-yellow-200' (Konsisten).
    - 'min-h-screen' dan '-mb-20' untuk perbaikan layout footer.
--}}
<div class="relative w-full min-h-screen -mb-20 overflow-hidden bg-gradient-to-br from-orange-200 to-yellow-200">

    {{-- Elemen Dekorasi Background --}}
    <div class="absolute top-0 left-0 z-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute bg-blue-500 rounded-full -top-24 -right-24 w-96 h-96 blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 bg-purple-500 rounded-full -left-24 w-72 h-72 blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    </div>

    {{-- CONTAINER UTAMA --}}
    <div class="container relative z-10 px-4 py-16 pb-40 mx-auto max-w-7xl">

        {{-- HEADER JUDUL --}}
        <div class="mb-12 overflow-hidden bg-white shadow-2xl rounded-xl">
            <div class="relative p-8 overflow-hidden bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
                {{-- Pattern Overlay --}}
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                <h1 class="relative z-10 flex items-center justify-center gap-3 text-3xl font-bold text-center text-white" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                    <svg class="w-8 h-8 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    Informasi PPDB
                </h1>
            </div>
        </div>

        {{-- WADAH POSTINGAN --}}
        <div class="space-y-10">

            @forelse ($informasiItems as $item)

                {{-- KARTU ARTIKEL --}}
                <article class="overflow-hidden transition-all duration-300 border-t-4 shadow-xl bg-white/95 backdrop-blur-sm rounded-2xl border-amber-500 hover:shadow-2xl hover:shadow-orange-500/10">

                    <div class="p-8">
                        <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-3">

                            {{-- KOLOM KIRI (VISUAL) --}}
                            <div class="md:col-span-1">
                                {{-- Background Foto dengan Gradasi --}}
                                <div class="p-3 transition-transform duration-300 shadow-lg rounded-2xl bg-gradient-to-br from-yellow-400 to-amber-600 rotate-1 hover:rotate-0">
                                    <div class="overflow-hidden bg-white border-2 rounded-xl border-white/50">
                                        @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}"
                                                 alt="{{ $item->judul }}"
                                                 class="object-cover w-full h-48">
                                        @else
                                            <div class="flex items-center justify-center w-full h-48 bg-gray-50">
                                                <div class="text-center text-gray-400">
                                                    <svg class="w-12 h-12 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5.5V18a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v2.5"></path></svg>
                                                    <span class="text-sm font-medium">Tidak ada gambar</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-6 text-center md:text-left">
                                    <h3 class="text-xl font-extrabold leading-snug tracking-tight text-gray-900">
                                        {{ $item->judul }}
                                    </h3>
                                    <div class="w-24 h-1.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-full mt-3 md:mx-0 mx-auto"></div>
                                </div>
                            </div>

                            {{-- KOLOM KANAN (KONTEN) --}}
                            <div class="md:col-span-2">
                                <div class="flex items-center inline-block gap-2 px-4 py-2 mb-4 text-sm font-bold border rounded-lg text-amber-700 bg-amber-50 border-amber-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Diposting: {{ $item->created_at->format('d F Y') }}</span>
                                </div>

                                <div class="leading-relaxed prose prose-lg text-justify text-gray-700 max-w-none">
                                    {!! $item->deskripsi !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </article>

            @empty
                {{-- STATE KOSONG --}}
                <div class="max-w-2xl p-16 mx-auto text-center border shadow-2xl bg-white/90 backdrop-blur rounded-2xl border-white/20">
                    <div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-full shadow-inner bg-blue-50">
                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Informasi PPDB Belum Tersedia</h3>
                    <p class="mt-3 text-lg text-gray-600">Belum ada informasi penerimaan peserta didik baru yang diunggah saat ini.</p>
                </div>
            @endforelse

        </div>

    </div>
</div>
@endsection

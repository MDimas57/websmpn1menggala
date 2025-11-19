@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="container max-w-6xl px-4 mx-auto">

        @if($sambutan)
            <div class="flex flex-col md:flex-row md:items-start md:gap-12">

                <div class="flex-shrink-0 w-full md:w-1/3">
                    <div class="overflow-hidden text-center bg-white shadow-xl border border-gray-100
                                rounded-t-2xl rounded-bl-2xl
                                [border-bottom-right-radius:3rem]
                                flex flex-col items-center justify-center p-8 md:p-10 relative group transition-transform hover:-translate-y-1 duration-300">

                        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-yellow-400 to-amber-500"></div>

                        <div class="relative mb-6">
                             <div class="absolute -inset-1 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-full blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                            <img src="{{ $sambutan->foto ? asset('storage/' . $sambutan->foto) : 'https://placehold.co/200x200/eeeeee/cccccc?text=Foto' }}"
                                 alt="{{ $sambutan->nama_kepsek }}"
                                 class="relative object-cover w-48 h-48 mx-auto border-4 border-white rounded-full shadow-lg">
                        </div>

                        <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight">
                            {{ $sambutan->nama_kepsek }}
                        </h3>

                        <div class="w-12 h-1 bg-yellow-400 rounded-full my-3 mx-auto"></div>

                        <p class="text-1xl font-extra text-gray-900 tracking-tight">
                            {{ $sambutan->jabatan }}
                        </p>

                    </div>
                </div>

                <div class="w-full mt-10 md:w-2/3 md:mt-0">

                    <div class="mb-8 overflow-hidden bg-white shadow-lg rounded-xl border border-gray-100">
                        <div class="p-6 bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500 relative overflow-hidden">
                            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

                            <h1 class="text-3xl font-bold text-center text-white relative z-10" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
                                Kata Sambutan
                            </h1>
                        </div>
                    </div>

                    <div class="p-8 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="space-y-4 prose prose-lg prose-blue text-justify max-w-none text-gray-600 leading-relaxed">
                            {!! $sambutan->kata_sambutan !!}
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                            <div class="text-right">
                                <p class="text-sm text-gray-400 italic">Hormat Kami,</p>
                                <p class="text-lg font-bold text-gray-800 mt-1">{{ $sambutan->nama_kepsek }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="p-16 text-center bg-white shadow-lg rounded-2xl border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Sambutan Belum Tersedia</h3>
                <p class="mt-2 text-gray-500">Silakan tambahkan data kata sambutan melalui panel admin.</p>
            </div>
        @endif

    </div>
</div>
@endsection

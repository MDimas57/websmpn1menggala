@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-4xl px-4 bg-white shadow-lg rounded-xl p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Profil Sekolah
        </h1>
        
        @if($profil)
            {{-- Kita gunakan {!! ... !!} untuk merender HTML dari rich text editor --}}
            <div class="prose max-w-none">
                 {!! $profil->deskripsi_profil_sekolah !!}
            </div>
        @else
            <p class="text-center text-gray-500">Profil sekolah belum tersedia.</p>
        @endif
    </div>
</div>
@endsection
<div class="p-6 space-y-6">

    {{-- Foto --}}
    @if ($record->foto)
        <img src="{{ asset('storage/' . $record->foto) }}"
             class="rounded-xl w-full max-w-lg mx-auto object-cover">
    @endif

    {{-- Nama --}}
    <h2 class="text-2xl font-bold text-center text-white">
        {{ $record->nama_kepsek }} ({{ $record->jabatan }})
    </h2>

    {{-- Isi Kata Sambutan --}}
    <div class="prose prose-invert max-w-none text-white mx-auto">
        {!! $record->kata_sambutan !!}
    </div>

</div>

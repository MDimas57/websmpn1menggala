<div class="space-y-4">
    <div class="flex justify-center">
        <img src="{{ asset('storage/' . $record->foto) }}" 
             alt="{{ $record->judul }}" 
             class="rounded-lg shadow max-h-[400px]">
    </div>

    <h2 class="text-xl font-semibold text-center">{{ $record->judul }}</h2>

    <div class="prose max-w-none">
        {!! $record->deskripsi !!}
    </div>
</div>

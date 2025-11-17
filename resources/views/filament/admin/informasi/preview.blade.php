<div class="space-y-4">
    <h2 class="text-2xl font-bold">{{ $record->judul }}</h2>

    <div class="prose">
        {!! $record->deskripsi !!}
    </div>

    @if ($record->file_upload)
        <div class="mt-4">
            <a href="{{ asset('storage/' . $record->file_upload) }}"
               target="_blank"
               class="px-4 py-2 bg-blue-600 text-white rounded">
                Lihat File PDF
            </a>
        </div>
    @endif
</div>

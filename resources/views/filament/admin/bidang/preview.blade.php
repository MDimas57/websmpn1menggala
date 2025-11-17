<div class="space-y-3">
    <div class="flex items-center gap-4">
        <img src="{{ asset('storage/' . $record->foto) }}" class="w-32 rounded-lg" alt="">
        <div>
            <h2 class="text-xl font-bold">{{ $record->nama }}</h2>
            <p class="text-gray-600">{{ $record->jabatan }}</p>
        </div>
    </div>

    <hr>

    <h3 class="font-bold">Deskripsi</h3>
    <div>{!! $record->deskripsi !!}</div>

    @if ($record->file_upload)
        <hr>
        <a href="{{ asset('storage/' . $record->file_upload) }}" target="_blank" class="text-blue-600 underline">
            Download File
        </a>
    @endif
</div>

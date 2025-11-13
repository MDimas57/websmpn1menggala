<div class="p-4 space-y-3">
    <img src="{{ asset('storage/' . $record->foto) }}" class="rounded-lg w-32 h-32 object-cover" alt="">
    <h3 class="text-lg font-bold">{{ $record->nama_kepsek }} ({{ $record->jabatan }})</h3>
    <p class="text-gray-700 leading-relaxed">{{ $record->kata_sambutan }}</p>
</div>

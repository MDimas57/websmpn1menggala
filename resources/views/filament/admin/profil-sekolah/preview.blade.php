<div class="p-6 space-y-6">

    {{-- Logo Sekolah --}}
    <div class="flex justify-center">
        <img 
            src="{{ asset('storage/' . $record->logo) }}" 
            alt="Logo Sekolah"
            class="w-40 h-40 object-contain rounded-lg shadow"
        >
    </div>

    {{-- Nama Sekolah --}}
    <h2 class="text-2xl font-bold text-center">
        {{ $record->nama_sekolah }}
    </h2>

  <div class="p-4 bg-gray-100 rounded-lg">
    <p class="text-sm text-gray-600">Akreditasi</p>
    <p class="font-semibold text-lg text-gray-800 dark:text-gray-800">
        {{ $record->akreditasi }}
    </p>
</div>

<div class="p-4 bg-gray-100 rounded-lg">
    <p class="text-sm text-gray-600">Jumlah Rombel</p>
    <p class="font-semibold text-lg text-gray-800 dark:text-gray-800">
        {{ $record->jumlah_rombel }}
    </p>
</div>

<div class="p-4 bg-gray-100 rounded-lg">
    <p class="text-sm text-gray-600">Tenaga Pendidik</p>
    <p class="font-semibold text-lg text-gray-800 dark:text-gray-800">
        {{ $record->jumlah_tenaga_pendidik }}
    </p>
</div>

<div class="p-4 bg-gray-100 rounded-lg">
    <p class="text-sm text-gray-600">Peserta Didik</p>
    <p class="font-semibold text-lg text-gray-800 dark:text-gray-800">
        {{ $record->jumlah_peserta_didik }}
    </p>
</div>


</div>

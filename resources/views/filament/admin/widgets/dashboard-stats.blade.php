<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-blue-500 text-white rounded-lg p-4 shadow">
        <h3 class="text-lg font-semibold">Guru</h3>
        <p class="text-2xl font-bold">{{ $this->getData()['totalGuru'] }}</p>
    </div>

    <div class="bg-green-500 text-white rounded-lg p-4 shadow">
        <h3 class="text-lg font-semibold">Berita</h3>
        <p class="text-2xl font-bold">{{ $this->getData()['totalBerita'] }}</p>
    </div>

    <div class="bg-yellow-500 text-white rounded-lg p-4 shadow">
        <h3 class="text-lg font-semibold">Galeri</h3>
        <p class="text-2xl font-bold">{{ $this->getData()['totalGaleri'] }}</p>
    </div>

    <div class="bg-purple-500 text-white rounded-lg p-4 shadow">
        <h3 class="text-lg font-semibold">PPDB</h3>
        <p class="text-2xl font-bold">{{ $this->getData()['totalPpdb'] }}</p>
    </div>
</div>

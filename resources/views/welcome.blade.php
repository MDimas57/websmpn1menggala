@php
    use App\Models\Banner;
    $banners = Banner::latest()->get();
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-8 bg-gray-50 min-h-screen">
    @foreach ($banners as $banner)
        <div class="rounded-xl overflow-hidden shadow-lg bg-white">
            <img src="{{ asset('storage/' . $banner->foto) }}" alt="{{ $banner->judul }}" class="w-full h-56 object-cover">
            <div class="p-4">
                <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $banner->judul }}</h3>
                <p class="text-gray-600">{{ $banner->keterangan }}</p>
            </div>
        </div>
    @endforeach
</div>

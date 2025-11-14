@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <!-- 
      Saya lebarkan containernya dari max-w-4xl ke max-w-7xl 
      agar muat 2 kolom dengan lebih baik.
    -->
    <div class="container mx-auto max-w-7xl px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            Struktur Sekolah
        </h1>

        <!-- 
          PERUBAHAN UTAMA DI SINI:
          Kita cek dulu apakah $struktur ada isinya.
          .count() dipakai karena $struktur adalah KUMPULAN data (collection)
          yang dikirim dari controller Anda.
        -->
        @if($struktur && $struktur->count() > 0)
            
            <!-- 
              Kita buat grid untuk tata letak horizontal (2 kolom di desktop).
            -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- 
                  Kita LOOPING datanya. 
                  Setiap item dari $struktur akan disimpan sebagai $item.
                -->
                @foreach($struktur as $item)
                    <!-- Ini adalah 1 kotak/kolom -->
                    <div class="bg-white shadow-lg rounded-xl p-6">
                        
                        <!-- Kita pakai $item->judul, BUKAN $struktur->judul -->
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                            {{ $item->judul }}
                        </h2>
                        
                        <!-- Kita pakai $item->foto -->
                        <img src="{{ asset('storage/'. $item->foto) }}" 
                             alt="{{ $item->judul }}" 
                             class="w-full h-auto rounded-lg shadow-md">
                    </div>
                @endforeach

            </div> <!-- Penutup .grid -->

        @else
            <!-- Ini akan tampil jika data $struktur kosong -->
            <div class="text-center text-gray-500">
                <p>Struktur organisasi belum tersedia.</p>
            </div>
        @endif

    </div>
</div>
@endsection
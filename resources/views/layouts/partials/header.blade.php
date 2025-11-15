<div class="p-2 text-white bg-purple-800">
    <div class="container flex items-center px-4 mx-auto max-w-7xl">
        <span class="mr-4 text-sm font-semibold">INFO &gt;&gt;</span>
        <div class="flex-1 overflow-hidden">
            <div class="text-sm whitespace-nowrap animate-ticker" aria-live="polite">
                SELAMAT DATANG DI WEBSITE RESMI SMPN 1 MENGGALA &nbsp;&nbsp;|&nbsp;&nbsp;
                Telepon: (0725) 123456 &nbsp;&nbsp;|&nbsp;&nbsp;
                Email: info@smpnegeri1menggala.com &nbsp;&nbsp;|&nbsp;&nbsp;
                Alamat: Menggala Kota, Kec. Menggala, Kab. Tulang Bawang, Lampung 34617
                &nbsp;&nbsp;&nbsp;&nbsp;
                SELAMAT DATANG DI WEBSITE RESMI SMPN 1 MENGGALA &nbsp;&nbsp;|&nbsp;&nbsp;
                Telepon: (0725) 123456 &nbsp;&nbsp;|&nbsp;&nbsp;
                Email: info@smpnegeri1menggala.com &nbsp;&nbsp;|&nbsp;&nbsp;
                Alamat: Menggala Kota, Kec. Menggala, Kab. Tulang Bawang, Lampung 34617
            </div>
        </div>
    </div>
    <style>
    @keyframes ticker {
      0%   { transform: translateX(0%); }
      100% { transform: translateX(-50%); } 
    }
    .animate-ticker {
      display: inline-block;
      animation: ticker 40s linear infinite;
    }
    </style>
</div>

<header class="sticky top-0 z-50 bg-white shadow-md">
    <nav class="container flex items-center justify-between px-4 py-4 mx-auto max-w-7xl">
        <div>
            <a href="/" class="text-xl font-bold text-gray-800">
                SMPN 1 MENGGALA
            </a>
        </div>
        <div class="hidden space-x-6 md:flex items-center">
            <a href="/" class="font-semibold text-gray-700 hover:text-purple-800">BERANDA</a>

            <div class="relative group">
                <button class="font-semibold text-gray-700 hover:text-purple-800 inline-flex items-center">
                    <span>PROFIL</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute z-10 hidden group-hover:block bg-white text-left shadow-lg rounded-md w-48 pt-2">
                    <a href="{{ route('profil.sambutan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">KATA SAMBUTAN</a>
                    <a href="{{ route('profil.sekolah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">PROFIL SEKOLAH</a>
                    <a href="{{ route('profil.struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">STRUKTUR ORGANISASI</a>
                </div>
            </div>

            <a href="/bidang" class="font-semibold text-gray-700 hover:text-purple-800">BIDANG</a>
            
            <div class="relative group">
                <button class="font-semibold text-gray-700 hover:text-purple-800 inline-flex items-center">
                    <span>GALLERY</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute z-10 hidden group-hover:block bg-white text-left shadow-lg rounded-md w-48 pt-2">
                    <a href="{{ route('gallery.foto') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">GALLERY FOTO</a>
                    <a href="{{ route('gallery.video') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">GALLERY VIDEO</a>
                </div>
            </div>
            
            {{-- 
              PERUBAHAN DI BAWAH INI:
              Link '/spmb' telah diubah menjadi route 'ppdb.index' 
            --}}
            <a href="{{ route('ppdb.index') }}" class="font-semibold text-gray-700 hover:text-purple-800">PPDB</a>

            <a href="/informasi" class="font-semibold text-gray-700 hover:text-purple-800">INFORMASI</a>
            <a href="/kontak" class="font-semibold text-gray-700 hover:text-purple-800">KONTAK KAMI</a>
        </div>
        <div class="md:hidden">
            <button class="text-2xl text-gray-800">
                &#9776; 
            </button>
        </div>
    </nav>
</header>
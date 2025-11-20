<div class="p-2 text-white bg-amber-800 relative z-50">
    <div class="container flex items-center px-4 mx-auto max-w-7xl">
        <span class="mr-4 text-sm font-semibold bg-amber-900 px-2 py-0.5 rounded">INFO TERKINI</span>
        <div class="flex-1 overflow-hidden">
            <div class="text-sm whitespace-nowrap animate-ticker" aria-live="polite">
                SELAMAT DATANG DI WEBSITE RESMI SMPN 1 MENGGALA &nbsp;&nbsp;|&nbsp;&nbsp;
                Telepon: (0725) 123456 &nbsp;&nbsp;|&nbsp;&nbsp;
                Email: info@smpnegeri1menggala.com &nbsp;&nbsp;|&nbsp;&nbsp;
                PPDB Online Tahun Ajaran Baru Telah Dibuka!
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

<header class="sticky top-0 z-40 shadow-lg bg-gradient-to-r from-yellow-500 via-amber-600 to-yellow-500">
    <nav class="container flex items-center justify-between px-4 py-4 mx-auto max-w-7xl relative">

        <a href="/" class="flex items-center gap-2 group">
            {{-- Jika ada logo gambar, bisa ditaruh disini --}}
            {{-- <img src="path/to/logo.png" class="h-10 w-auto bg-white rounded-full p-1"> --}}
            <span class="text-xl font-extrabold text-white tracking-wider group-hover:text-amber-100 transition-colors" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                SMPN 1 MENGGALA
            </span>
        </a>

        <div class="items-center hidden space-x-1 lg:space-x-6 md:flex">
            <a href="/" class="px-3 py-2 font-bold text-white rounded-lg hover:bg-white/20 hover:text-white transition-all">BERANDA</a>

            <div class="relative group">
                <button class="inline-flex items-center px-3 py-2 font-bold text-white rounded-lg hover:bg-white/20 hover:text-white transition-all">
                    <span>PROFIL</span>
                    <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute left-0 z-50 hidden w-56 pt-2 transition-all duration-200 origin-top-left transform scale-95 opacity-0 group-hover:block group-hover:opacity-100 group-hover:scale-100">
                    <div class="py-2 bg-white rounded-lg shadow-xl border-t-4 border-amber-500">
                        <a href="{{ route('profil.sambutan') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">KATA SAMBUTAN</a>
                        <a href="{{ route('profil.sekolah') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">PROFIL SEKOLAH</a>
                        <a href="{{ route('profil.struktur') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">STRUKTUR ORGANISASI</a>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <button class="inline-flex items-center px-3 py-2 font-bold text-white rounded-lg hover:bg-white/20 hover:text-white transition-all">
                    <span>BIDANG</span>
                    <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute left-0 z-50 hidden w-56 pt-2 group-hover:block">
                    <div class="py-2 bg-white rounded-lg shadow-xl border-t-4 border-amber-500">
                        <a href="{{ route('bidang.kurikulum') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">KURIKULUM</a>
                        <a href="{{ route('bidang.kesiswaan') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">KESISWAAN</a>
                        <a href="{{ route('bidang.humas') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">HUMAS</a>
                        <a href="{{ route('bidang.sarana') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">SARANA PRASARANA</a>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <button class="inline-flex items-center px-3 py-2 font-bold text-white rounded-lg hover:bg-white/20 hover:text-white transition-all">
                    <span>GALLERY</span>
                    <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute left-0 z-50 hidden w-56 pt-2 group-hover:block">
                    <div class="py-2 bg-white rounded-lg shadow-xl border-t-4 border-amber-500">
                        <a href="{{ route('gallery.foto') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">GALLERY FOTO</a>
                        <a href="{{ route('gallery.video') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-amber-50 hover:text-amber-700">GALLERY VIDEO</a>
                    </div>
                </div>
            </div>

            <a href="{{ route('ppdb.index') }}" class="px-3 py-2 font-bold text-white rounded-lg hover:bg-white/20 hover:text-white transition-all">PPDB</a>
            <a href="/informasi" class="px-3 py-2 font-bold text-white rounded-lg hover:bg-white/20 hover:text-white transition-all">INFORMASI</a>
            <a href="/kontak" class="px-3 py-2 font-bold text-yellow-700 bg-white rounded-full shadow-md hover:bg-gray-100 transition-all">KONTAK KAMI</a>
        </div>

        <div class="md:hidden">
            <button id="mobileMenuBtn" class="p-2 text-white transition-colors rounded-md hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </nav>

    <div id="mobileMenu" class="hidden md:hidden bg-white border-t-4 border-amber-500 shadow-2xl absolute w-full left-0 z-50 transition-all duration-300 ease-in-out">
        
        {{-- Dekorasi Garis Halus --}}
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-300 to-amber-300 opacity-50"></div>

        <div class="py-2 space-y-1">
            
            <a href="/" class="block px-6 py-3 text-base font-bold text-gray-800 transition-all border-l-4 border-transparent hover:bg-amber-50 hover:text-amber-700 hover:border-amber-500">
                BERANDA
            </a>

            <details class="group">
                <summary class="flex items-center justify-between px-6 py-3 text-base font-bold text-gray-800 cursor-pointer transition-all border-l-4 border-transparent hover:bg-amber-50 hover:text-amber-700 hover:border-amber-500 marker:content-none">
                    <span>PROFIL</span>
                    <svg class="w-5 h-5 text-amber-500 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="px-4 py-2 bg-gray-50 border-t border-b border-gray-100 space-y-1">
                    <a href="{{ route('profil.sambutan') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> KATA SAMBUTAN
                    </a>
                    <a href="{{ route('profil.sekolah') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> PROFIL SEKOLAH
                    </a>
                    <a href="{{ route('profil.struktur') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> STRUKTUR ORGANISASI
                    </a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center justify-between px-6 py-3 text-base font-bold text-gray-800 cursor-pointer transition-all border-l-4 border-transparent hover:bg-amber-50 hover:text-amber-700 hover:border-amber-500 marker:content-none">
                    <span>BIDANG</span>
                    <svg class="w-5 h-5 text-amber-500 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="px-4 py-2 bg-gray-50 border-t border-b border-gray-100 space-y-1">
                    <a href="{{ route('bidang.kurikulum') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> KURIKULUM
                    </a>
                    <a href="{{ route('bidang.kesiswaan') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> KESISWAAN
                    </a>
                    <a href="{{ route('bidang.humas') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> HUMAS
                    </a>
                    <a href="{{ route('bidang.sarana') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> SARANA PRASARANA
                    </a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center justify-between px-6 py-3 text-base font-bold text-gray-800 cursor-pointer transition-all border-l-4 border-transparent hover:bg-amber-50 hover:text-amber-700 hover:border-amber-500 marker:content-none">
                    <span>GALLERY</span>
                    <svg class="w-5 h-5 text-amber-500 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="px-4 py-2 bg-gray-50 border-t border-b border-gray-100 space-y-1">
                    <a href="{{ route('gallery.foto') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> GALLERY FOTO
                    </a>
                    <a href="{{ route('gallery.video') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-white hover:text-amber-600 hover:shadow-sm transition-all">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-3"></span> GALLERY VIDEO
                    </a>
                </div>
            </details>

            <a href="{{ route('ppdb.index') }}" class="block px-6 py-3 text-base font-bold text-gray-800 transition-all border-l-4 border-transparent hover:bg-amber-50 hover:text-amber-700 hover:border-amber-500">
                PPDB
            </a>
            <a href="/informasi" class="block px-6 py-3 text-base font-bold text-gray-800 transition-all border-l-4 border-transparent hover:bg-amber-50 hover:text-amber-700 hover:border-amber-500">
                INFORMASI
            </a>
            <a href="/kontak" class="block px-6 py-3 text-base font-bold text-white bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-600 hover:to-yellow-600">
                KONTAK KAMI
            </a>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobileMenuBtn').addEventListener('click', function() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    });
</script>
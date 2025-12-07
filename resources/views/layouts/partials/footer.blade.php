<footer class="py-10 text-white md:pt-16 md:pb-8 bg-gradient-to-br from-amber-900 to-amber-800 border-t-4 border-amber-500">
    <div class="container px-4 mx-auto max-w-7xl md:px-6">

        {{-- GRID UTAMA --}}
        <div class="grid grid-cols-1 gap-8 md:gap-12 lg:grid-cols-4 lg:gap-8">

            {{-- KOLOM 1: IDENTITAS (Center di Mobile, Kiri di Desktop) --}}
            <div class="flex flex-col items-center space-y-4 text-center md:items-start md:text-left">
                <div class="flex flex-col items-center gap-3 md:flex-row">
                    <img src="{{ asset('images/logo smp.png') }}" alt="Logo SMPN 1 Menggala"
                        class="object-contain p-1 bg-white rounded-full w-20 h-20 md:w-16 md:h-16 shadow-lg">
                    <div>
                        <h2 class="text-lg font-bold uppercase tracking-wider leading-snug">
                            SMP Negeri 1<br>Menggala
                        </h2>
                    </div>
                </div>

                <div class="space-y-2">
                    <p class="text-sm font-bold text-amber-400">
                        "Sekolah Unggulan Berkarakter"
                    </p>
                    <p class="text-sm leading-relaxed text-gray-300 md:text-justify">
                        Mendidik generasi masa depan dengan karakter kuat, akademik unggul,
                        dan siap menghadapi tantangan global dengan landasan iman dan taqwa.
                    </p>
                </div>
            </div>

            {{-- KOLOM 2: DOKUMEN --}}
            <div class="text-left">
                <h3 class="mb-4 text-lg font-bold text-amber-400 uppercase border-b border-amber-700 pb-2 w-full md:w-max">
                    Dokumen & Informasi
                </h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="#" class="flex items-center text-gray-300 transition-colors group hover:text-white">
                            <span class="mr-2 text-amber-500 transition-transform group-hover:translate-x-1">➤</span> Panduan Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-300 transition-colors group hover:text-white">
                            <span class="mr-2 text-amber-500 transition-transform group-hover:translate-x-1">➤</span> Syarat & Ketentuan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-300 transition-colors group hover:text-white">
                            <span class="mr-2 text-amber-500 transition-transform group-hover:translate-x-1">➤</span> Pengumuman Resmi
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-300 transition-colors group hover:text-white">
                            <span class="mr-2 text-amber-500 transition-transform group-hover:translate-x-1">➤</span> Kalender Akademik
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-300 transition-colors group hover:text-white">
                            <span class="mr-2 text-amber-500 transition-transform group-hover:translate-x-1">➤</span> FAQ (Tanya Jawab)
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 3: KONTAK --}}
            <div class="text-left">
                <h3 class="mb-4 text-lg font-bold text-amber-400 uppercase border-b border-amber-700 pb-2 w-full md:w-max">
                    Hubungi Kami
                </h3>
                <div class="space-y-4 text-sm text-gray-300">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-1 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <p class="leading-relaxed">
                            Jl. Suay Umpu No. 308, Menggala Kota,
                            Kab. Tulang Bawang, Lampung, 34596
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <a href="tel:+6281234567890" class="hover:text-amber-400 transition">+62 812-3456-7890</a>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:info@smpn1menggala.sch.id" class="hover:text-amber-400 transition break-all">info@smpn1menggala.sch.id</a>
                    </div>
                </div>
            </div>

            {{-- KOLOM 4: PETA --}}
            <div class="text-left">
                <h3 class="mb-4 text-lg font-bold text-amber-400 uppercase border-b border-amber-700 pb-2 w-full md:w-max">
                    Lokasi Sekolah
                </h3>
                <div class="w-full h-48 md:h-40 overflow-hidden bg-gray-600 rounded-xl shadow-lg border border-amber-700/50">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.7077199639393!2d105.25620707473738!3d-4.465332695508955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3f3a36ee34f707%3A0x133ba7fbdd782e3a!2sState%20Junior%20High%20School%201%20Menggala!5e0!3m2!1sen!2sid!4v1763131663224!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
                <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-1 mt-3 text-xs text-amber-400 hover:text-white transition group">
                    Buka di Google Maps
                    <svg class="w-3 h-3 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

        </div>

        <hr class="my-8 border-amber-800/50">

        {{-- BOTTOM FOOTER --}}
        <div class="flex flex-col-reverse items-center justify-between gap-6 md:flex-row">
            <p class="text-sm text-gray-400 text-center md:text-left">
                &copy; {{ date('Y') }} <span class="text-white font-semibold">SMP Negeri 1 Menggala</span>. <br class="md:hidden">All rights reserved.
            </p>

            <div class="flex space-x-4">
                {{-- Facebook --}}
                <a href="#" class="p-2.5 bg-amber-900/50 rounded-full text-gray-300 transition-all duration-300 hover:bg-blue-600 hover:text-white hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                {{-- YouTube --}}
                <a href="#" class="p-2.5 bg-amber-900/50 rounded-full text-gray-300 transition-all duration-300 hover:bg-red-600 hover:text-white hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
                {{-- Instagram --}}
                <a href="#" class="p-2.5 bg-amber-900/50 rounded-full text-gray-300 transition-all duration-300 hover:bg-pink-600 hover:text-white hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.073-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>
        </div>

    </div>
</footer>

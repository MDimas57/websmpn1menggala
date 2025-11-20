@php
    // Anda bisa letakkan kode ini pada file layout (app.blade.php)
@endphp

<footer class="p-8 mt-12 text-white md:p-12 bg-amber-800">
    <div class="container mx-auto max-w-7xl">

        <!-- GRID UTAMA -->
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">

            <!-- KOLOM 1: PROFIL SEKOLAH -->
            <div class="flex flex-col items-center space-y-4 text-center sm:items-start sm:text-left">
                <img src="{{ asset('images/teknokrat.png') }}" alt="Logo SMP Negeri 1 Menggala"
                    class="w-24 h-24 rounded-md">

                <div>
                    <h2 class="mb-2 text-2xl font-bold">SMP Negeri 1 Menggala</h2>
                    <p class="mb-2 text-sm font-semibold text-yellow-300">
                        Sekolah Unggulan Berkarakter
                    </p>
                    <p class="text-sm leading-relaxed text-gray-300">
                        Mendidik generasi masa depan dengan karakter kuat, akademik unggul,
                        dan siap menghadapi tantangan global.
                    </p>
                </div>
            </div>

            <!-- KOLOM 2: DOKUMEN -->
            <div class="text-center sm:text-left">
                <h3 class="mb-4 text-lg font-semibold">Dokumen</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white">Panduan Pendaftaran</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Peta Domisili</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Syarat dan Ketentuan</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Pengumuman Resmi</a></li>
                </ul>
            </div>

            <!-- KOLOM 3: KONTAK -->
            <div class="text-center sm:text-left">
                <h3 class="mb-4 text-lg font-semibold">Kontak</h3>
                <div class="space-y-3 text-sm leading-relaxed text-gray-300">
                    <p>
                        <span class="block font-semibold">Telepon:</span>
                        <a href="tel:+6281234567890" class="hover:text-white">+62 812-3456-7890</a>
                    </p>
                    <p>
                        <span class="block font-semibold">Email:</span>
                        <a href="mailto:info@smpn1menggala.sch.id"
                            class="hover:text-white">info@smpn1menggala.sch.id</a>
                    </p>
                    <p>
                        <span class="block font-semibold">Alamat Kami:</span>
                        Jl. Suay Umpu No. 308 Menggala Kota<br>
                        Kabupaten Tulang Bawang Lampung, 34596
                    </p>
                </div>
            </div>

            <!-- KOLOM 4: LINK TERKAIT -->
            <div class="text-center sm:text-left">
                <h3 class="mb-4 text-lg font-semibold">Link Terkait</h3>

                <div class="flex flex-col space-y-3">
                    <a href="#"
                        class="block w-full px-4 py-3 font-medium text-center text-white transition rounded-lg bg-gradient-to-r from-yellow-400 to-amber-500 hover:brightness-110">
                        SPADA
                    </a>

                    <a href="#"
                        class="block w-full px-4 py-3 font-medium text-center text-white transition rounded-lg bg-gradient-to-r from-yellow-400 to-amber-500 hover:brightness-110">
                        Digital Parent
                    </a>
                </div>

            </div>

        </div>

        <hr class="my-10 border-amber-700">

        <!-- BAGIAN BAWAH (COPYRIGHT & SOSIAL MEDIA) -->
        <div
            class="flex flex-col items-center justify-between space-y-4 text-sm text-gray-300 md:flex-row md:space-y-0">

            <p class="text-center md:text-left">
                &copy; {{ date('Y') }} SMP Negeri 1 Menggala. All rights reserved.
            </p>

            <div class="flex space-x-6">

                <!-- Facebook -->
                <a href="#" class="text-gray-300 transition hover:text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.675 0h-21.35C.592 0 0 .593 0 1.326v21.349C0 23.406.592 24 1.325
                     24h11.494v-9.294H9.691v-3.622h3.128v-2.671c0-3.1
                     1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504
                     0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.408
                     24 24 23.406 24 22.675V1.325C24 .593 23.408 0 22.675 0z" />
                    </svg>
                </a>

                <!-- YouTube -->
                <a href="#" class="text-gray-300 transition hover:text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.5 6.2s-.2-1.7-.9-2.5c-.9-.9-1.9-.9-2.4-1C16.9
                     2.3 12 2.3 12 2.3h-.1s-4.9 0-8.2.4c-.6.1-1.6.1-2.4
                     1-.7.8-.9 2.5-.9 2.5S0 8.1 0 10.1v1.8c0 2 .1 3.9.1
                     3.9s.2 1.7.9 2.5c.9.9 2.1.9 2.6 1 1.9.2 8.1.4 8.1.4s4.9
                     0 8.2-.4c.6-.1 1.6-.1 2.4-1 .7-.8.9-2.5.9-2.5s.1-1.9.1-3.9v-1.8c0-2-.1-3.9-.1-3.9zM9.5 14.7V8.8l6.2
                     2.9-6.2 3z" />
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="#" class="text-gray-300 transition hover:text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0
                     5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3
                     3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7
                     1.3-3 3-3h10zm-5 3.5A5.5 5.5 0 1 0 17.5 13 5.5 5.5
                     0 0 0 12 7.5zm0 9A3.5 3.5 0 1 1 15.5 13 3.5 3.5 0
                     0 1 12 16.5zm4.8-10.9a1.1 1.1 0 1 0 1.1 1.1 1.1
                     1.1 0 0 0-1.1-1.1z" />
                    </svg>
                </a>

            </div>


        </div>
    </div>
</footer>

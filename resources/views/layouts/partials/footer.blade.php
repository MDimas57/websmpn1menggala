@php
// File ini hanya contoh. Anda bisa letakkan kode ini di file layout Anda (misal: app.blade.php)
@endphp

<!-- 
  PERUBAHAN 1: Mengganti bg-slate-900 menjadi bg-amber-800 (sesuai tema header)
-->
<footer class="p-8 mt-12 text-white md:p-12 bg-amber-800">
    <div class="container mx-auto max-w-7xl">

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">

            <div class="flex items-start space-x-4">
                <!-- Pastikan path 'images/teknokrat.png' ini benar -->
                <img src="{{ asset('images/teknokrat.png') }}" alt="Logo SMP Negeri 1 Menggala" class="w-20 h-20 rounded-md">
                <div>
                    <h2 class="mb-1 text-2xl font-bold text-white">SMP Negeri 1 Menggala</h2>
                    <!-- PERUBAHAN 2: Mengganti text-green-300 menjadi text-yellow-300 agar serasi -->
                    <p class="mb-2 text-sm font-semibold text-yellow-300">Sekolah Unggulan Berkarakter</p>
                    <p class="text-sm text-gray-300">
                        Mendidik generasi masa depan dengan karakter kuat, akademik unggul, dan siap menghadapi tantangan global.
                    </p>
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-lg font-semibold">Dokumen</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 transition-colors hover:text-white">Panduan Pendaftaran</a></li>
                    <li><a href="#" class="text-gray-300 transition-colors hover:text-white">Peta Domisili</a></li>
                    <li><a href="#" class="text-gray-300 transition-colors hover:text-white">Syarat dan Ketentuan</a></li>
                    <li><a href="#" class="text-gray-300 transition-colors hover:text-white">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 transition-colors hover:text-white">Pengumuman Resmi</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-lg font-semibold">Kontak</h3>
                <div class="space-y-2 text-sm leading-relaxed text-gray-300">
                    <p>
                        <span class="block font-semibold">Telepon:</span>
                        <a href="tel:+6281234567890" class="text-gray-300 transition-colors hover:text-white">+62 812-3456-7890</a>
                    </p>
                    <p>
                        <span class="block font-semibold">Email:</span>
                        <a href="mailto:info@smpn1menggala.sch.id" class="text-gray-300 transition-colors hover:text-white">info@smpn1menggala.sch.id</a>
                    </p>
                    <p>
                        <span class="block font-semibold">Alamat Kami:</span>
                        Jl. Suay Umpu No. 308 Menggala Kota<br>
                        Kabupaten Tulang Bawang Lampung,34596<br>
                    </p>
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-lg font-semibold">Link Terkait</h3>
                <div class="flex flex-col space-y-3">
                    <!-- Biarkan tombol ini hijau agar menonjol (Call to Action) -->
                    <a href="#" class="block w-full px-4 py-3 font-medium text-center text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
                        SPADA
                    </a>

                    <a href="#" class="block w-full px-4 py-3 font-medium text-center text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
                        Digital Parent
                    </a>
                </div>
            </div>

        </div>

        <!-- PERUBAHAN 3: Mengganti border-gray-700 menjadi border-amber-700 -->
        <hr class="my-8 border-amber-700">

        <div class="flex flex-col items-center justify-between text-sm text-gray-400 md:flex-row">

            <p class="order-2 mt-4 md:order-1 md:mt-0">
                &copy; {{ date('Y') }} SMP Negeri 1 Menggala. All rights reserved.
            </p>

            <div class="flex order-1 space-x-4 md:order-2">
                <a href="#" aria-label="Facebook" class="transition-colors hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.494v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.294h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Twitter" class="transition-colors hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M23.953 4.57c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124-4.09-.205-7.718-2.165-10.148-5.147-.424.728-.666 1.58-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 14.01-7.496 14.01-13.986 0-.213-.005-.426-.015-.637.961-.689 1.799-1.559 2.463-2.548z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Instagram" class="transition-colors hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.148 3.227-1.667 4.771-4.919 4.919-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.07-1.646-.07-4.85s.012-3.584.07-4.85c.148-3.227 1.667-4.771 4.919-4.919 1.266-.058 1.646.07 4.85.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.28-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.28.059 1.689.073 4.948.073s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.059-1.28.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.28-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</footer>
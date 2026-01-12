<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMPN 1 Menggala</title>

    {{-- Menambahkan font Inter atau Poppins agar lebih modern --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- Ganti bg-gray-100 menjadi bg-slate-50 agar lebih cerah dan dingin --}}
<body class="flex flex-col min-h-screen antialiased text-gray-800 bg-slate-50">

    <div id="global-loader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-white/50 backdrop-blur-md transition-opacity duration-300">
        <div class="flex flex-col items-center gap-2">
            <div class="w-10 h-10 border-4 border-indigo-200 rounded-full animate-spin border-t-indigo-600"></div>
            <span class="text-xs font-medium text-slate-600 animate-pulse">Memuat...</span>
        </div>
    </div>
    @include('layouts.partials.header')

    {{-- Flex-grow agar footer selalu di bawah meski konten sedikit --}}
    <main class="flex-grow w-full">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('global-loader');

            // 1. Logic saat halaman selesai dimuat (Load)
            window.addEventListener('load', function() {
                // Atur durasi minimal spinner muncul (dalam milidetik)
                const delayWaktu = 800; // 0.8 detik

                setTimeout(() => {
                    loader.classList.add('opacity-0', 'pointer-events-none');
                    setTimeout(() => {
                        loader.style.display = 'none';
                    }, 300);
                }, delayWaktu);
            });

            // 2. Logic saat user klik link (Navigation)
            const links = document.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    const target = this.getAttribute('target');

                    // Filter agar loader tidak muncul untuk link download/#/tab baru
                    if (href && href !== '#' && href.startsWith('http') && target !== '_blank' && !e.ctrlKey && !e.metaKey) {
                        loader.style.display = 'flex';
                        setTimeout(() => {
                            loader.classList.remove('opacity-0', 'pointer-events-none');
                        }, 10);
                    }
                });
            });

            // 3. Logic saat user submit form
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    loader.style.display = 'flex';
                    setTimeout(() => {
                        loader.classList.remove('opacity-0', 'pointer-events-none');
                    }, 10);
                });
            });
        });
    </script>
</body>
</html>
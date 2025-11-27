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
<body class="flex flex-col min-h-screen antialiased text-gray-800">
    @include('layouts.partials.header')

    {{-- Flex-grow agar footer selalu di bawah meski konten sedikit --}}
    <main class="flex-grow w-full">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

</body>
</html>

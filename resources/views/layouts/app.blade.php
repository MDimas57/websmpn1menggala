<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMPN 1 Menggala</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Head -->
</head>
<body class="bg-gray-100">

    @include('layouts.partials.header')
 
    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    

</body>
</html>
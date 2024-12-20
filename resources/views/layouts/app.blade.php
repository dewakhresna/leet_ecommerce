<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEET</title>
    <link rel="icon" href="{{ asset('assets/logo/logo_leet.png') }}" type="image/png">
    {{-- link css bootstrap --}}
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- link css biasa --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    {{-- link js bootstrap --}}
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- link js biasa --}}
    <script src="{{ asset('js/sticky-navbar.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('layouts.app.header')

    @include('layouts.app.navbar')

    <div class="container">
        
        @yield('content')
        @include('layouts.app.footer')
    </div>

</body>
</html>
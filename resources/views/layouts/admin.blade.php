<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEET</title>
    {{-- link css bootstrap --}}
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- link css biasa --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
    {{-- link js bootstrap --}}
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.admin.navbar')

    <div class="container">
        
        @yield('content')
    </div>

    {{-- link js biasa --}}
    <script src="{{ asset('js/stiky-navbar.js') }}"></script>
</body>
</html>
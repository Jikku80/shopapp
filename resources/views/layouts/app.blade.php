<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SHOPAPP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.inc.navbar')
        <div class="container">
            @include('layouts.inc.messages')
            @yield('content')
        </div>
    </div>
    <hr>

</body>
<footer class="footer mt-auto py-3 bg-dark">
    <div class="container">
        <span class="text-muted"><p align="center"> To Contact Customer Care Service:025577512, 12548689</p></span>
    </div>
</footer>
</html>

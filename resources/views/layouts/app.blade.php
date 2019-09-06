<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('heroes.index')}}">Super Heroes DB</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item d-inline-block"><a class="nav-link" href="{{ route('heroes.index') }}">Main</a></li>
                <li class="nav-item d-inline-block"><a class="nav-link" href="{{ route('heroes.create') }}">Add hero</a></li>
            </ul>
        </div>
    </nav>
    <main class="col-md-12 justify-content-center">
        @yield('content')
    </main>
</div>
</body>
</html>

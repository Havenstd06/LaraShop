<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
@section('title')
<title>{{ config('app.name', 'Laravel') }}</title>
@show

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('extra-meta')

    <!-- Scripts -->
    @yield('extra-script')
<script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col h-full antialiased leading-none bg-gray-100">
    <div id="app" class="flex-1 w-full bg-white">
        @include('layouts.navbar')

        @yield('content')
    </div>
    
    @include('layouts.footer')
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @yield('extra-js')
</body>
</html>

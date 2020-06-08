<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
@include('partials.head')

<body class="flex flex-col h-full antialiased leading-none bg-gray-100">
    <div id="app" class="flex-1 w-full bg-white">
        @include('partials.navbar')
        
        @include('partials.alert')

        @yield('content')
    </div>
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @yield('extra-js')
</body>

</html>
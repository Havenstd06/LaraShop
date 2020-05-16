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
        
        @if (session('success'))
            <div class="flex justify-center mt-4">
                <div class="relative w-1/2 px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
                    <strong class="font-bold">YEAH!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if (session('warning'))
            <div class="flex justify-center mt-4">
                <div class="relative w-1/2 px-4 py-3 mb-4 text-orange-700 bg-orange-100 border border-orange-400 rounded">
                    <strong class="font-bold">Warning!</strong>
                    <span class="block sm:inline">{{ session('warning') }}</span>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="flex justify-center mt-4">
                <div class="relative w-1/2 px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="flex justify-center mt-4">
                <div class="relative w-1/2 px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                    <strong class="font-bold">Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </div>
    
    @include('layouts.footer')
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @yield('extra-js')
</body>
</html>

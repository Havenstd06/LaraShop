<head>
@section('title')
<title>{{ config('app.name', 'Laravel') }}</title>
@show

<meta charset="utf-8">
<meta
    name="viewport"
    content="width=device-width, initial-scale=1"
>
@yield('extra-meta')

<!-- Scripts -->
@yield('extra-script')
<script
    src="{{ asset('js/app.js') }}"
    defer
></script>

<!-- Styles -->
<link
    href="{{ asset('css/app.css') }}"
    rel="stylesheet"
>
</head>
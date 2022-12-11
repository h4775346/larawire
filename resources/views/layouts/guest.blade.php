<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dark:bg-gray-800">

@include('navs.guest-nav')

<div class="font-sans text-gray-900 antialiased dark:bg-gray-900">
    {{ $slot }}
</div>

<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
<script src="{{asset('js/flowbite.js')}}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/nav.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles


</head>
<body class="font-sans antialiased">
<x-jet-banner/>
<x-side-nav>
    <div class="min-h-screen w-full bg-gray-100 dark:bg-gray-900">
    @livewire('navigation-menu')
    <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 dark:text-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
    @endif

    <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</x-side-nav>

<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script src="{{asset('js/flowbite.js')}}"></script>

<x-alerts/>

@stack('modals')
@livewireScripts
@livewire('livewire-ui-modal')

</body>
</html>

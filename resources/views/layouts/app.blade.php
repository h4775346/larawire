<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{asset('css/nav.css')}}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>[x-cloak] { display: none !important; }</style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
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

        @stack('modals')
        @livewireScripts
        @livewire('livewire-ui-modal')

    </body>
</html>

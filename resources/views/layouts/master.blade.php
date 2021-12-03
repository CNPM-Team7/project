<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-gray-100">
            <x-navigation-menu></x-navigation-menu>

            <!-- Page Heading -->
            @hasSection('header')
                <header class="bg-white shadow select-none">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
        @endif

        <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="h-screen bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg p-10">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="/css/flowbite.min.css"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="antialiased">
    <div class="h-screen flex flex-col">
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
        <main class="h-full bg-cover" style="background-image: url({{ url('/assets/img/background.jpg') }})">
            <div class="h-full py-12">
                <div class="w-auto mx-auto sm:px-6 lg:px-8 flex justify-center">
                    <div class="w-1/3 h-auto bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg px-10 py-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

</body>
</html>

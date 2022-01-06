<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />
    <!-- Styles -->
    <link rel="stylesheet" href="/css/flowbite.min.css"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@livewireStyles

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="antialiased">
<div class="min-h-screen">
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
        <div class="w-full flex flex-row mx-auto sm:px-6 lg:px-8 py-12 justify-center">

                @yield('content')
            </div>
        </div>
    </main>
</div>


<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/datepicker.bundle.js"></script>
@livewireScripts

</body>
</html>

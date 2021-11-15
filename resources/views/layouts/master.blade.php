<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
        @yield('content')
    </main>
</div>
</body>
</html>

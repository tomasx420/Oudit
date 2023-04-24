<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="img/short-logo.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex px-[10rem] sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full mt-6 py-5 columns-2 flex-row dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="pl-6 py-[4rem]">
                <img style="height: 5rem;" src="{{ asset('img/long-logo.png') }}" alt="Outokumpu logo">
            </div>
            <div class="align-middle py-[3.25rem]">
                <h3 class="title is-3 text-white">Welcome to OuDit</h3>
                <h5 class="subtitle is-5 text-white">Outokumpu Audit and Action Management System</h5>
                <div class="pr-[5rem]">
                    <a class="button is-fullwidth is-info" href="{{route('login')}}">Log in</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

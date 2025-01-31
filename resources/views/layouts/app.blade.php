<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/theme/scss/bootstrap/main.scss'])
        @livewireStyles
    </head>

    <body class="font-sans antialiased">
        @livewire('front-layout.header')
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- @include('layouts.navigation') --}}
            @livewire('front-layout.navbar')

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @livewire('front-layout.footer')
        </div>
        @livewireScripts

        <!-- JavaScript Files -->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <script src="{{ asset('theme/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('theme/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('theme/js/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('theme/js/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('theme/js/owlcarousel/easing/easing.js') }}"></script>
        <script src="{{ asset('theme/js/owlcarousel/easing/easing.min.js') }}"></script>
        <script src="{{ asset('theme/js/main.js') }}"></script>
    </body>
</html>

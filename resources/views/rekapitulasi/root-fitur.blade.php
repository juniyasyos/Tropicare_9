<!doctype html>
<html lang="en" data-theme="light" class="bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tropicare</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tienne:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        @import url(https://pro.fontawesome.com/releases/v5.10.0/css/all.css);
    </style>
    <!-----------------------------------------------------------
    -- animate.min.css by Daniel Eden (https://animate.style)
    -- is required for the animation of notifications and slide out panels
    -- you can ignore this step if you already have this file in your project
    --------------------------------------------------------------------------->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Livewire styles --}}
    @livewireStyles

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>
    <div class="bg-gray-100 h-screen text-black max-w-md mx-auto">
        <div class="flex-grow bg-gray-100">
            <div class="navbar">
                <div class="navbar-start">
                    <a href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" id="back">
                            <path
                                d="M22,15H12.41l2.3-2.29a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L12.41,17H22a1,1,0,0,0,0-2Z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="navbar-center mt-5">
                    <a class="btn btn-ghost text-lg">Rekapitulasi</a>
                </div>
                <div class="navbar-end">
                </div>
            </div>
            <div class="px-4 py-2 text-start h-[200px] bg-cover ml-3"
                style="background-image: url({{ asset('storage/src/image/bg-dashboard\(1\).png') }});">
                @yield('header')
            </div>
            @yield('content')
        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/sw.js') }}"></script>
</body>

</html>

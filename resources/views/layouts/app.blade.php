<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

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
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Livewire styles --}}
    @livewireStyles

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body class="font-sans antialiased">
    <div>
        <div class="h-screen text-black bg-gray-100">
            <div class="flex-grow bg-gray-100">
                <!-- Page Heading -->
                @if (isset($header))
                    <header>
                        {{ $header }}

                        <!-- Header for Tablet and Desktop -->
                        <div class="w-full fixed z-10 hidden md:block lg:block">
                            <div class="navbar bg-white">
                                <div class="navbar-start">
                                    <img src="{{ asset('storage/src/image/logo.png') }}" alt="">
                                    <a class="btn btn-ghost text-xl font-tienne text-[28px]">Tropicare</a>
                                </div>
                            </div>
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="pb-28 z-0 md:pt-[80px] lg:pt-[80px]">
                    @include('components.sidebar')
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    @if (@isset($AddScript))
        {{ $AddScript }}
    @endif
</body>

</html>

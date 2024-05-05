<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-primary-first">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tropicare') }} | Authentication</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tienne:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    {{-- Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="max-h-screen flex flex-col bg-primary-first text-white bg-cover relative antialiased"
    background="src/image/Login-minimalist.png">
    <div class="relative xl:container px-6 mb-10 text-gray-500 md:px-12">
        <div class="m-auto space-y-8 md:w-4/5 lg:3/5">
            <div class="md:py-12">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>

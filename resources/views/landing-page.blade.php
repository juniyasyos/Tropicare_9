<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-primary-first">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tropicare | Landing page</title>

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

<body class="max-h-screen flex flex-col bg-primary-first text-white antialiased">
    <div class="absolute w-4/5 h-screen overflow-hidden bg-no-repeat md:hidden lg:hidden"
        style="background-image: url({{ asset('storage/src/image/login-minimalist.png') }});"></div>
    <div class="relative sm:py-16 lg:mt-[-50px] md:mt-[-30px]">
        <div class="relative xl:container m-auto px-6 mb-10 text-gray-500 md:px-12">
            <div class="hidden md:block lg:block">
                @if (Route::has('login'))
                    <div class="navbar bg-white rounded-lg">
                        <div class="navbar-start">
                            <img src="{{ asset('storage/src/image/logo.png') }}" alt="">
                            <a class="btn btn-ghost text-xl font-tienne text-[28px]">Tropicare</a>
                        </div>
                        @auth
                            <div class="navbar-end mr-4">
                                <a href="{{ url('dashboard') }}"
                                    class="btn w-32 bg-blue-500 border-none text-white">Dashboard</a>
                            </div>
                            {{-- @else
                            <div class="navbar-end mr-4 space-x-4">
                                <a href="{{ route('register') }}" class="btn w-32 bg-blue-500 border-none text-white">Sign
                                    up</a>
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="btn w-32 btn-outline">Login</a>
                                @endif
                            </div> --}}
                        @endauth
                    </div>
                @endif
            </div>
            <div class="md:flex lg:flex">
                <div class="">
                    <div class="m-auto space-y-8 sm:w-4/5 md:w-4/5 lg:w-4/5">
                        <div class="md:py-12">
                            <p class="text-[15px] text-white font-alata mt-10">ggroupstudio</p>
                            <div class="w-[50px] h-[3px] bg-white mt-1 rounded-full mb-12"></div>
                            <h2 class="mb-5 text-[32px] font-bold text-white font-tienne md:lg:text-[52px]">
                                Selamat Datang di <span class="md:hidden lg:hidden"><br>Tropicare</span><span
                                    class="hidden md:block lg:block">Tropicare</span><span
                                    class="text-[10px] text-white font-alata font-normal bg-transparent px-[10px] py-[1px] rounded-full border md:hidden lg:hidden">beta</span>
                            </h2>
                            <p class="text-[12px] text-white font-alata md:lg:text-[18px]">Buka pintu menuju perkebunan
                                yang sejahtera dengan
                                aplikasi pendeteksi penyakit kami!</p>
                        </div>
                        <div class="absolute right-0 md:hidden lg:hidden">
                            <img src="{{ asset('storage/src/image/image_landing.png') }}" alt="">
                        </div>
                    </div>
                    <a href="{{ route('login') }}"
                        class="btn btn-primary relative flex h-11 w-full items-center justify-center px-6 mt-[440px] rounded-full text-white font-bold text-[16px] bg-gray-900 font-inter hover:bg-white hover:text-gray-900 hover:border-2 hover:border-gray-900 md:w-2/5 lg:w-2/5 md:mt-[10px] lg:mt-[-10px] md:ml-12 lg:ml-20 md:rounded-lg lg:rounded-lg"
                        style="border: none;">
                        Lanjutkan
                    </a>
                </div>
                <div class="m-auto space-y-8 mt-14 hidden lg:block md:block">
                    <img src="{{ asset('storage/src/image/bg-landingpage-lg.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <footer
        class="footer footer-center p-4 text-base-content absolute bottom-0 md:bg-base-300 lg:bg-base-300 hidden md:block lg:block">
        <aside>
            <p>Copyright © 2024 - Kelompok 7</p>
            <p>PPL AGRO D</p>
        </aside>
    </footer>
</body>

</html>

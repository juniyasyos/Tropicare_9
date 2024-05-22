<x-app-layout>
    <x-slot name="header">
        <div class="navbar sm:block md:hidden lg:hidden">
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
                <a class="btn btn-ghost text-lg">Deteksi Penyakit</a>
            </div>
            <div class="navbar-end">
            </div>
        </div>
    </x-slot>

    <div class="md:p-4 md:ml-64">
        <div class="bg-white h-auto rounded-lg">
            <div class="pt-6 pb-3">
                <div class="text-center sm:text-left ml-4">
                    <div class="text-sm breadcrumbs hidden md:block lg:block">
                        <ul>
                            <li>
                                <a href="{{ route('dashboard') }}" class="font-semibold text-lg">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="text-lg">
                                    Deteksi
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6 mt-[-20px]">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 justify-center">
                    <!-- Deteksi Baru -->
                    <a href="{{ route('detection.detect') }}"
                        class="flex flex-col items-center justify-center bg-white cursor-pointer dark:bg-gray-800 rounded-lg shadow-lg p-6 h-48 transform hover:scale-105 transition-transform border border-gray-300">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-primary-first p-2 rounded-full">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 4v16m-8-8h16" />
                                </svg>
                            </div>
                            <p class="text-xl font-semibold text-primary-first">
                                Deteksi Baru
                            </p>
                        </div>
                    </a>

                    <!-- Penjelasan mengenai deteksinya -->
                    <div class="mb-6 col-span-2 ml-5">
                        <h1 class="text-lg md:text-xl lg:text-2xl font-semibold text-gray-800 dark:text-gray-200">
                            Deteksi Penyakit pada Pepaya
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm lg:text-lg">
                            Identifikasi penyakit pepaya secara cepat dan akurat. Dapatkan panduan langkah-langkah
                            efektif untuk penanganan segera dan lindungi tanaman Anda.
                        </p>
                    </div>

                </div>
                <!-- Divider -->
                <div class="border-t border-gray-300 dark:border-gray-700 mt-6 col-span-3"></div>

                {{-- History --}}
                <div class="flex bg-white mt-5 justify-between items-center col-span-3">
                    <h1 class="text-[16px] font-semibold text-gray-500 dark:text-gray-200">
                        Histori Deteksi
                    </h1>
                </div>

                {{-- List History --}}

                <div class="grid gap-4 my-4 grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                    <div
                        class="max-w-xs mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img src="https://source.unsplash.com/random/800x600?papaya" alt="Papaya Image"
                                class="rounded-lg shadow-lg w-10/11 h-auto">
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5
                                    class="mb-2 text-md md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Antracnose
                                </h5>
                            </a>
                            <p class="mb-3 text-sm md:text-lg font-normal text-gray-700 dark:text-gray-400">
                                2 Mai 2024
                            </p>
                            <div class="w-full flex justify-end">
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-xs mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img src="https://source.unsplash.com/random/800x600?papaya" alt="Papaya Image"
                                class="rounded-lg shadow-lg w-10/11 h-auto">
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5
                                    class="mb-2 text-md md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Antracnose
                                </h5>
                            </a>
                            <p class="mb-3 text-sm md:text-lg font-normal text-gray-700 dark:text-gray-400">
                                2 Mai 2024
                            </p>
                            <div class="w-full flex justify-end">
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-xs mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img src="https://source.unsplash.com/random/800x600?papaya" alt="Papaya Image"
                                class="rounded-lg shadow-lg w-10/11 h-auto">
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5
                                    class="mb-2 text-md md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Antracnose
                                </h5>
                            </a>
                            <p class="mb-3 text-sm md:text-lg font-normal text-gray-700 dark:text-gray-400">
                                2 Mai 2024
                            </p>
                            <div class="w-full flex justify-end">
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-xs mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img src="https://source.unsplash.com/random/800x600?papaya" alt="Papaya Image"
                                class="rounded-lg shadow-lg w-10/11 h-auto">
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5
                                    class="mb-2 text-md md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Antracnose
                                </h5>
                            </a>
                            <p class="mb-3 text-sm md:text-lg font-normal text-gray-700 dark:text-gray-400">
                                2 Mai 2024
                            </p>
                            <div class="w-full flex justify-end">
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex mt-5 justify-center md:justify-end items-center col-span-3">
                    <a href="{{ route('detection.history') }}"
                        class="text-[16px] font-semibold text-white btn bg-primary-first px-10 w-8/12 md:w-2/12">
                        Semua histori
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

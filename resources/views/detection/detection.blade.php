<x-app-layout>
    <x-slot name="header">
        <!-- Header for Tablet and Desktop -->
        <div class="w-full fixed hidden md:block lg:block">
            <div class="navbar bg-white">
                <div class="navbar-start">
                    <img src="{{ asset('storage/src/image/logo.png') }}" alt="">
                    <a class="btn btn-ghost text-xl font-tienne text-[28px]">Tropicare</a>
                </div>
            </div>
        </div>

        <div class="navbar sm:block md:hidden lg:hidden mt-2 bg-white stroke-slate-500">
            <div class="navbar-start">
                <a href="{{ route('detection.show') }}">
                    <a href="{{ route('dashboard') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                </a>
            </div>
            <div class="navbar-center">
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
                                <a href="{{ route('detection.show') }}" class="font-semibold text-lg">
                                    Deteksi Penyakit
                                </a>
                            </li>
                            <li>
                                <a class=" text-lg">
                                    Deteksi baru
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6 mt-[-60px] md:mt-[-40px]">
                <div class="flex flex-col md:flex-row md:space-x-6 mb-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl mt-5 pb-14 w-full">
                        <div class="px-4 py-6 space-y-8">
                            <div class="w-full p-6 flex flex-col">
                                <div class="text-center">
                                    <h1
                                        class="font-alata text-[14px] md:text-[16px] lg:text-[18px] font-extralight text-center">
                                        Deteksi penyakit tanaman Anda menggunakan teknologi kami
                                    </h1>
                                </div>
                                <livewire:detection.detect-form />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="AddScript">
        <script src="{{ asset('storage/src/js/file_picker.js') }}"></script>
    </x-slot>
</x-app-layout>

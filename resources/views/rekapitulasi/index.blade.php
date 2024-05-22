<x-app-layout>
    <x-slot name="header">
        <div class="navbar sm:block md:hidden lg:hidden">
            <div class="navbar-start">
                <button href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" id="back">
                        <path
                            d="M22,15H12.41l2.3-2.29a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L12.41,17H22a1,1,0,0,0,0-2Z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="navbar-center mt-5">
                <a class="btn btn-ghost text-lg">Rekapitulasi</a>
            </div>
            <div class="navbar-end">
            </div>
        </div>

        <div class="max-w-md md:hidden">
            <div class="flex-grow">
                <!-- Header -->
                <div class="flex justify-center items-center mt-[20px] space-x-5">
                    <img src="{{ asset('storage/src/image/img_rekapitulasi.png') }}" alt="" class="w-36 ml-8">
                    <div class="space-y-3">
                        <h1 class="font-semibold font-inter">Dari yang kompleks menjadi simple</h1>
                        <p class="text-[12px]">Atur bisnis lebih praktis dengan beragam layanan dengan aplikasi kami
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="lg:p-4 md:ml-64 mt-5">
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
                                    Rekapitulasi
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6 mt-[-50px]">
                <div class="flex flex-col md:flex-row items-center justify-center md:justify-start gap-6 my-6">
                    <!-- Banner Rekapitulasi -->
                    <div
                        class="bg-white cursor-pointer dark:bg-gray-800 rounded-lg p-6 h-auto md:h-48 transform hover:scale-105 transition-transform hidden md:block">
                        <img src="{{ asset('storage/src/image/img_rekapitulasi.png') }}" alt="Banner Rekapitulasi"
                            class="w-44 h-auto object-cover">
                    </div>

                    <!-- Penyambutan -->
                    <div class="flex flex-col items-center md:items-start">
                        <h1 class="font-semibold font-inter text-center md:text-left hidden md:block md:text-2xl">Dari
                            yang kompleks
                            menjadi
                            sederhana</h1>
                        <p class="text-sm text-center md:text-left hidden md:block mt-4">Atur bisnis Anda dengan lebih
                            praktis melalui
                            berbagai layanan dalam aplikasi kami.</p>
                    </div>
                </div>

                <div class="border-t border-gray-300 dark:border-gray-700 mt-6 col-span-3 my-5 hidden md:block"></div>

                {{-- List Fitur --}}
                <div class="container mx-auto p-4 mt-[-30px] md:mt-5">
                    <div class="grid gap-4 md:gap-6 grid-cols-1 md:grid-cols-2">
                        <!-- Penjualan -->
                        @include('rekapitulasi.partials.card-penjualan')

                        <!-- Pengeluaran -->
                        @include('rekapitulasi.partials.card-pengeluaran')
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <!-- Divider -->
                    <div class="border-t border-gray-300 dark:border-gray-700 mt-6 col-span-3 my-5 md:hidden"></div>

                    {{-- Laporan --}}
                    @include('rekapitulasi.partials.card-laporan')
                </div>
            </div>
        </div>
    </div>

    <x-slot name="AddScript">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @livewire('rekapitulasi.partials.card-monthly-laporan')
    </x-slot>
</x-app-layout>

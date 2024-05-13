<x-app-layout>
    <x-slot name="header">
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
        <div class="max-w-md">
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
    <div class="h-screen bg-primary-first border-gray-600 rounded-md p-3 mt-5">
        <div class="h-[5px] w-[100px] bg-gray-200 rounded-full mx-auto"></div>
        <a href="{{ route('rekapitulasi.penjualan') }}"
            class="px-4 space-y-8 mt-5 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
            <div
                class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow flex space-x-5 items-center justify-center cursor-pointer transition duration-300 transform hover:scale-105">
                <img src="{{ asset('storage/src/image/cart.png') }}" alt="" class="w-16 rounded-md">
                <div>
                    <h5 class="mb-2 text-xl font-semibold text-gray-700 tracking-tight font-inter">Penjualan</h5>
                    <p class="mb-3 font-normal text-[12px] font-inter">Penjualan bukan Hanya Angka, tapi Kisah
                        Kesuksesan yang Dibangun Bersama</p>
                </div>
            </div>
        </a>

        <a href="{{ route('rekapitulasi.pengeluaran') }}"
            class="px-4 space-y-8 mt-5 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
            <div
                class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow flex space-x-5 items-center justify-center cursor-pointer transition duration-300 transform hover:scale-105">
                <img src="{{ asset('storage/src/image/pengeluaran.png') }}" alt="" class="w-16 rounded-md">
                <div>
                    <h5 class="mb-2 text-xl font-semibold text-gray-700 tracking-tight font-inter">Pengeluaran</h5>
                    <p class="mb-3 font-normal text-[12px] font-inter">Setiap Rupiah yang Dikeluarkan, Setiap Keputusan
                        yang Dicermati</p>
                </div>
            </div>
        </a>

        <a href="{{ route('rekapitulasi.laporan') }}"
            class="px-4 space-y-8 mt-5 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
            <div
                class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow flex space-x-5 items-center justify-center cursor-pointer transition duration-300 transform hover:scale-105">
                <img src="{{ asset('storage/src/image/laporan.png') }}" alt="" class="w-20 -ml-3 rounded-md">
                <div>
                    <p class="mb-2 mr-5 text-xl font-semibold text-gray-700 tracking-tight font-inter ml-[-12px]">
                        Laporan</p>
                    <p class="mb-3 mr-5 font-normal text-[12px] font-inter ml-[-12px]">Laporan Analitis untuk Sukses
                        Bisnis Buah Anda</p>
                </div>
            </div>
        </a>
    </div>
</x-app-layout>

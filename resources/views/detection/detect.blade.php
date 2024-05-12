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
                <a class="btn btn-ghost text-lg">Scan Penyakit</a>
            </div>
            <div class="navbar-end">
            </div>
        </div>
    </x-slot>

    <div class="bg-white h-screen rounded-xl mt-5 pb-14">
        <div class="px-4 space-y-8">
            <div class="min-w-md p-6 flex flex-col mb-32">
                <div class="flex justify-center">
                    <h1 class="font-alata text-[14px] mt-3 font-extralight">Deteksi penyakit tanaman anda menggunakan
                        teknologi kami</h1>
                </div>
                <livewire:upload-detection-form />
            </div>
        </div>
    </div>
</x-app-layout>

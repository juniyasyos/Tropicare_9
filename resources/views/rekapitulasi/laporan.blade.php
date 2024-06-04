<x-app-layout>
    <x-slot name="header">
        <div class="navbar sm:block md:hidden lg:hidden">
            <div class="navbar-start">
                <a href="{{ route('dashboard') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="navbar-center">
                <a class="btn btn-ghost text-lg">Laporan</a>
            </div>
            <div class="navbar-end">
            </div>
        </div>
    </x-slot>

    <div class="lg:p-4 md:ml-64">
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
                                <a href="{{ route('rekapitulasi.show') }}" class="text-lg font-semibold">
                                    Rekapitulasi
                                </a>
                            </li>
                            <li>
                                <h1 class="text-lg ">
                                    Laporan
                                </h1>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @livewire('rekapitulasi.laporan-section')
        </div>
    </div>
</x-app-layout>

<div class="h-screen mt-[-15px] rounded-sm">
    <div class="mt-4 p-6 bg-white flex items-center space-x-6">
        <div>
            <h2 class="font-inter text-[18px] text-gray-900 font-semibold mb-1">Laporan</h2>
            <p class="font-inter text-[20px] text-gray-700 font-bold">Rp{{ number_format($allTransaction) }}</p>
        </div>
    </div>

    <div class="bg-primary-first p-6 rounded-sm shadow-lg">
        <div class="flex flex-row justify-between items-center">
            <div class="text-left mb-4 sm:mb-0">
                <h1 class="font-inter text-[18px] text-white font-semibold">{{ $selectedMonth }}</h1>
                <h1 class="font-inter text-[12px] text-white font-normal">
                    {{ \Carbon\Carbon::parse($startDate)->translatedFormat('j F') }} -
                    {{ \Carbon\Carbon::parse($endDate)->translatedFormat('j F Y') }}
                </h1>
            </div>
            <div class="flex justify-center space-x-4">
                <button wire:click="filterDate('prev')" class="btn bg-white rounded-full flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <button wire:click="filterDate('next')" class="btn bg-white rounded-full flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 pb-20">

    </div>
</div>

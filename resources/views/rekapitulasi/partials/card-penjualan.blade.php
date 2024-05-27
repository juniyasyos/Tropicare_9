{{-- Penjualan --}}
<div
    class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 flex flex-col justify-between transform transition-all duration-300 hover:bg-gray-100 active:bg-gray-200 cursor-pointer border border-gray-200">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <div class="w-8 h-8">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128" viewBox="0 0 128 128"
                id="growth">
                <path fill="#353534"
                    d="M123.2 42.2l-8.4-39.7c-.1-.5-.4-.8-.7-.9-.2-.2-.6-.3-1.2-.2-.2 0-.3.1-.5.2L77.8 22.3c-.7.4-1 1.4-.5 2.1.2.3.4.5.7.6l9.5 4.1-1.9 4.9C85 35.7 70.5 72.6 12.7 72.6c-2.2 0-4.6-.1-6.9-.2l-.3 0c0 0 0 0 0 0-.2 0-.3.1-.5.2-.1.1-.2.3-.2.5 0 .3.2.6.5.7l.2.1C18 78.1 31 80.3 44.2 80.5c47.7 0 64.8-35.5 65-35.9l2.3-4.9 9.7 4.2c.4.2.9.1 1.1 0 .3-.1.6-.3.8-.8C123.3 42.8 123.3 42.5 123.2 42.2zM11.6 126.7h24.9V90.6c-8.4-.6-16.7-1.9-24.9-4V126.7zM91.5 77.9v48.8h24.9V53.2l-.1 0C112.7 58.9 104.8 69.4 91.5 77.9zM51.5 126.7h24.9V85.4C69.2 88.1 61 90 51.5 90.7V126.7z">
                </path>
            </svg>
        </div>
        <div class="text-lg text-gray-800 dark:text-gray-300 font-semibold">
            Penjualan
        </div>
    </div>
    <!-- Deskripsi -->
    <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
        Total penjualan bulan ini
    </div>
    <!-- Nilai/Statistik -->
    <div class="text-2xl text-gray-800 dark:text-gray-100 font-bold mt-4">
        Rp{{ number_format($totalIncome) }}
    </div>
    <!-- Tombol -->
    <div class="mt-4">
        <a href="{{ route('rekapitulasi.penjualan') }}"
            class="btn w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-500 active:bg-green-600 transition-colors duration-300">
            Detail Penjualan
        </a>
    </div>
</div>

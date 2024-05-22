<div class="col-span-3 w-[105%] md:w-full bg-white rounded-lg shadow border border-gray-200 dark:bg-gray-800 p-4 md:p-6 md:mt-10">
    <h1 class="font-bold text-2xl text-gray-900 mb-5">Laporan</h1>
    <div class="flex justify-start mb-5">
        <div class="grid grid-cols-2 gap-5">
            <div>
                <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                    Pendapatan
                    <svg data-popover-target="pendapatan-info" data-popover-placement="bottom"
                        class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div data-popover id="pendapatan-info" role="tooltip"
                        class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth - Incremental</h3>
                            <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should
                                have a growing trend, as stagnating chart signifies a significant decrease of community
                                activity.</p>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                            <p>For each date bucket, the all-time volume of activities is calculated. This means that
                                activities in period n contain all activities up to period n, plus the activities generated
                                by your community in period.</p>
                        </div>
                    </div>
                </h5>
                <p class="text-green-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">IDR {{ number_format(($totalIncome/1000),1)}}</p>
            </div>
            <div>
                <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                    Pengeluaran
                    <svg data-popover-target="pengeluaran-info" data-popover-placement="bottom"
                        class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div data-popover id="pengeluaran-info" role="tooltip"
                        class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth - Incremental</h3>
                            <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should
                                have a growing trend, as stagnating chart signifies a significant decrease of community
                                activity.</p>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                            <p>For each date bucket, the all-time volume of activities is calculated. This means that
                                activities in period n contain all activities up to period n, plus the activities generated
                                by your community in period.</p>
                        </div>
                    </div>
                </h5>
                <p class="text-red-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">IDR {{ number_format(($totalExpenditure/1000), 1) }}</p>
            </div>
        </div>
    </div>
    <div id="line-chart" class="z-10"></div>
    <div class="pt-5 flex justify-end md:justify-start">
        <a href="{{ route('rekapitulasi.laporan') }}"
            class="btn bg-primary-first text-white focus:ring-1 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-3.5 h-3.5 text-white me-2 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                <path
                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z" />
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
            </svg>
            Lihat Seluruh Laporan
        </a>
    </div>
</div>

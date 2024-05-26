<div class="container mx-auto p-6 mt-[-50px]">
    {{-- Filters --}}
    <div id="accordion-open" data-accordion="open">
        <h2 id="accordion-open-filter" class="flex justify-end">
            <button type="button" class="btn bg-transparent border-none"
                data-accordion-target="#accordion-open-filter-body" aria-expanded="false"
                aria-controls="accordion-open-filter-body">
                <a class="text-blue-700">
                    Filter
                </a>
            </button>
        </h2>
        <div id="accordion-open-filter-body" class="hidden transition-all duration-500 ease-in-out transform"
            aria-labelledby="accordion-open-filter">
            <div class="rounded-xl border border-gray-200 bg-white p-6">
                <h2 class="text-stone-700 text-xl font-bold">Filter Laporan</h2>
                <p class="mt-1 text-sm">Gunakan filter untuk menganalisis laporan anda dari tahun dan bulan
                </p>
                <form wire:submit.prevent="update">
                    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <div class="flex flex-col">
                            <label for="range" class="text-stone-600 text-sm font-medium">Range</label>
                            <select wire:model.lazy="filter_range" id="range"
                                class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="Bulanan">Bulanan</option>
                                <option value="Tahunan">Tahunan</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="date_start" class="text-stone-600 text-sm font-medium">Awal</label>
                            <input type="date" wire:model.defer="filter_date_start" id="date_start"
                                class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>
                        <div class="flex flex-col">
                            <label for="date_end" class="text-stone-600 text-sm font-medium">Akhir</label>
                            <input type="date" wire:model.defer="filter_date_end" id="date_end"
                                class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>
                    </div>
                    <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                        <button type="button" wire:click="resetFilters"
                            class="active:scale-95 rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>
                        <button type="submit"
                            class="active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none focus:ring hover:opacity-90">Terapkan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div
        class="col-span-3 w-[105%] md:w-full bg-white rounded-lg shadow border border-gray-200 dark:bg-gray-800 p-4 md:p-6 md:mt-10">
        {{-- {{ $filter_date_start }}
        {{ $filter_date_end }}
        {{ $filter_range }}
        {{ $chartData }} --}}
        <div class="flex justify-start mb-5">
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                        Pendapatan
                        <svg data-popover-target="pendapatan-info" data-popover-placement="bottom"
                            class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div data-popover id="pendapatan-info" role="tooltip"
                            class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth -
                                    Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities.
                                    Ideally, the chart should
                                    have a growing trend, as stagnating chart signifies a significant
                                    decrease of community
                                    activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is
                                    calculated. This means that
                                    activities in period n contain all activities up to period n, plus
                                    the activities generated
                                    by your community in period.</p>
                            </div>
                        </div>
                    </h5>
                    {{-- <p class="text-green-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">IDR {{ number_format(($totalIncome/1000),1)}}</p> --}}
                    <p class="text-green-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">
                        IDR 100,00</p>
                </div>
                <div>
                    <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                        Pengeluaran
                        <svg data-popover-target="pengeluaran-info" data-popover-placement="bottom"
                            class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div data-popover id="pengeluaran-info" role="tooltip"
                            class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth -
                                    Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities.
                                    Ideally, the chart should
                                    have a growing trend, as stagnating chart signifies a significant
                                    decrease of community
                                    activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is
                                    calculated. This means that
                                    activities in period n contain all activities up to period n, plus
                                    the activities generated
                                    by your community in period.</p>
                            </div>
                        </div>
                    </h5>
                    {{-- <p class="text-red-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">IDR {{ number_format(($totalExpenditure/1000), 1) }}</p> --}}
                    <p class="text-red-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">
                        IDR 100,00</p>
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
    <x-slot name="AddScript">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            const data = @json($chartData);

            // Function to check if the screen width is less than a certain value (e.g., 768px for mobile)
            function isMobileView() {
                return window.innerWidth < 768;
            }

            // Define the chart options
            const options = {
                chart: {
                    height: "100%",
                    maxWidth: "90%",
                    type: "line",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: true,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -26
                    },
                },
                series: [{
                        name: "Pengeluaran",
                        data: data.map(item => item.expenditure),
                        color: "#F98080",
                    },
                    {
                        name: "Penjualan",
                        data: data.map(item => item.transaction),
                        color: "#31C48D",
                    },
                ],
                legend: {
                    show: true
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: data.map(item => item.dateLabel),
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400 hidden md:block'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: !isMobileView(), // Conditionally show y-axis based on screen size
                },
            };

            // Function to re-render the chart on window resize
            function renderChart() {
                if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("line-chart"), options);
                    chart.render();
                }
            }

            // Render the chart initially
            renderChart();

            // Add event listener for window resize to re-render the chart
            window.addEventListener('resize', function() {
                options.yaxis.show = !isMobileView();
                renderChart();
            });
        </script>
    </x-slot>
</div>

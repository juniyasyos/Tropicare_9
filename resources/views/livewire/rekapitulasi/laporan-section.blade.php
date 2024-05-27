<div class="container mx-auto p-6 mt-[-50px]">
    {{-- Filters --}}
    <div id="accordion-open" data-accordion="open">
        <h2 id="accordion-open-filter" class="flex justify-end">
            <button type="button" class="btn bg-transparent border-none"
                data-accordion-target="#accordion-open-filter-body" aria-expanded="true"
                aria-controls="accordion-open-filter-body">
                <a class="text-blue-700">Filter</a>
            </button>
        </h2>
        <div id="accordion-open-filter-body" class="hidden transition-all duration-500 ease-in-out transform"
            aria-labelledby="accordion-open-filter">
            <div class="rounded-xl border border-gray-200 bg-white p-6">
                <h2 class="text-stone-700 text-xl font-bold">Filter Laporan</h2>
                <p class="mt-1 text-sm">Gunakan filter untuk menganalisis laporan anda dari tahun dan bulan</p>
                <form wire:submit.prevent="update">
                    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <div class="flex flex-col">
                            <label for="range" class="text-stone-600 text-sm font-medium">Range</label>
                            <select wire:model.defer="filter_range" id="range"
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
                                <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth - Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart
                                    should have a growing trend, as stagnating chart signifies a significant decrease of
                                    community activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is calculated. This means
                                    that activities in period n contain all activities up to period n, plus the
                                    activities generated by your community in period.</p>
                            </div>
                        </div>
                    </h5>
                    <p class="text-green-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">IDR
                        {{ number_format($all_transaction) }}</p>
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
                                <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth - Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart
                                    should have a growing trend, as stagnating chart signifies a significant decrease of
                                    community activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is calculated. This means
                                    that activities in period n contain all activities up to period n, plus the
                                    activities generated by your community in period.</p>
                            </div>
                        </div>
                    </h5>
                    <p class="text-red-400 dark:text-white text-md md:text-xl lg:text-3xl leading-none font-bold">IDR
                        {{ number_format($all_expenditure) }}</p>
                </div>
            </div>
        </div>
        <div id="line-chart" class="w-full md:mt-4"></div>
    </div>
    <div class="container mx-auto p-4 mt-[-30px] md:mt-10">
        <div class="grid gap-4 md:gap-6 grid-cols-2 md:grid-cols-3">
            <!-- Penjualan -->
            <div
                class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 flex flex-col justify-between transform transition-all duration-300 hover:bg-gray-100 active:bg-gray-200 cursor-pointer border border-gray-200">
                <!-- Header -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128"
                            viewBox="0 0 128 128" id="growth">
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
                    Rp{{ number_format($averageTransaction) }}
                </div>
                <div class="text-2xl text-gray-800 dark:text-gray-100 font-bold mt-4">
                    Rp{{ number_format($averageExpenditure) }}
                </div>
            </div>

            <!-- Pengeluaran -->
            {{-- <div
                class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 flex flex-col justify-between transform transition-all duration-300 hover:bg-gray-100 active:bg-gray-200 cursor-pointer border border-gray-200">
                <!-- Header -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"
                            image-rendering="optimizeQuality" shape-rendering="geometricPrecision"
                            text-rendering="geometricPrecision" viewBox="0 0 6.827 6.827" id="expenses">
                            <path
                                d="M3.13317 3.38863c-0.0410827,0 -0.0745315,0.0335787 -0.0745315,0.0746535l7.87402e-006 2.73166c0,0.0410748 0.0334291,0.0745157 0.0745079,0.0745157l2.0054 -3.93701e-006c0.0412047,0 0.0746339,-0.0334291 0.0746339,-0.0745079l1.1811e-005 -2.73166c0,-0.0410748 -0.0334488,-0.0746496 -0.0746614,-0.0746496l-2.00537 -3.93701e-006zm2.00538 3.03804l-2.00538 0c-0.127732,0 -0.23174,-0.103984 -0.23174,-0.23172l7.87402e-006 -2.73166c0,-0.12774 0.10398,-0.231858 0.231717,-0.231858l2.0054 -3.93701e-006c0.127854,0 0.231843,0.10413 0.231843,0.231862l1.1811e-005 2.73166c0,0.12774 -0.104,0.231728 -0.231854,0.231724z">
                            </path>
                            <path
                                d="M3.30841 4.69858l.195008 0 0-.195012-.195008 0 0 .195012zm.27361.157209l-.352217 0c-.0434173 0-.0786339-.0352047-.0786339-.0785984l.0000275591-.352228c0-.0433976.0351772-.0786024.0785787-.0786024l.352244 0c.0433898 0 .0785787.0352126.0785787.0786024l.0000275591.352224c0 .0433898-.0352323.0786063-.0786063.0786024zM3.30841 5.3412l.195008 0 0-.195012-.195008 0 0 .195012zm.27361.157213l-.352217 0c-.0434173 0-.0786339-.0352047-.0786339-.0786024l.0000275591-.352224c0-.0433937.0351772-.0785984.0785787-.0785984l.352244-.00000787402c.0433898 0 .0785787.0352126.0785787.0786142l.0000275591.352213c0 .0433976-.0352323.0786102-.0786063.0786063zM3.30841 5.98382l.195008 0 0-.195008-.195008 0 0 .195008zm.27361.157209l-.352217 0c-.0434173 0-.0786339-.0352008-.0786339-.0785984l.0000275591-.352224c0-.0435315.0351772-.0786063.0785787-.0786063l.352244 0c.0433898 0 .0785787.0350748.0785787.0786063l.0000275591.352217c0 .0433976-.0352323.0786142-.0786063.0786063zM4.03835 4.69858l.195008 0 0-.195012-.195008 0 0 .195012zm.273614.157209l-.352217 0c-.0434173 0-.078626-.0352047-.078626-.0785984l.000019685-.352228c0-.0433976.035189-.0786024.0785866-.0786024l.352236 0c.0433858 0 .0785906.0352126.0785906.0786024l.000015748.352224c0 .0433898-.0352244.0786063-.0786063.0786024zM4.03835 5.3412l.195008 0 0-.195012-.195008 0 0 .195012zm.273614.157213l-.352217 0c-.0434173 0-.078626-.0352047-.078626-.0786024l.000019685-.352224c0-.0433937.035189-.0785984.0785866-.0785984l.352236-.00000787402c.0433858 0 .0785906.0352126.0785906.0786142l.000015748.352213c0 .0433976-.0352244.0786102-.0786063.0786063zM4.03835 5.98382l.195008 0 0-.195008-.195008 0 0 .195008zm.273614.157209l-.352217 0c-.0434173 0-.078626-.0352008-.078626-.0785984l.000019685-.352224c0-.0435315.035189-.0786063.0785866-.0786063l.352236 0c.0433858 0 .0785906.0350748.0785906.0786063l.000015748.352217c0 .0433976-.0352244.0786142-.0786063.0786063zM4.76831 4.69858l.195008 0 0-.195012-.195008 0 0 .195012zm.273614.157209l-.35222 0c-.0433819 0-.0786102-.0352047-.0786102-.0785984l.00000787402-.352228c0-.0433976.0352008-.0786024.0785945-.0786024l.352228 0c.0435394 0 .0785945.0352126.0785945.0786024l.00000787402.352224c0 .0433898-.0350709.0786063-.0786024.0786024zM4.76831 5.3412l.195008 0 0-.195012-.195008 0 0 .195012zm.273614.157213l-.35222 0c-.0433819 0-.0786102-.0352047-.0786102-.0786024l.00000787402-.352224c0-.0433937.0352008-.0785984.0785945-.0785984l.352228-.00000787402c.0435394 0 .0785945.0352126.0785945.0786142l.00000787402.352213c0 .0433976-.0350709.0786102-.0786024.0786063zM4.76831 5.98382l.195008 0 0-.195008-.195008 0 0 .195008zm.273614.157209l-.35222 0c-.0433819 0-.0786102-.0352008-.0786102-.0785984l.00000787402-.352224c0-.0435315.0352008-.0786063.0785945-.0786063l.352228 0c.0435394 0 .0785945.0350748.0785945.0786063l.00000787402.352217c0 .0433976-.0350709.0786142-.0786024.0786063z">
                            </path>
                            <path
                                d="M2.98004 5.76698l-0.478846 0c-0.0434173,0 -0.0786299,-0.0352008 -0.0786299,-0.0785984l2.3622e-005 -4.33475c0,-0.0435315 0.035185,-0.0785984 0.0785787,-0.0785984 0.0434173,-3.93701e-006 0.0786063,0.0350669 0.0786063,0.0786024l2.75591e-005 4.25613 0.40024 0c0.0433858,0 0.0785945,0.0352126 0.0785945,0.0786102 7.87402e-006,0.0433937 -0.0352087,0.0786063 -0.0785945,0.0785984zm2.79063 0l-0.478878 0c-0.0433858,0 -0.0786142,-0.0352008 -0.0786142,-0.0785984 1.1811e-005,-0.0434016 0.0352047,-0.0786024 0.0786024,-0.0786024l0.400283 -7.87402e-006 0 -5.05256 -3.91349 0c-0.0433858,0 -0.0786102,-0.0352047 -0.0786102,-0.0786024 7.87402e-006,-0.0433937 0.0352087,-0.0786024 0.0786063,-0.0786024l3.9921 -3.93701e-006c0.0433858,0 0.0785787,0.0352126 0.0785787,0.0786063l2.75591e-005 5.20976c0,0.0434016 -0.0352362,0.0786142 -0.0786063,0.0786063z">
                            </path>
                            <path
                                d="M1.13774 1.27503l1.28169 0c-.0320551-.402445-.307189-.717815-.64085-.717815-.333638-.00000393701-.608783.315378-.640843.717815zm1.36346.157209l-1.4452 0c-.0433858 0-.0786181-.0352047-.0786181-.0786024.000015748-.525815.359453-.95363.801197-.95363.44176-.00000393701.801197.427819.801197.95363.0000275591.0433937-.0352047.0786063-.0785787.0786024zM3.30841 4.02307l1.65491 0 0-.315791-1.65491 0 0 .315791zm1.73352.157209l-1.81212 0c-.0434173 0-.0786339-.0352047-.0786339-.0786024l.0000275591-.473c0-.0433937.0351772-.0785984.0785787-.0785984l1.81215-.00000787402c.0435394 0 .0785945.0352126.0785945.0786102l.00000787402.472992c0 .0433937-.0350709.0786102-.0786024.0786063zM4.14683 1.5369c-.0433819 0-.0786102-.0352008-.0786102-.0785984l.00000787402-.178094c0-.0433937.0352008-.0786024.0785945-.0786024.0433976 0 .0786063.0352126.0786063.0786063l.00000787402.178083c0 .0434055-.0352165.0786142-.0786063.0786063zM4.12501 2.71626c-.0433898 0-.0786181-.0350709-.0786181-.0785984l.000011811-.178098c0-.0433937.0351929-.0785984.0785945-.0785984.0433937-.00000393701.0786024.0352047.0786024.0786024l.000011811.178091c0 .0435276-.0352205.0786024-.0786024.0786024z">
                            </path>
                            <path
                                d="M4.11067 2.53844c-0.00614173,0 -0.0121457,-0.000137795 -0.0181496,-0.000405512 -0.135776,-0.00683465 -0.293677,-0.0986693 -0.291358,-0.334894 0.000433071,-0.043126 0.0354843,-0.0777835 0.0786024,-0.0777835 0.00015748,-7.87402e-006 0.000409449,0 0.000685039,0 0.0434094,0.000405512 0.0783307,0.0358898 0.0779213,0.0792835 -0.00134646,0.139874 0.0764213,0.173039 0.142063,0.176319 0.0984213,0.0051811 0.197331,-0.0571811 0.203744,-0.128008 0.000149606,-0.00109843 0.000275591,-0.00204724 0.000409449,-0.0031378 0.0173346,-0.132516 -0.157343,-0.206886 -0.211248,-0.226535 -0.228035,-0.0828425 -0.322063,-0.207839 -0.27935,-0.371469 0.0559528,-0.214524 0.236224,-0.289583 0.380063,-0.268563 0.168953,0.0248307 0.282622,0.163764 0.276346,0.338028 -0.00148819,0.042437 -0.036437,0.075874 -0.0784724,0.075874 -0.000948819,0 -0.00190945,-0.000133858 -0.0028622,-0.000133858 -0.043374,-0.00150787 -0.0772402,-0.037937 -0.0757441,-0.0813346 0.00411811,-0.114634 -0.0739606,-0.166898 -0.142059,-0.176862 -0.0735472,-0.0107835 -0.171268,0.0227913 -0.20511,0.152571 -0.0147165,0.0562165 -0.0028622,0.117362 0.180819,0.184094 0.0816102,0.029748 0.344992,0.145614 0.31374,0.393299 -0.0160906,0.165122 -0.190102,0.269661 -0.350039,0.269657z">
                            </path>
                            <path
                                d="M4.13594 1.13337c-0.455264,0 -0.825512,0.370378 -0.825512,0.825634 3.93701e-006,0.455114 0.370232,0.825488 0.825488,0.825488 0.455134,0 0.825488,-0.37037 0.825488,-0.825488 1.1811e-005,-0.45526 -0.370374,-0.82563 -0.825465,-0.825634zm0 1.80833c-0.541913,0 -0.982724,-0.440925 -0.982724,-0.982697 7.87402e-006,-0.541913 0.440787,-0.982835 0.982701,-0.982835 0.541909,-3.93701e-006 0.982697,0.440921 0.982697,0.982835 1.1811e-005,0.541768 -0.440787,0.982697 -0.982673,0.982697z">
                            </path>
                            <rect width="6.827" height="6.827" fill="none"></rect>
                        </svg>
                    </div>
                    <div class="text-lg text-gray-800 dark:text-gray-300 font-semibold">
                        Pengeluaran
                    </div>
                </div>
                <!-- Deskripsi -->
                <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    Total pengeluaran bulan ini
                </div>
                <!-- Nilai/Statistik -->
                <div class="text-2xl text-gray-800 dark:text-gray-100 font-bold mt-4">
                    Rp{{ number_format(100000) }}
                </div>
                <!-- Tombol -->
                <div class="mt-4">
                    <a href="{{ route('rekapitulasi.pengeluaran') }}"
                        class="btn w-full bg-red-700 text-white py-2 rounded-lg hover:bg-red-600 active:bg-red-700 transition-colors duration-300">
                        Lihat Detail
                    </a>
                </div>
            </div> --}}

        </div>
    </div>
</div>

<x-slot name="AddScript">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const initialData = @json($chartData);
            let chart;

            console.log("Initial Data: ", initialData);

            function isMobileView() {
                return window.innerWidth < 768;
            }

            function getChartOptions(data) {
                return {
                    chart: {
                        height: "150%",
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
                        show: !isMobileView(),
                    },
                };
            }

            function renderChart(data) {
                const options = getChartOptions(data);

                if (chart) {
                    chart.destroy();
                }

                if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
                    chart = new ApexCharts(document.getElementById("line-chart"), options);
                    chart.render();
                    console.log("Chart rendered");
                } else {
                    console.error("Element with id 'line-chart' not found or ApexCharts not loaded.");
                }
            }

            renderChart(initialData);

            Livewire.on('chartDataUpdated', (newData) => {
                console.log("Updated Data: ", newData);
                renderChart(newData);
            });

            window.addEventListener('resize', function() {
                if (chart) {
                    const updatedOptions = getChartOptions(chart.w.config.series[0].data);
                    updatedOptions.yaxis.show = !isMobileView();
                    chart.updateOptions(updatedOptions);
                }
            });
        });
    </script>
</x-slot>

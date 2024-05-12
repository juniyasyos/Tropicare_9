<div class="h-screen mt-[-15px] rounded-sm">
    <div class="bg-primary-first">
        <div class="py-6 flex justify-between">
            <div class="px-6">
                <h1 class="font-inter text-[18px] text-white font-semibold">{{ $selectedMonth }}</h1>
                <h1 class="font-inter text-[12px] text-white font-normal">
                    {{ \Carbon\Carbon::parse($startDate)->translatedFormat('j F') }} -
                    {{ \Carbon\Carbon::parse($endDate)->translatedFormat('j F Y') }}</h1>
            </div>
            <div class="flex justify-center mx-6 space-x-4">
                <button wire:click="filterDate('prev')" class="btn">left</button>
                <button wire:click="filterDate('next')" class="btn">right</button>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 pb-20">
        <div class="flex justify-between items-center mb-5 mt-[-10px]">
            <h1 class="font-inter">Nota Penjualan</h1>
            <div class="dropdown dropdown-bottom dropdown-end">
                <div tabindex="0" role="button"
                    class="font-inter font-semibold text-[14px] btn btn-ghost text-blue-500">Filter</div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a wire:click="filterDate('today')">Hari ini</a></li>
                    <li><a wire:click="filterDate('yesterday')">Kemarin</a></li>
                    <li><a wire:click="filterDate('last7days')">7 Hari Terakhir</a></li>
                </ul>
            </div>
        </div>
        <div>
            @if ($transactions->isEmpty())
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <p class="text-gray-500 text-center">Tidak ada transaksi</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="none" class="mx-auto"
                        viewBox="0 0 3001 3001" id="payment-error">
                        <g clip-path="url(#clip0_101_35704)">
                            <path fill="#F1F1F1" fill-rule="evenodd"
                                d="M409.871 1137.97C409.871 1046.47 484.047 972.289 575.548 972.289H1372.79C1464.29 972.289 1538.47 1046.47 1538.47 1137.97V2556.66C1538.47 2648.16 1464.29 2722.33 1372.79 2722.33H575.548C484.047 2722.33 409.871 2648.16 409.871 2556.66V1137.97ZM575.548 988.068C492.761 988.068 425.649 1055.18 425.649 1137.97V2556.66C425.649 2639.44 492.761 2706.55 575.548 2706.55H1372.79C1455.58 2706.55 1522.69 2639.44 1522.69 2556.66V1137.97C1522.69 1055.18 1455.58 988.068 1372.79 988.068H575.548Z"
                                clip-rule="evenodd"></path>
                            <path fill="#53B3CC" fill-rule="evenodd"
                                d="M1888.57 1146.38C1910.36 1146.38 1928.02 1164.04 1928.02 1185.83V2631.64C1928.02 2653.43 1910.36 2671.09 1888.57 2671.09H984.715C962.929 2671.09 945.268 2653.43 945.268 2631.64V1866.58L1079.61 1905.76C1086.08 1907.65 1093.06 1906.69 1098.78 1903.11L1187.99 1847.36C1197.98 1841.11 1211.04 1843.17 1218.63 1852.18L1308.51 1958.91C1315.78 1967.55 1328.14 1969.84 1338.03 1964.39L1485.05 1883.38C1493.01 1879 1502.77 1879.56 1510.17 1884.81L1598.85 1947.74C1605.78 1952.66 1614.83 1953.49 1622.54 1949.9L1806.57 1864.22C1814.59 1860.49 1824.02 1861.54 1831.02 1866.94L1928.02 1941.77V1185.83C1928.02 1164.04 1910.36 1146.38 1888.57 1146.38H984.713C984.192 1146.38 983.674 1146.39 983.157 1146.41C983.674 1146.39 984.193 1146.38 984.715 1146.38H1888.57Z"
                                clip-rule="evenodd"></path>
                            <path fill="#E5E5E5" d="M1140.37 517.708H1248.76V589.969H1140.37V517.708Z"></path>
                            <path fill="#FAC22F" d="M656.226 105.82H1284.9V553.839H656.226V105.82Z"></path>
                            <path fill="#F1F1F1"
                                d="M229.882 950.088C229.882 862.944 300.526 792.3 387.67 792.3H1184.91C1272.06 792.3 1342.7 862.944 1342.7 950.088V2368.78C1342.7 2455.92 1272.06 2526.57 1184.91 2526.57H387.67C300.526 2526.57 229.882 2455.92 229.882 2368.78V950.088Z">
                            </path>
                            <path fill="#3E3D3D" fill-rule="evenodd"
                                d="M221.993 950.088C221.993 858.587 296.169 784.411 387.67 784.411H1184.91C1276.42 784.411 1350.59 858.587 1350.59 950.088V2368.78C1350.59 2460.28 1276.42 2534.45 1184.91 2534.45H387.67C296.169 2534.45 221.993 2460.28 221.993 2368.78V950.088ZM387.67 800.189C304.883 800.189 237.771 867.301 237.771 950.088V2368.78C237.771 2451.56 304.883 2518.68 387.67 2518.68H1184.91C1267.7 2518.68 1334.81 2451.56 1334.81 2368.78V950.088C1334.81 867.301 1267.7 800.189 1184.91 800.189H387.67Z"
                                clip-rule="evenodd"></path>
                            <path fill="#fff" fill-rule="evenodd"
                                d="M287.693 828.01C314.911 805.693 349.726 792.3 387.67 792.3H1184.91C1222.86 792.3 1257.68 805.695 1284.9 828.013V2490.85C1257.68 2513.17 1222.86 2526.57 1184.91 2526.57H387.67C349.726 2526.57 314.911 2513.17 287.693 2490.86V828.01Z"
                                clip-rule="evenodd"></path>
                            <path fill="#F1F1F1"
                                d="M374.407 1142.47C374.407 1120.68 392.068 1103.02 413.854 1103.02H1158.74C1180.52 1103.02 1198.18 1120.68 1198.18 1142.47V1619.99C1198.18 1641.77 1180.52 1659.43 1158.74 1659.43H413.854C392.068 1659.43 374.407 1641.77 374.407 1619.99V1142.47Z"
                                opacity=".5"></path>
                            <path fill="#53B3CC"
                                d="M374.409 1803.95H583.966V1934.02H374.409V1803.95zM670.676 1803.95H880.233V1934.02H670.676V1803.95zM966.949 1803.95H1198.18V1934.02H966.949V1803.95zM374.407 2013.51H583.964V2143.58H374.407V2013.51zM670.674 2013.51H880.231V2143.58H670.674V2013.51zM966.947 2013.51H1198.18V2143.58H966.947V2013.51z">
                            </path>
                            <path fill="#F15846" d="M374.407 2230.29H583.964V2360.36H374.407V2230.29Z"></path>
                            <path fill="#53B3CC" d="M670.674 2230.29H880.231V2360.36H670.674V2230.29Z"></path>
                            <path fill="#F15846" d="M966.947 2230.29H1198.18V2360.36H966.947V2230.29Z"></path>
                            <path fill="#3E3D3D" fill-rule="evenodd"
                                d="M221.993 950.088C221.993 858.587 296.169 784.411 387.67 784.411H1184.91C1276.42 784.411 1350.59 858.587 1350.59 950.088V2368.78C1350.59 2460.28 1276.42 2534.45 1184.91 2534.45H387.67C296.169 2534.45 221.993 2460.28 221.993 2368.78V950.088ZM387.67 800.189C304.883 800.189 237.771 867.301 237.771 950.088V2368.78C237.771 2451.56 304.883 2518.68 387.67 2518.68H1184.91C1267.7 2518.68 1334.81 2451.56 1334.81 2368.78V950.088C1334.81 867.301 1267.7 800.189 1184.91 800.189H387.67Z"
                                clip-rule="evenodd"></path>
                            <path fill="#F1F1F1" d="M432.214 474.351H1140.37V972.953H432.214V474.351Z"></path>
                            <path fill="#F1F1F1" fill-rule="evenodd"
                                d="M1140.37 474.352H432.214V434.608L432.377 434.428C432.271 433.298 432.216 432.153 432.216 430.995C432.216 411.042 448.391 394.866 468.344 394.865L468.344 394.865H1176.5L1140.37 434.608V474.352Z"
                                clip-rule="evenodd"></path>
                            <path fill="#FAC22F"
                                d="M1284.89 553.839C1284.89 573.793 1268.72 589.969 1248.76 589.969C1228.81 589.969 1212.63 573.793 1212.63 553.839C1212.63 533.884 1228.81 517.708 1248.76 517.708C1268.72 517.708 1284.89 533.884 1284.89 553.839Z">
                            </path>
                            <path fill="#E5E5E5"
                                d="M1212.63 430.995C1212.63 450.949 1196.46 467.126 1176.5 467.126C1156.55 467.126 1140.37 450.949 1140.37 430.995C1140.37 411.041 1156.55 394.865 1176.5 394.865C1196.46 394.865 1212.63 411.041 1212.63 430.995Z">
                            </path>
                            <path fill="#E5E5E5" d="M1140.37 430.995H1212.63V589.969H1140.37V430.995Z"></path>
                            <path fill="#F15846"
                                d="M1035.59 1381.23C1035.59 1516.92 925.595 1626.92 789.905 1626.92C654.216 1626.92 544.218 1516.92 544.218 1381.23C544.218 1245.54 654.216 1135.54 789.905 1135.54C925.595 1135.54 1035.59 1245.54 1035.59 1381.23Z">
                            </path>
                            <path fill="#E5E5E5" d="M432.214 922.37H1140.37V972.952H432.214V922.37Z"></path>
                            <path fill="#fff" fill-rule="evenodd"
                                d="M634.526 1491.99L900.675 1225.84L945.304 1270.47L679.155 1536.62L634.526 1491.99Z"
                                clip-rule="evenodd"></path>
                            <path fill="#fff" fill-rule="evenodd"
                                d="M679.158 1225.84L945.307 1491.99L900.678 1536.62L634.529 1270.47L679.158 1225.84Z"
                                clip-rule="evenodd"></path>
                            <path fill="#46A4BC" fill-rule="evenodd"
                                d="M1501.68 1881.02V2671.09H1725.69V1901.88L1622.54 1949.9C1614.83 1953.49 1605.79 1952.66 1598.86 1947.74L1510.18 1884.81C1507.58 1882.96 1504.69 1881.7 1501.68 1881.02Z"
                                clip-rule="evenodd"></path>
                            <path fill="#53B3CC" fill-rule="evenodd"
                                d="M2673.97 1550.3C2681.81 1570.62 2671.68 1593.46 2651.36 1601.3L1946.05 1873.32L1980.96 1755.89C1983.48 1747.42 1981.06 1738.24 1974.7 1732.11L1828.54 1591.23C1822.42 1585.32 1819.93 1576.59 1822.03 1568.35L1848.83 1462.97C1851.07 1454.17 1848.08 1444.86 1841.13 1439.02L1712.64 1331C1704 1323.73 1701.69 1311.37 1707.13 1301.48L1774.37 1179.22C1780.05 1168.89 1777.26 1155.96 1767.84 1148.89L1683.72 1085.72C1678.33 1081.67 1674.92 1075.51 1674.35 1068.78L1662.56 929.343L2297.72 684.377C2318.05 676.538 2340.88 686.661 2348.72 706.987L2673.97 1550.3Z"
                                clip-rule="evenodd"></path>
                            <path fill="#46A4BC" fill-rule="evenodd"
                                d="M912.066 2055.25L831.458 1846.24L831.459 1846.24L912.067 2055.25L912.066 2055.25ZM1910.46 1670.19L1828.54 1591.23C1822.42 1585.33 1819.94 1576.59 1822.03 1568.35L1848.84 1462.97C1849.62 1459.88 1849.77 1456.72 1849.31 1453.68L2534.75 1189.32L2615.36 1398.33L1910.46 1670.19Z"
                                clip-rule="evenodd"></path>
                            <path fill="#F15846"
                                d="M1884.66 524.934C1884.66 646.656 1785.99 745.33 1664.26 745.33C1542.54 745.33 1443.87 646.656 1443.87 524.934C1443.87 403.213 1542.54 304.538 1664.26 304.538C1785.99 304.538 1884.66 403.213 1884.66 524.934Z">
                            </path>
                            <path fill="#FAC22F"
                                d="M2130.35 524.934C2130.35 483.03 2096.38 449.06 2054.47 449.06C2012.57 449.06 1978.6 483.03 1978.6 524.934C1978.6 566.838 2012.57 600.808 2054.47 600.808C2096.38 600.808 2130.35 566.838 2130.35 524.934Z">
                            </path>
                            <path fill="#fff" fill-rule="evenodd"
                                d="M1539.96 610.2L1749.53 400.63L1788.58 439.681L1579.01 649.251L1539.96 610.2Z"
                                clip-rule="evenodd"></path>
                            <path fill="#fff" fill-rule="evenodd"
                                d="M1579.01 400.631L1788.58 610.201L1749.53 649.251L1539.96 439.681L1579.01 400.631Z"
                                clip-rule="evenodd"></path>
                            <path fill="#F15846" d="M2715.66 2790.32H2058.09V2891.48H2715.66V2790.32Z"></path>
                            <path fill="#53B3CC" d="M2795.15 2696.38H2137.58V2790.32H2795.15V2696.38Z"></path>
                            <path fill="#FAC22F" d="M2751.79 2595.21H2094.22V2696.38H2751.79V2595.21Z"></path>
                            <path fill="#3E3D3D" fill-rule="evenodd"
                                d="M-5.62891 2891.48C-5.62891 2887.13 -2.0967 2883.59 2.2605 2883.59H2874.64C2878.99 2883.59 2882.53 2887.13 2882.53 2891.48C2882.53 2895.84 2878.99 2899.37 2874.64 2899.37H2.2605C-2.0967 2899.37 -5.62891 2895.84 -5.62891 2891.48Z"
                                clip-rule="evenodd"></path>
                            <path fill="#F1F1F1" fill-rule="evenodd"
                                d="M2672.31 2079.21H2130.35V2063.43H2672.31V2079.21ZM2672.31 2220.12H2130.35V2204.34H2672.31V2220.12ZM2412.17 2371.87H2130.35V2356.09H2412.17V2371.87Z"
                                clip-rule="evenodd"></path>
                            <path fill="#3E3D3D" fill-rule="evenodd"
                                d="M1035.59 558.115H544.218V542.336H1035.59V558.115ZM1035.59 684.572H544.218V668.793H1035.59V684.572ZM1035.59 800.19H544.218V784.411H1035.59V800.19Z"
                                clip-rule="evenodd"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_101_35704">
                                <rect width="3000" height="3000" fill="#fff" transform="translate(.235 .427)">
                                </rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            @else
                @foreach ($transactions as $transaction)
                    <div
                        class="max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow flex space-x-5 items-center mb-2">
                        <div>
                            <p class="font-normal text-[12px] font-inter">
                                {{ \Carbon\Carbon::parse($transaction->TransactionDate)->translatedFormat('j F Y') }}
                            </p>
                            <h5 class="text-xl font-semibold text-gray-700 tracking-tight font-inter">
                                Rp{{ number_format($transaction->PricePerKg * $transaction->Quantity) }}
                            </h5>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="flex justify-center bg-white pb-10">
        <!-- Modal toggle -->
        <button class="btn btn-wide btn-success text-white" onclick="modalAddNota.showModal()">Tambah Nota</button>

        <dialog id="modalAddNota" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-5">Buat nota baru</h3>
                <div class="py-4">
                    <form method="POST" action="{{ route('penjualan.add') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama
                                Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang" value="Pepaya California"
                                class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>"
                                class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="barang_kg" class="block text-sm font-medium text-gray-700">Jumlah Barang per
                                Kg</label>
                            <input type="number" id="barang_kg" name="barang_kg"
                                class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="harga_per_pcs" class="block text-sm font-medium text-gray-700">Harga Per
                                Pcs</label>
                            <input type="number" id="harga_per_pcs" name="harga_per_pcs" step="0.01"
                                class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button class="btn btn-outline btn-error btn-lg"
                                onclick="modalAddNota.close()">Close</button>
                            <button type="submit"
                                class="btn btn-success text-white bg-green-500 btn-lg">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
    </div>
</div>
</div>

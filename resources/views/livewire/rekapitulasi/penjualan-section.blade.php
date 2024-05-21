<div class="h-screen mt-[-15px] rounded-sm">
    <div class="mt-4 p-6 bg-white flex items-center space-x-6">
        <div>
            <h2 class="font-inter text-[18px] text-gray-900 font-semibold mb-1">Total Pendapatan</h2>
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
        <div class="flex flex-row justify-between items-center mb-5 mt-[-10px]">
            <!-- Modal toggle -->
            @if (!$transactions->isEmpty())
                <button class="btn w-44 btn-success text-white" onclick="modalAddNota.showModal()">Tambah Nota</button>
                @if (\Carbon\Carbon::parse($startDate)->translatedFormat('F') === \Carbon\Carbon::now()->translatedFormat('F'))
                    <div class="dropdown dropdown-bottom dropdown-end mt-4 sm:mt-0">
                        <div tabindex="0" role="button"
                            class="font-inter font-semibold text-[14px] btn btn-ghost text-blue-500">Filter</div>
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52 border border-gray-500">
                            <li><a wire:click="filterDate('today')">Hari ini</a></li>
                            <li><a wire:click="filterDate('yesterday')">Kemarin</a></li>
                            <li><a wire:click="filterDate('last7days')">7 Hari Terakhir</a></li>
                            <li><a wire:click="filterDate('30days')">30 Hari Terakhir</a></li>
                        </ul>
                    </div>
                @endif
            @endif
        </div>
        <div>
            @if ($transactions->isEmpty())
                @include('livewire.rekapitulasi.partials.empty-transaction', [
                    'message' => 'Tidak ada transaksi',
                ])
                <div class="flex justify-center mt-5">
                    <button class="btn btn-success text-white w-1/2" onclick="modalAddNota.showModal()">Tambah
                        Nota</button>
                </div>
            @else
                <div class="overflow-x-auto hidden md:block">
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/12 py-3 px-4 font-semibold text-sm">No</th>
                                <th class="w-2/12 py-3 px-4 font-semibold text-sm">Nama</th>
                                <th class="w-3/12 py-3 px-4 font-semibold text-sm">Tanggal Transaksi</th>
                                <th class="w-1/12 py-3 px-4 font-semibold text-sm">Quantity</th>
                                <th class="w-2/12 py-3 px-4 font-semibold text-sm">Harga/Kg</th>
                                <th class="w-2/12 py-3 px-4 font-semibold text-sm">Total</th>
                            </tr>
                        </thead>
                        @foreach ($transactions as $index => $transaction)
                            <tr onclick="showTransactionEdit({{ json_encode($transaction) }})"
                                class="bg-gray-100 border-b hover:bg-blue-50 transition duration-300 cursor-pointer">
                                <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">{{ $transaction->NameObject }}</td>
                                <td class="py-3 px-4">
                                    {{ \Carbon\Carbon::parse($transaction->TransactionDate)->translatedFormat('j F Y') }}
                                </td>
                                <td class="py-3 px-4 text-center">{{ $transaction->Quantity }}</td>
                                <td class="py-3 px-4 text-center">Rp{{ number_format($transaction->PricePerKg) }}</td>
                                <td class="py-3 px-4 text-center">
                                    Rp{{ number_format($transaction->PricePerKg * $transaction->Quantity) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="md:-ml-[65px] md:hidden space-y-3">
                    @foreach ($transactions as $transaction)
                        <div onclick="showTransactionEdit({{ json_encode($transaction) }})"
                            class="p-4 bg-white border border-gray-200 rounded-lg shadow flex justify-between space-x-5 items-center mb-2 cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl hover:bg-blue-300">
                            <div>
                                <p class="font-normal text-[12px] font-inter">
                                    {{ \Carbon\Carbon::parse($transaction->TransactionDate)->translatedFormat('j F Y') }}
                                </p>
                                <h5 class="text-xl font-semibold text-gray-700 tracking-tight font-inter">
                                    Rp{{ number_format($transaction->PricePerKg * $transaction->Quantity) }}
                                </h5>
                            </div>
                            <div class="absolute bottom-3 right-2">
                                <h3 class="text-sm">{{ $transaction->NameObject }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('livewire.rekapitulasi.partials.modal-detail-transaction')
            @endif
        </div>
    </div>
    @include('livewire.rekapitulasi.partials.modal-add-transaction')
</div>

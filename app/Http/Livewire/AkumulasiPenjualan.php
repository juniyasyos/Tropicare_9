<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class AkumulasiPenjualan extends Component
{
    public $totalPenjualan;

    public function mount()
    {
        $this->totalPenjualan = Transaction::whereMonth('TransactionDate', Carbon::now()->month)
            ->whereYear('TransactionDate', Carbon::now()->year)
            ->sum(\DB::raw('PricePerKg * Quantity'));

    }

    public function render()
    {
        return view('livewire.akumulasi-penjualan');
    }
}

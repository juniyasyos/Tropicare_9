<?php

namespace App\Http\Livewire\Rekapitulasi;

use Livewire\Component;
use App\Models\Expenditure;
use Carbon\Carbon;

class AkumulasiPengeluaran extends Component
{
    public $totalPengeluaran;

    public function mount()
    {
        $this->totalPengeluaran = Expenditure::whereMonth('ExpenditureDate', Carbon::now()->month)
            ->whereYear('ExpenditureDate', Carbon::now()->year)
            ->sum(\DB::raw('Amount'));
    }

    public function render()
    {
        return view('livewire.rekapitulasi.akumulasi-pengeluaran');
    }
}

<?php

namespace App\Http\Livewire\Rekapitulasi\Partials;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Expenditure;
use App\Models\Transaction;

class CardMonthlyLaporan extends Component
{
    public $chartData;

    public function fetchMonthlyData()
    {
        $userId = auth()->id();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Query untuk mendapatkan pengeluaran bulanan
        $expenditures = Expenditure::selectRaw('DATE(ExpenditureDate) as date, SUM(Amount) as total')
            ->where('UserId', $userId)
            ->whereBetween('ExpenditureDate', [$startOfMonth, $endOfMonth])
            ->groupByRaw('DATE(ExpenditureDate)')
            ->pluck('total', 'date');

        // Query untuk mendapatkan transaksi bulanan
        $transactions = Transaction::selectRaw('DATE(TransactionDate) as date, SUM(Quantity * PricePerKg) as total')
            ->where('UserId', $userId)
            ->whereBetween('TransactionDate', [$startOfMonth, $endOfMonth])
            ->groupByRaw('DATE(TransactionDate)')
            ->pluck('total', 'date');

        // Mendapatkan tanggal awal dan akhir bulan
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();


        $dateRange = [];
        $dateLabels = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dateRange[] = $date->format('Y-m-d');
            $dateLabels[] = $date->format('d');
        }

        // Menggabungkan data pengeluaran dan transaksi
        $this->chartData = collect($dateRange)->map(function ($date, $index) use ($expenditures, $transactions, $dateLabels) {
            return [
                'dateLabel' => $dateLabels[$index],
                'date' => $date,
                'expenditure' => $expenditures->get($date, 0),
                'transaction' => $transactions->get($date, 0),
            ];
        });
    }


    public function render()
    {
        $this->fetchMonthlyData();
        return view('livewire.rekapitulasi.partials.card-monthly-laporan');
    }
}

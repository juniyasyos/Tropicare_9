<?php

namespace App\Http\Livewire\Rekapitulasi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Expenditure;
use App\Models\Transaction;

class LaporanSection extends Component
{
    public $filter_range = 'Bulanan';
    public $filter_date_start;
    public $filter_date_end;
    public $chartData;

    public function mount()
    {
        $this->setDefaultDates();
    }

    public function setDefaultDates()
    {
        if ($this->filter_range == 'Bulanan') {
            $this->filter_date_start = Carbon::now()->startOfMonth()->toDateString();
            $this->filter_date_end = Carbon::now()->endOfMonth()->toDateString();
        } elseif ($this->filter_range == 'Tahunan') {
            $this->filter_date_start = Carbon::now()->startOfYear()->toDateString();
            $this->filter_date_end = Carbon::now()->endOfYear()->toDateString();
        }
    }

    public function updatedFilterRange()
    {
        $this->setDefaultDates();
    }

    public function resetFilters()
    {
        $this->filter_range = 'Bulanan';
        $this->setDefaultDates();
    }

    public function update()
    {
        // Implementasikan logika pembaruan sesuai kebutuhan Anda
    }

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
        $startDate = Carbon::parse($this->filter_date_start)->startOfDay();
        $endDate = Carbon::parse($this->filter_date_end)->endOfDay();


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
        return view('livewire.rekapitulasi.laporan-section');
    }
}

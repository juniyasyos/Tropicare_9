<?php

namespace App\Http\Livewire\Rekapitulasi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Expenditure;
use App\Models\Transaction;

class LaporanSection extends Component
{
    public $filter_range = 'Tahunan';
    public $filter_date_start;
    public $filter_date_end;
    public $chartData;
    public $all_transaction;
    public $all_expenditure;
    public $averageTransaction;
    public $averageExpenditure;


    public function mount()
    {
        $this->setDefaultDates();
    }

    public function setDefaultDates()
    {
        if ($this->filter_range == 'Bulanan') {
            $this->filter_date_start = Carbon::now()->subMonths(6)->startOfMonth()->toDateString(); // Set 6 bulan
            $this->filter_date_end = Carbon::now()->endOfMonth()->toDateString();
        } elseif ($this->filter_range == 'Tahunan') {
            $this->filter_date_start = Carbon::now()->subYears(3)->startOfYear()->toDateString(); // Set 3 tahun
            $this->filter_date_end = Carbon::now()->endOfYear()->toDateString();
        }
    }

    public function fetchData()
    {
        $userId = auth()->id();

        // Range of date
        $startDate = Carbon::parse($this->filter_date_start);
        $endDate = Carbon::parse($this->filter_date_end);

        // Membuat array date labels
        $dateLabels = [];
        $dateFormat = 'Y-m';

        if ($this->filter_range == 'Bulanan') {
            $dateFormat = 'Y M';
            $interval = $startDate->diffInMonths($endDate);

            for ($i = 0; $i <= $interval; $i++) {
                $dateLabels[] = $startDate->copy()->addMonths($i)->format($dateFormat);
            }

        } elseif ($this->filter_range == 'Tahunan') {
            $dateFormat = 'Y';
            $interval = $startDate->diffInYears($endDate);

            for ($i = 0; $i <= $interval; $i++) {
                $dateLabels[] = $startDate->copy()->addYears($i)->format($dateFormat);
            }
        }

        $dateFormatQuery = $this->filter_range == 'Bulanan' ? '%Y-%m' : '%Y';

        // Query untuk mendapatkan total pengeluaran
        $expenditures = Expenditure::selectRaw("DATE_FORMAT(ExpenditureDate, '$dateFormatQuery') as period, SUM(Amount) as total")
            ->where('UserId', $userId)
            ->whereBetween('ExpenditureDate', [$startDate, $endDate])
            ->groupBy('period')
            ->orderBy('period')
            ->pluck('total', 'period');

        // Query untuk mendapatkan total transaksi
        $transactions = Transaction::selectRaw("DATE_FORMAT(TransactionDate, '$dateFormatQuery') as period, SUM(Quantity * PricePerKg) as total")
            ->where('UserId', $userId)
            ->whereBetween('TransactionDate', [$startDate, $endDate])
            ->groupBy('period')
            ->orderBy('period')
            ->pluck('total', 'period');

        // Menggabungkan data pengeluaran dan transaksi
        $monthlyReport = collect($dateLabels)->map(function ($label, $index) use ($startDate, $expenditures, $transactions, $dateFormatQuery) {
            $period = $startDate->copy();
            if ($this->filter_range == 'Bulanan') {
                $period = $period->addMonths($index)->format('Y-m');
            } elseif ($this->filter_range == 'Tahunan') {
                $period = $period->addYears($index)->format('Y');
            }

            return [
                'dateLabel' => $label,
                'period' => $period,
                'expenditure' => $expenditures->get($period, 0),
                'transaction' => $transactions->get($period, 0),
            ];
        });

        // Mengubah hasil menjadi koleksi untuk kemudahan manipulasi data di view
        $this->chartData = $monthlyReport;

        // Mengisi semua data dengan jumlah semua data
        $this->all_expenditure = $expenditures->sum();
        $this->all_transaction = $transactions->sum();

        $totalMonths = $startDate->diffInMonths($endDate) + 1;

        $totalExpenditure = $expenditures->sum();
        $this->averageExpenditure = $totalExpenditure / $totalMonths;

        $totalTransaction = $transactions->sum();
        $this->averageTransaction = $totalTransaction / $totalMonths;
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
        $this->fetchData();
        $this->emit('chartDataUpdated', $this->chartData);
    }


    public function render()
    {
        $this->fetchData();
        return view('livewire.rekapitulasi.laporan-section');
    }
}

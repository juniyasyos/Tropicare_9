<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class PenjualanSection extends Component
{
    public $transactions;
    public $selectedMonth;
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->selectedMonth = Carbon::now()->format('F');
        $this->setDateRange(Carbon::now()->startOfMonth(), Carbon::now());
    }

    public function render()
    {
        $this->fetchTransactions();
        return view('livewire.penjualan-section', [
            'transactions' => $this->transactions
        ]);
    }

    public function filterDate($option)
    {
        // Set tanggal mulai dan akhir sesuai dengan opsi filter yang dipilih
        switch ($option) {
            case 'today':
                $this->setDateRange(Carbon::now(), Carbon::now());
                break;
            case 'yesterday':
                $this->setDateRange(Carbon::now()->subDay(), Carbon::now()->subDay());
                break;
            case 'last7days':
                $this->setDateRange(Carbon::now()->subDays(6), Carbon::now());
                break;
            case 'prev':
                $this->moveToPreviousMonth();
                break;
            case 'next':
                $this->moveToNextMonth();
                break;
        }

        if ($option === 'today') {
            $this->setDateRange(Carbon::now()->startOfMonth(), Carbon::now());
        }

        $this->fetchTransactions();
    }

    private function setDateRange($start, $end)
    {
        $this->startDate = $start->format('Y-m-d');
        $this->endDate = $end->format('Y-m-d');
    }

    private function moveToPreviousMonth()
    {
        $this->selectedMonth = Carbon::parse($this->selectedMonth)->subMonth()->format('F');
        $this->startDate = Carbon::parse($this->startDate)->subMonth()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::parse($this->startDate)->endOfMonth()->format('Y-m-d');

        if (Carbon::parse($this->selectedMonth)->isCurrentMonth()) {
            $this->transactions = [];
        }

        $this->fetchTransactions();
    }

    private function moveToNextMonth()
    {
        $this->selectedMonth = Carbon::parse($this->selectedMonth)->addMonth()->format('F');
        $this->startDate = Carbon::parse($this->startDate)->addMonth()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::parse($this->startDate)->endOfMonth()->format('Y-m-d');

        if (Carbon::parse($this->selectedMonth)->isCurrentMonth()) {
            $this->transactions = [];
        }

        $this->fetchTransactions();
    }


    private function fetchTransactions()
    {
        $this->transactions = Transaction::whereBetween('TransactionDate', [$this->startDate, $this->endDate])->get();
    }
}

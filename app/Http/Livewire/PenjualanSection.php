<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use Carbon\Carbon;

class PenjualanSection extends Component
{
    use WithPagination;

    public $selectedMonth;
    public $startDate;
    public $endDate;
    public $allTransaction;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->selectedMonth = Carbon::now()->format('F');
        $this->setDateRange(Carbon::now()->startOfMonth(), Carbon::now());
        $this->Allmount();
    }

    public function Allmount()
    {
        $this->allTransaction = Transaction::whereMonth('TransactionDate', Carbon::now()->month)
            ->whereYear('TransactionDate', Carbon::now()->year)
            ->sum(\DB::raw('PricePerKg * Quantity'));
    }

    public function render()
    {
        $transactions = $this->fetchTransactions();
        return view('livewire.penjualan-section', [
            'transactions' => $transactions
        ]);
    }

    public function filterDate($option)
    {
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
            case '30days':
                $this->setDateRange(Carbon::now()->subDays(30), Carbon::now());
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

        $this->resetPage();
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

        $this->resetPage();
    }

    private function moveToNextMonth()
    {
        $this->selectedMonth = Carbon::parse($this->selectedMonth)->addMonth()->format('F');
        $this->startDate = Carbon::parse($this->startDate)->addMonth()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::parse($this->startDate)->endOfMonth()->format('Y-m-d');

        $this->resetPage();
    }

    private function fetchTransactions()
    {
        return Transaction::whereBetween('TransactionDate', [$this->startDate, $this->endDate])->paginate(15);
    }
}

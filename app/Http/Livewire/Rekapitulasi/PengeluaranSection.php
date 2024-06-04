<?php

namespace App\Http\Livewire\Rekapitulasi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Expenditure;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PengeluaranSection extends Component
{
    use WithPagination;

    public $expenditures;
    public $selectedMonth;
    public $startDate;
    public $endDate;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->selectedMonth = Carbon::now()->format('F');
        $this->setDateRange(Carbon::now()->startOfMonth(), Carbon::now());
        $this->Allmount(Carbon::now()->startOfMonth(), Carbon::now());
    }

    public function Allmount($startDate, $endDate)
    {
        $userId = Auth::id();

        $this->expenditures = Expenditure::where('UserId', $userId)
            ->whereBetween('ExpenditureDate', [$startDate, $endDate])
            ->sum(\DB::raw('Amount'));
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
                $this->setDateRange(Carbon::now()->subDays(29), Carbon::now());
                break;
            case 'prev':
                $this->moveToPreviousMonth();
                break;
            case 'next':
                $this->moveToNextMonth();
                break;
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
        $this->Allmount($this->startDate, $this->endDate);

        $this->resetPage();
    }

    private function moveToNextMonth()
    {
        $this->selectedMonth = Carbon::parse($this->selectedMonth)->addMonth()->format('F');
        $this->startDate = Carbon::parse($this->startDate)->addMonth()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::parse($this->startDate)->endOfMonth()->format('Y-m-d');
        $this->Allmount($this->startDate, $this->endDate);

        $this->resetPage();
    }


    private function fetchExpenditures()
    {
        $userId = Auth::id();

        return Expenditure::where('UserId', $userId)
            ->whereBetween('ExpenditureDate', [$this->startDate, $this->endDate])
            ->orderBy('ExpenditureDate', 'desc')
            ->get();
    }

    public function render()
    {
        $expenditure = $this->fetchExpenditures();
        return view('livewire.rekapitulasi.pengeluaran-section', [
            'expenditure' => $expenditure
        ]);
    }
}

<?php

namespace App\Http\Livewire\Rekapitulasi;

use Livewire\Component;
use App\Models\Expenditure;
use Carbon\Carbon;

class PengeluaranSection extends Component
{
    public $expenditures;
    public $selectedMonth;
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->selectedMonth = Carbon::now()->format('F');
        $this->setDateRange(Carbon::now()->startOfMonth(), Carbon::now());
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

        $this->fetchExpenditures();
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
            $this->expenditures = [];
        }

        $this->fetchExpenditures();
    }

    private function moveToNextMonth()
    {
        $this->selectedMonth = Carbon::parse($this->selectedMonth)->addMonth()->format('F');
        $this->startDate = Carbon::parse($this->startDate)->addMonth()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::parse($this->startDate)->endOfMonth()->format('Y-m-d');

        if (Carbon::parse($this->selectedMonth)->isCurrentMonth()) {
            $this->expenditures = [];
        }

        $this->fetchExpenditures();
    }


    private function fetchExpenditures()
    {
        $this->expenditures = Expenditure::whereBetween('ExpenditureDate', [$this->startDate, $this->endDate])->get();
    }

    public function render()
    {
        $this->fetchExpenditures();
        return view('livewire.rekapitulasi.pengeluaran-section', [
            'expenditures' => $this->expenditures
        ]);
    }
}

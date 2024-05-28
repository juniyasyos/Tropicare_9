<?php

namespace App\Http\Livewire\Detection;

use App\Models\Diseasedetection;
use Livewire\Component;

class HistorySection extends Component
{
    public function render()
    {
        $detections = Diseasedetection::all();
        return view('livewire.detection.history-section');
    }
}

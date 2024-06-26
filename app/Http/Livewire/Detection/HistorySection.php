<?php

namespace App\Http\Livewire\Detection;

use Livewire\Component;
use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Auth;

class HistorySection extends Component
{
    public $detections;

    public function confirmDelete($detectionId)
    {
        // Temukan deteksi penyakit yang akan dihapus
        $detection = Diseasedetection::find($detectionId);

        if ($detection) {
            // Lakukan penghapusan deteksi penyakit
            $detection->delete();
        }

        // Perbarui daftar deteksi penyakit setelah penghapusan
        $this->detections = Diseasedetection::all();
    }

    public function render()
    {
        // Mengambil semua deteksi penyakit berdasarkan UserId dari pengguna yang sedang login
        $this->detections = Diseasedetection::where('UserId', Auth::id())->get();
        return view('livewire.detection.history-section', [
            'detections' => $this->detections,
        ]);
    }
}

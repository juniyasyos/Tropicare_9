<?php

namespace App\Http\Livewire\Detection;

use Livewire\Component;
use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Auth;

class HistorySection extends Component
{
    public $detections;
    public $isModalOpen = false; // Menambahkan properti $isModalOpen dan inisialisasi ke false
    public $isDeleteModalOpen = false; // Menambahkan properti $isDeleteModalOpen dan inisialisasi ke false
    public $selectedDetectionId;
    public $modalPhoto;
    public $modalResult;
    public $modalDate;

    public function confirmDelete()
    {
        // Temukan deteksi penyakit yang akan dihapus
        $detection = Diseasedetection::find($this->selectedDetectionId);

        if ($detection) {
            // Lakukan penghapusan deteksi penyakit
            $detection->delete();
        }

        // Perbarui daftar deteksi penyakit setelah penghapusan
        $this->detections = Diseasedetection::where('UserId', Auth::id())->get();
        $this->isDeleteModalOpen = false;
    }

    // Method untuk membuka modal dan menetapkan id deteksi yang dipilih
    public function openModal($id, $photo, $result, $date)
    {
        $this->selectedDetectionId = $id;
        $this->modalPhoto = $photo;
        $this->modalResult = $result;
        $this->modalDate = $date;
        $this->isModalOpen = true;
    }

    // Method untuk menutup modal
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // Method untuk membuka modal penghapusan
    public function openDeleteModal($id)
    {
        $this->selectedDetectionId = $id;
        $this->isDeleteModalOpen = true;
    }

    // Method untuk menutup modal penghapusan
    public function closeDeleteModal()
    {
        $this->isDeleteModalOpen = false;
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

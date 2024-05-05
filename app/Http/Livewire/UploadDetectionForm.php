<?php

namespace App\Http\Livewire;

use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UploadDetectionForm extends Component
{
    public $photo;
    public $result_photo;
    public $result_massage;

    use WithFileUploads;

    public function upload()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // Simpan foto ke direktori yang sesuai dengan kebutuhan Anda
        $path = $this->photo->store('photos');

        session()->flash('message', 'Foto berhasil diunggah.');
    }

    public function uploadImage()
    {
        try {
            $user = Auth::user();
            if (!$user) {
                throw new Exception("User is not authenticated.");
            }

            // Upload image to repository
            $imagePath = $this->storeImage();

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeImage()
    {
        try {
            $user = Auth::user();
            if (!$user) {
                throw new Exception("User is not authenticated.");
            }

            // Menghitung ID terakhir dari detection dan menambahkannya dengan 1
            $nextDetectionId = Diseasedetection::max('DetectionID') + 1 ?? 1;

            // Menentukan nama folder untuk menyimpan gambar
            $folderName = "detect_{$nextDetectionId}";

            // Simpan kedua versi gambar (sebelum dan sesudah deteksi)
            $storedImagePathBefore = $this->storeImageHelper($user->folder, $folderName, 'before');
            $storedImagePathAfter = str_replace('before', 'after', $storedImagePathBefore);
            $this->result_photo = $storedImagePathAfter;

            // Membuat objek Image dan menyimpannya ke dalam basis data
            $detection = new Diseasedetection;
            $detection->PlantPhoto = $storedImagePathBefore;
            $detection->UserID = $user->id;
            $detection->ResultPlantDetection = $storedImagePathAfter;
            $detection->save();

            // Kirim permintaan POST ke endpoint FastAPI untuk mengunggah gambar
            $response = Http::attach(
                'image',
                file_get_contents(Storage::path($storedImagePathBefore)),
                basename($storedImagePathBefore)
            )->post('http://127.0.0.1:5000/upload_image/' . $nextDetectionId--);

            // Periksa kode status respons
            if ($response->status() == 200) {
                return ['session' => 'success' ,'url' => $storedImagePathBefore, 'id' => $detection->DetectionID];
            } else {
                return ['session'=>'failed', 'error' => $response->body(), 'url' => '', 'id' => ''];
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    private function storeImageHelper($userFolder, $folderName, $prefix)
    {
        $directory = "users/{$userFolder}/detect/{$folderName}";

        // Membuat direktori jika belum ada
        Storage::makeDirectory($directory);

        // Menghasilkan nama file acak
        $fileName = "{$prefix}_detection_" . Str::random(5) . '.' . $this->photo->getClientOriginalExtension();

        // Menyimpan file ke dalam direktori yang telah dibuat
        return Storage::putFileAs($directory, $this->photo, $fileName, 'public');
    }

    public function render()
    {
        return view('livewire.upload-detection-form');
    }
}

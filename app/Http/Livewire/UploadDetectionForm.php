<?php

namespace App\Http\Livewire;

use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\DiseaseSolution;
use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UploadDetectionForm extends Component
{
    public $photo;
    public $disease;
    public $solution;

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
            $storedImagePath = $this->storeImageHelper($user->folder);

            $result = $this->sendImageToDetectionAPI($storedImagePath);

            $this->processDetectionResult($result);

            // $this->saveDetectionResult($storedImagePath, $user->id, $result['predictions'][0]['class']);
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function sendImageToDetectionAPI($storedImagePath)
    {
        $imageData = file_get_contents(storage_path('app/' . $storedImagePath));
        $data = base64_encode($imageData);

        $api_key = "ocI0aRkXvOCRimVsznZU"; // Set API Key
        $model_endpoint = "p_diseases/1"; // Set model endpoint (Found in Dataset URL)

        // URL for Http Request
        $url = "https://detect.roboflow.com/" . $model_endpoint . "?api_key=" . $api_key;

        // Setup + Send Http request
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $data
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return json_decode($result, true);
    }

    private function processDetectionResult($result)
    {
        $detectedDiseases = array_unique(array_column($result['predictions'], 'class'));

        // Inisialisasi array untuk menyimpan semua solusi
        $solutions = [];

        // Pastikan array $detectedDiseases tidak kosong
        if (!empty($detectedDiseases)) {
            foreach ($detectedDiseases as $diseaseName) {
                $diseaseSolution = DiseaseSolution::where('DiseaseName', $diseaseName)->first();
                if ($diseaseSolution) {
                    // Tambahkan solusi ke array
                    $solutions[$diseaseName] = $diseaseSolution->SolutionDescription;
                }
            }
        }

        if (!empty($solutions)) {
            // Gabungkan nama penyakit dan solusi menjadi string yang dipisahkan oleh koma
            $this->disease = implode(', ', array_keys($solutions));
            $this->amount = count($detectedDiseases);
            $this->solution = implode(', ', $solutions);
        } else {
            // Jika tidak ada solusi yang ditemukan, atur properti menjadi null
            $this->disease = null;
            $this->amount = 0;
            $this->solution = null;
        }
    }

    private function saveDetectionResult($storedImagePath, $userId, $result_detection)
    {
        $detection = new Diseasedetection;
        $detection->PlantPhoto = $storedImagePath;
        $detection->UserID = $userId;
        $detection->ResultDetection = $result_detection;
        $detection->save();
    }

    private function storeImageHelper($userFolder)
    {
        $directory = "public/users/{$userFolder}";

        // Membuat direktori jika belum ada
        Storage::makeDirectory($directory);

        // Menghasilkan nama file acak
        $fileName = "detection_" . Str::random(5) . '.' . $this->photo->getClientOriginalExtension();

        // Menyimpan file ke dalam direktori yang telah dibuat
        return Storage::putFileAs($directory, $this->photo, $fileName, 'public');
    }

    public function render()
    {
        return view('livewire.upload-detection-form');
    }
}

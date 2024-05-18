<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\DiseaseSolution;
use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadDetectionForm extends Component
{
    public $photo;
    public $disease;
    public $solution;
    private $storedImagePath;
    private $userId;
    private $result_detection;

    use WithFileUploads;

    public function uploadData()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // Debugging: Cek apakah file diterima
        if ($this->photo) {
            logger()->info('File uploaded:', ['photo' => $this->photo->getClientOriginalName()]);
        } else {
            logger()->error('No file uploaded.');
        }
    }

    public function postData()
    {
        $this->uploadData();
        
        try {
            $user = Auth::user();
            if (!$user) {
                throw new Exception("User is not authenticated.");
            }

            $storedImagePath = $this->storeImageHelper($user->folder);

            $result = $this->getDataAnalisist($storedImagePath);

            $this->getResultDiseaseDetection($result);

            $this->storedImagePath = $storedImagePath;
            $this->userId = $user->id;
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function getDataAnalisist($storedImagePath)
    {
        $imageData = file_get_contents(storage_path('app/' . $storedImagePath));
        $data = base64_encode($imageData);

        $api_key = "ocI0aRkXvOCRimVsznZU";
        $model_endpoint = "p_diseases/1";

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

    private function getResultDiseaseDetection($result)
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
            $this->disease = "sehat";
            $this->amount = 0;
            $this->solution = null;
        }
    }

    public function saveDetectionResult()
    {
        $detection = new Diseasedetection;
        $detection->PlantPhoto = $this->storedImagePath;
        $detection->UserID = $this->userId;
        $detection->ResultDetection = $this->disease;

        // Set DiseaseID based on $this->disease if available
        $disease = DiseaseSolution::where('DiseaseName', $this->disease)->first();
        if ($disease) {
            $detection->DiseaseID = $disease->SolutionID;
        }

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

    public function clearPhoto()
    {
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.upload-detection-form');
    }

}

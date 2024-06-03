<?php

namespace App\Http\Livewire\Detection;

use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\DiseaseSolution;
use App\Models\Diseasedetection;
use App\Models\Diseasedetection_Solution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DetectForm extends Component
{
    use WithFileUploads;

    public $photo;
    public $disease;
    public $solution;
    private $storedImagePath;
    public $storedImagePath_final;
    private $userId;
    private $result_detection;
    public $buttonClicked = false;
    public $temporaryUrl;

    public function updatedPhoto()
    {
        $this->temporaryUrl = $this->photo->temporaryUrl();
    }

    public function uploadData()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($this->photo) {
            logger()->info('File uploaded:', ['photo' => $this->photo->getClientOriginalName()]);
        } else {
            logger()->error('Tidak ada file photo yang terupload.');
        }
    }

    public function postData()
    {
        try {
            $this->uploadData();

            $user = Auth::user();
            if (!$user) {
                throw new Exception("Authentifikasi User Dipertanyakan?.");
            }

            $this->storedImagePath = $this->storeImageHelper($user->folder);

            $result = $this->getDataAnalisist($this->storedImagePath);

            $this->getResultDiseaseDetection($result);

            logger()->info('postData Selesai', ['Url Penyimpanan' => $this->storedImagePath]);
            session()->flash('info', 'postData complete: ' . $this->storedImagePath);

        } catch (Exception $e) {
            logger()->error('Error in postData:', ['error' => $e->getMessage()]);
            session()->flash('error', 'Error in postData: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    // local work
    private function getDataAnalisist($storedImagePath)
    {
        try {
            $imageData = file_get_contents(storage_path('app/' . $storedImagePath));
            dd($imageData);
            $data = base64_encode($imageData);

            $api_key = "drqoBEhK8PQ3X96EdepO";
            $model_endpoint = "hello_papaya/4";

            $url = "https://detect.roboflow.com/" . $model_endpoint . "?api_key=" . $api_key;

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
        } catch (Exception $e) {
            logger()->error('Error in getDataAnalisist:', ['error' => $e->getMessage()]);
            dd($e);
            Session::flash('error', 'Failed to analyze image: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    private function getResultDiseaseDetection($result)
    {
        try {
            $detectedDiseases = array_unique(array_column($result['predictions'], 'class'));

            $solutions = [];
            if (!empty($detectedDiseases)) {
                foreach ($detectedDiseases as $diseaseName) {
                    $diseaseSolution = DiseaseSolution::where('DiseaseName', $diseaseName)->first();
                    if ($diseaseSolution) {
                        $solutions[$diseaseName] = $diseaseSolution->SolutionDescription;
                    }
                }
            }

            logger()->info('API Analysis Result:', ['result' => $result]);

            if (!empty($solutions)) {
                $this->disease = implode(', ', array_keys($solutions));
                $this->storedImagePath_final = str_replace('public', '', $this->storedImagePath);
                $this->amount = count($detectedDiseases);
                $this->solution = implode(', ', $solutions);
            } else {
                $this->disease = "sehat";
                $this->amount = 0;
                $this->solution = null;
            }
        } catch (Exception $e) {
            logger()->error('Error in getResultDiseaseDetection:', ['error' => $e->getMessage()]);
            session()->flash('error', 'Failed to get disease detection results: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function saveDetectionResult()
    {
        try {
            $detection = new Diseasedetection;
            $detection->PlantPhoto = $this->storedImagePath_final;
            $detection->UserID = Auth::id();
            $detection->ResultDetection = $this->disease;

            $detection->save();

            $detectionId = $detection->id;

            $this->buttonClicked = true;

            session()->flash('data_updated', 'Data deteksi berhasil disimpan.');

            return redirect()->route('detection.show');
        } catch (Exception $e) {
            logger()->error('Error in saveDetectionResult:', ['error' => $e->getMessage()]);
            Session::flash('error', 'Failed to save detection result: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    private function storeImageHelper($userFolder)
    {
        try {
            $directory = "public/users/{$userFolder}";

            // Membuat direktori jika belum ada
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            $fileName = "detection_" . Str::random(5) . '.' . $this->photo->getClientOriginalExtension();

            logger()->info('Directory:', ['directory' => $directory]);
            logger()->info('File Name:', ['fileName' => $fileName]);

            return Storage::putFileAs($directory, $this->photo, $fileName, 'public');
        } catch (Exception $e) {
            logger()->error('Error in storeImageHelper:', ['error' => $e->getMessage()]);
            session()->flash('error', 'Failed to store image: ' . $e->getMessage());
            dd(['error di store Helper' => $e ]);
            return redirect()->back();
        }
    }

    public function clearPhoto()
    {
        $this->photo = null;
        $this->temporaryUrl = null;
        $this->dispatchBrowserEvent('clear-preview');
    }

    public function render()
    {
        return view('livewire.detection.detect-form');
    }
}

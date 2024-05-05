<?php

namespace App\Http\Helpers;

use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DataImages
{
    public function getImageData($imageId)
    {
        try {
            // Ambil data gambar berdasarkan ID
            $detection = Diseasedetection::findOrFail($imageId);

            // Return data gambar
            return [
                'filename' => $detection->PlantPhoto,
                'result' => $detection->ResultPlantDetection,
                'detection_type' => $detection->DiseaseID,
            ];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

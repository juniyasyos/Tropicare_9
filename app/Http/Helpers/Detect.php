<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Exception;

class Detect
{
    public function detectImage($imageId)
    {
        $apiUrl = 'http://127.0.0.1:5000/images/' . $imageId . '/annotate'; // URL endpoint API FastAPI
        $client = new Client();
        // dd($apiUrl);

        try {
            $response = $client->get($apiUrl);

            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            // Proses response dari API FastAPI
            if ($statusCode == 200) {
                // Lakukan sesuatu dengan data
                return $data;
            } else {
                throw new Exception("Gagal mendapatkan respons dari API FastAPI. Kode status: $statusCode");
            }
        } catch (RequestException $e) {
            // Tangani error request ke API
            throw new Exception("Gagal melakukan request ke API FastAPI: " . $e->getMessage());
        }
    }
}

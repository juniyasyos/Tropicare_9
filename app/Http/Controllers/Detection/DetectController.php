<?php

namespace App\Http\Controllers\Detection;

use App\Models\Diseasedetection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DetectController extends Controller
{
    public function showIndex()
    {
        if (Auth::check()) {
            $detections = Diseasedetection::latest()->take(6)->get();
            return view('detection.index-detection', compact('detections'));
        }
        return redirect()->route('login');
    }

    public function showDetection()
    {
        if (Auth::check()) {
            return view('detection.detection');
        }
        return redirect()->route('login');
    }

    public function showHistoryDetection()
    {
        if (Auth::check()) {

            $detections = Diseasedetection::latest()->get();
            return view('detection.history-detection', compact('detections'));
        }
        return redirect()->route('login');
    }

    public function delete($id)
    {
        dd('masuk');
        try {
            // Hapus data berdasarkan id
            Diseasedetection::findOrFail($id)->delete();

            // Buat session flash dengan pesan sukses
            session()->flash('success', 'Data berhasil dihapus');
            return redirect()->route('detection.history');
        } catch (\Exception $e) {
            // Buat session flash dengan pesan error
            session()->flash('error', 'Gagal menghapus data');
            return redirect()->route('detection.history');
        }
    }

}

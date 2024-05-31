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
            $detections = Diseasedetection::where('UserId', Auth::id())->latest()->take(6)->get();
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
            return view('detection.history-detection');
        }
        return redirect()->route('login');
    }
}

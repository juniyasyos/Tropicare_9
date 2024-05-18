<?php

namespace App\Http\Controllers\Detection;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DetectController extends Controller
{
    public function showIndex()
    {
        if (Auth::check()) {
            return view('detection.index-detection');
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

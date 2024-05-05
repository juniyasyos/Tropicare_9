<?php

namespace App\Http\Controllers\Detection;

use App\Http\Helpers\Detect;
use App\Http\Helpers\DataImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DetectController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return view('detection.detect', [
                'title' => 'Detections'
            ]);
        }
        return redirect()->route('login');
    }
}

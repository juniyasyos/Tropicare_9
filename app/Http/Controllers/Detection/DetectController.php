<?php

namespace App\Http\Controllers\Detection;

use Exception;
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

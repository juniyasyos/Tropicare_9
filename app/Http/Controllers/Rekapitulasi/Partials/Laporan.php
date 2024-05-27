<?php

namespace App\Http\Controllers\Rekapitulasi\Partials;

use Carbon\Carbon;
use App\Models\Diseasedetection;
use Illuminate\Support\Facades\Auth;

class Laporan
{
    public function view()
    {
        if (Auth::check()) {
            $detections = Diseasedetection::latest()->take(6)->get();
            return view('rekapitulasi.laporan');
        }
    }
}

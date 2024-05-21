<?php

namespace App\Http\Controllers\Rekapitulasi\Partials;

// use App\Models\Expenditure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Laporan
{
    public function view()
    {
        if (Auth::check()) {
            return view('rekapitulasi.laporan');
        }
    }
}

<?php

namespace App\Http\Controllers\Rekapitulasi\Partials;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Penjualan
{
    public function view()
    {
        if (Auth::check()) {
            return view('rekapitulasi.penjualan', ['title' => 'Rekapitulasi - Penjualan']);
        }
    }
}

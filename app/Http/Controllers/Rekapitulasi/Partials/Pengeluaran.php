<?php

namespace App\Http\Controllers\Rekapitulasi\Partials;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Pengeluaran
{
    public function view()
    {
        if (Auth::check()) {
            return view('rekapitulasi.pengeluaran', ['title' => 'Rekapitulasi - Pengeluaran']);
        }
    }

    public function create($validatedData)
    {
        // Buat instance objek Transaction
        $expenditures = new Expenditure();

        // Isi atribut-atribut sesuai dengan data yang diterima dari formulir
        $expenditures->NameExpenditure = $validatedData['nama_barang'];
        $expenditures->ExpenditureDate = $validatedData['tanggal'];
        $expenditures->Description = $validatedData['description'];
        $expenditures->Amount = $validatedData['amount'];
        $expenditures->UserId = Auth::id();

        // Simpan data ke dalam tabel expendituress
        $expenditures->save();
    }

    public function update($validatedData, $expenditure)
    {
        // Isi atribut-atribut dengan data yang diterima dari formulir
        $expenditure->NameExpenditure = $validatedData['nama_barang'];
        $expenditure->ExpenditureDate = $validatedData['tanggal'];
        $expenditure->Description = $validatedData['description'];
        $expenditure->Amount = $validatedData['amount'];
        $expenditure->save();

    }
}

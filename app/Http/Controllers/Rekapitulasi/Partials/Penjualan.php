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

    public function create($validatedData)
    {
        // Buat instance objek Transaction
        $transaction = new Transaction();

        // Isi atribut-atribut sesuai dengan data yang diterima dari formulir
        $transaction->NameObject = $validatedData['nama_barang'];
        $transaction->TransactionDate = $validatedData['tanggal'];
        $transaction->Quantity = $validatedData['barang_kg'];
        $transaction->PricePerKg = $validatedData['harga_per_pcs'];
        $transaction->UserId = Auth::id(); // Atur UserId dengan ID pengguna yang sedang masuk

        // Simpan data ke dalam tabel transactions
        $transaction->save();
    }

    public function update($validatedData, $transaction)
    {
        // Isi atribut-atribut dengan data yang diterima dari formulir
        $transaction->NameObject = $validatedData['nama_barang'];
        $transaction->TransactionDate = $validatedData['tanggal'];
        $transaction->Quantity = $validatedData['barang_kg'];
        $transaction->PricePerKg = $validatedData['harga_per_pcs'];
        $transaction->save();

    }
}

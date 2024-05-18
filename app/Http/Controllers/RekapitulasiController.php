<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapitulasiController extends Controller
{
    public function rekapitulasi()
    {
        if (Auth::check()) {
            return view('rekapitulasi.index', ['title' => 'Rekapitulasi']);
        }
    }

    public function penjualan()
    {
        if (Auth::check()) {
            return view('rekapitulasi.penjualan', ['title' => 'Rekapitulasi - Penjualan']);
        }
    }

    public function pengeluaran()
    {
        if (Auth::check()) {
            return view('rekapitulasi.pengeluaran', ['title' => 'Rekapitulasi - Pengeluaran']);
        }
    }

    public function laporan()
    {
        if (Auth::check()) {
            return view('rekapitulasi.laporan', ['title' => 'Rekapitulasi - Laporan']);
        }
    }

    public function prosesFormAddNota(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'barang_kg' => 'required|integer',
            'harga_per_pcs' => 'required|numeric',
        ]);

        try {
            // Periksa apakah pengguna masuk
            if (Auth::check()) {
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

                // Redirect kembali ke halaman sebelumnya dengan pesan sukses
                return back()->with('data_saved', 'Data telah tersimpan.');
            } else {
                // Jika pengguna tidak masuk, lempar pengecualian
                throw new \Exception('Pengguna tidak terautentikasi.');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan data. Silakan coba lagi.']);
        }
    }

    public function prosesFormEditNota(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'id_list' => 'required|numeric',
                'nama_barang' => 'required|string|max:255',
                'tanggal' => 'required|date',
                'barang_kg' => 'required|integer',
                'harga_per_pcs' => 'required|numeric',
            ]);

            // Temukan transaksi yang akan diedit
            $transaction = Transaction::findOrFail($validatedData['id_list']);

            // Periksa apakah pengguna masuk dan pemilik transaksi
            if (Auth::check() && $transaction->UserId === Auth::id()) {
                // Isi atribut-atribut dengan data yang diterima dari formulir
                $transaction->NameObject = $validatedData['nama_barang'];
                $transaction->TransactionDate = $validatedData['tanggal'];
                $transaction->Quantity = $validatedData['barang_kg'];
                $transaction->PricePerKg = $validatedData['harga_per_pcs'];
                $transaction->save();

                // Redirect kembali ke halaman sebelumnya dengan pesan sukses
                return back()->with('data_updated', 'Data telah diperbarui.');
            } else {
                return back()->withErrors(['error' => 'Unauthorized or transaction not found.']);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan
            return back()->withInput()->withErrors(['error' => 'Gagal memperbarui data. Silakan coba lagi.']);
        }
    }


    public function prosesFormAddExpend(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_pengeluaran' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'pengeluaran' => 'required|numeric',
        ]);

        try {
            // Periksa apakah pengguna masuk
            if (Auth::check()) {
                // Buat instance objek Transaction
                $expenditures = new Expenditure();

                // Isi atribut-atribut sesuai dengan data yang diterima dari formulir
                $expenditures->NameExpenditure = $validatedData['nama_pengeluaran'];
                $expenditures->ExpenditureDate = $validatedData['tanggal'];
                $expenditures->Description = $validatedData['deskripsi'];
                $expenditures->Amount = $validatedData['pengeluaran'];
                $expenditures->UserId = Auth::id();

                // Simpan data ke dalam tabel expendituress
                $expenditures->save();

                // Redirect kembali ke halaman sebelumnya dengan pesan sukses
                return back()->with('data_saved', 'Data telah tersimpan.');
            } else {
                // Jika pengguna tidak masuk, lempar pengecualian
                throw new \Exception('Pengguna tidak terautentikasi.');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan data. Silakan coba lagi.']);
        }
    }
}

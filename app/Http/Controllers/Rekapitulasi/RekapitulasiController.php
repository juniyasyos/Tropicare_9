<?php

namespace App\Http\Controllers\Rekapitulasi;

use Carbon\Carbon;
use App\Models\Expenditure;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Rekapitulasi\Partials\Laporan;
use App\Http\Controllers\Rekapitulasi\Partials\Penjualan;
use App\Http\Controllers\Rekapitulasi\Partials\Pengeluaran;

class RekapitulasiController extends Controller
{
    protected $penjualan;
    protected $pengeluaran;
    protected $laporan;

    //>>>>>> Controller Globall <<<<< //
    public function __construct()
    {
        $this->penjualan = new Penjualan();
        $this->pengeluaran = new Pengeluaran();
        $this->laporan = new Laporan();
    }

    public function rekapitulasi()
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;

            // Pendapatan Bulan Ini
            $totalIncome = Transaction::where('UserId', $userId)->whereMonth('TransactionDate', $currentMonth)
                ->whereYear('TransactionDate', $currentYear)
                ->sum(\DB::raw('Quantity * PricePerKg'));

            // Pengeluaran Bulan Ini
            $totalExpenditure = Expenditure::where('UserId', $userId)->whereMonth('ExpenditureDate', $currentMonth)
                ->whereYear('ExpenditureDate', $currentYear)
                ->sum('Amount');

            $dataLaporanMonthly = $this->getLaporanMonthly();

            return view('rekapitulasi.index', compact('totalIncome', 'totalExpenditure'));
        }
    }

    public function getLaporanMonthly()
    {
        $userId = auth()->id();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Query untuk mendapatkan pengeluaran bulanan
        $expenditures = Expenditure::selectRaw('DATE(ExpenditureDate) as date, SUM(Amount) as total')
            ->where('UserId', $userId)
            ->whereBetween('ExpenditureDate', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->get();

        // Query untuk mendapatkan transaksi bulanan
        $transactions = Transaction::selectRaw('DATE(TransactionDate) as date, SUM(Quantity * PricePerKg) as total')
            ->where('UserId', $userId)
            ->whereBetween('TransactionDate', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->get();

        // menggabungkan hasil query ke dalam array untuk grafik
        $data = [];

        // Buat array dengan tanggal dari awal bulan sampai akhir bulan
        $period = Carbon::now()->startOfMonth()->daysUntil(Carbon::now()->endOfMonth());

        foreach ($period as $date) {
            $expenditure = $expenditures->firstWhere('date', $date->toDateString());
            $transaction = $transactions->firstWhere('date', $date->toDateString());

            $data[] = [
                'x' => $date->format('d'),
                'y' => [
                    'expenditure' => $expenditure->total ?? 0,
                    'transaction' => $transaction->total ?? 0,
                ]
            ];
        }

        return response()->json($data);
    }

    //>>>>>> Controller penjualan <<<<< //
    public function penjualan()
    {
        return $this->penjualan->view();
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
                // Proses add data kedatabase
                $this->penjualan->create($validatedData);

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
                // logic update data
                $this->penjualan->update($validatedData, $transaction);

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

    public function prosesFormDeleteNota(Request $request)
    {
        // dd($request);
        try {
            // Validasi data
            $validatedData = $request->validate([
                'id_delete' => 'required|numeric',
            ]);

            // Temukan transaksi yang akan dihapus
            $transaction = Transaction::findOrFail($validatedData['id_delete']);
            // dd($transaction);

            // Periksa apakah pengguna masuk dan pemilik transaksi
            if (Auth::check() && $transaction->UserId === Auth::id()) {
                // Hapus transaksi
                $transaction->delete();

                // Redirect kembali ke halaman sebelumnya dengan pesan sukses
                return back()->with('data_deleted', 'Data telah dihapus.');
            }

            // Jika pengguna tidak masuk atau bukan pemilik transaksi, lempar pengecualian
            return back()->withErrors(['error' => 'Tidak diizinkan atau transaksi tidak ditemukan.']);
        } catch (\Exception $e) {
            // Tangani kesalahan
            dd($e);
            return back()->withInput()->withErrors(['error' => 'Gagal menghapus data. Silakan coba lagi.']);
        }
    }

    //>>>>>> Controller pengeluaran <<<<< //
    public function pengeluaran()
    {
        return $this->pengeluaran->view();

    }

    public function prosesFormAddExpend(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'description' => 'required|string|max:100',
            'amount' => 'required|numeric',
        ]);

        try {
            // Periksa apakah pengguna masuk
            if (Auth::check()) {
                // Proccess add data
                $this->pengeluaran->create($validatedData);

                // Redirect kembali ke halaman sebelumnya dengan pesan sukses
                return back()->with('data_saved', 'Data telah tersimpan.');
            } else {
                // Jika pengguna tidak masuk, lempar pengecualian
                throw new \Exception('Pengguna tidak terautentikasi.');
            }
        } catch (\Exception $e) {
            dd($e);
            // Tangani kesalahan
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan data. Silakan coba lagi.']);
        }
    }

    public function prosesFormEditExpend(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'id_list' => 'required|numeric',
                'nama_barang' => 'required|string|max:100',
                'tanggal' => 'required|date',
                'description' => 'required|string|max:100',
                'amount' => 'required|numeric',
            ]);

            // Temukan transaksi yang akan diedit
            $expenditure = Expenditure::findOrFail($validatedData['id_list']);

            // Periksa apakah pengguna masuk dan pemilik transaksi
            if (Auth::check() && $expenditure->UserId === Auth::id()) {
                // Proccess update data
                $this->pengeluaran->update($validatedData, $expenditure);

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

    public function prosesFormDeleteExpend(Request $request)
    {
        // dd($request);
        try {
            // Validasi data
            $validatedData = $request->validate([
                'id_delete' => 'required|numeric',
            ]);

            // Temukan transaksi yang akan dihapus
            $expenditure = Expenditure::findOrFail($validatedData['id_delete']);
            // dd($expenditure);

            // Periksa apakah pengguna masuk dan pemilik transaksi
            if (Auth::check() && $expenditure->UserId === Auth::id()) {
                // Hapus pengeluaran
                $expenditure->delete();

                // Redirect kembali ke halaman sebelumnya dengan pesan sukses
                return back()->with('data_deleted', 'Data telah dihapus.');
            }

            // Jika pengguna tidak masuk atau bukan pemilik transaksi, lempar pengecualian
            return back()->withErrors(['error' => 'Tidak diizinkan atau transaksi tidak ditemukan.']);
        } catch (\Exception $e) {
            // Tangani kesalahan
            dd($e);
            return back()->withInput()->withErrors(['error' => 'Gagal menghapus data. Silakan coba lagi.']);
        }
    }

    //>>>>>> Controller laporan <<<<< //
    public function laporan()
    {
        return $this->laporan->view();
    }
}

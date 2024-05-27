<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rekapitulasi\RekapitulasiController;
use App\Http\Controllers\Detection\DetectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->middleware(['auth'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth'])->group(function () {
    /*
    Routes untuk deteksi penyakit
    */
    // Route untuk menampilkan halaman index dari fitur detection
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/exit', [ProfileController::class, 'exit'])->name('profile.exit');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    Routes untuk deteksi penyakit
    */
    // Route untuk menampilkan halaman index dari fitur detection
    Route::get('/detection', [DetectController::class, 'showIndex'])->name('detection.show');
    // Route untuk menampilkan halaman deteksi dari detections
    Route::get('/detection/detection', [DetectController::class, 'showDetection'])->name('detection.detect');
    // Route untuk menampilkan halaman histori deteksi dari detections
    Route::get('/detection/history', [DetectController::class, 'showHistoryDetection'])->name('detection.history');

    /*
    Routes untuk rekapitulasi data
    */
    // Route untuk menampilkan halaman rekapitulasi
    Route::get('/rekapitulasi', [RekapitulasiController::class, 'rekapitulasi'])->name('rekapitulasi.show');
    // Route untuk menampilkan halaman penjualan pada rekapitulasi
    Route::get('/rekapitulasi/penjualan', [RekapitulasiController::class, 'penjualan'])->name('rekapitulasi.penjualan');
    // Route untuk menampilkan halaman pengeluaran pada rekapitulasi
    Route::get('/rekapitulasi/pengeluaran', [RekapitulasiController::class, 'pengeluaran'])->name('rekapitulasi.pengeluaran');
    // Route untuk menampilkan halaman laporan pada rekapitulasi
    Route::get('/rekapitulasi/laporan', [RekapitulasiController::class, 'laporan'])->name('rekapitulasi.laporan');

    /*
    Routes untuk melakukan crud data pada penjualan
    */
    // Route untuk menangani form penambahan nota penjualan
    Route::post('/rekapitulasi/penjualan/add_notas', [RekapitulasiController::class, 'prosesFormAddNota'])->name('penjualan.add');
    // Route untuk menangani form update nota penjualan
    Route::post('/rekapitulasi/penjualan/edit_notas', [RekapitulasiController::class, 'prosesFormEditNota'])->name('penjualan.edit');
    // Route untuk menangani form delete nota penjualan
    Route::post('/rekapitulasi/penjualan/del_notas', [RekapitulasiController::class, 'prosesFormDeleteNota'])->name('penjualan.del');

    /*
    Routes untuk melakukan crud data pada pengeluaran
    */
    // Route untuk menangani form penambahan pengeluaran
    Route::post('/rekapitulasi/pengeluaran/add_expenditure', [RekapitulasiController::class, 'prosesFormAddExpend'])->name('pengeluaran.add');
    // Route untuk menangani form update pengeluaran
    Route::post('/rekapitulasi/pengeluaran/edit_expenditure', [RekapitulasiController::class, 'prosesFormEditExpend'])->name('pengeluaran.edit');
    // Route untuk menangani form delete pengeluaran
    Route::post('/rekapitulasi/pengeluaran/del_expenditure', [RekapitulasiController::class, 'prosesFormDeleteExpend'])->name('pengeluaran.del');

});

require __DIR__ . '/auth.php';

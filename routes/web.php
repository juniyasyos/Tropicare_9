<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapitulasiController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route detection
    Route::get('/detection', [DetectController::class, 'show'])->name('detection.show');

    // Route rekapitulasi
    Route::get('/rekapitulasi', [RekapitulasiController::class, 'rekapitulasi'])->name('rekapitulasi.show');
    Route::get('/rekapitulasi/penjualan', [RekapitulasiController::class, 'penjualan'])->name('rekapitulasi.penjualan');
    Route::get('/rekapitulasi/pengeluaran', [RekapitulasiController::class, 'pengeluaran'])->name('rekapitulasi.pengeluaran');
    Route::get('/rekapitulasi/laporan', [RekapitulasiController::class, 'laporan'])->name('rekapitulasi.laporan');
    Route::post('/rekapitulasi/laporan/add_notas', [RekapitulasiController::class, 'prosesFormAddNota'])->name('penjualan.add');
    Route::post('/rekapitulasi/laporan/add_pengeluaran', [RekapitulasiController::class, 'prosesFormAddExpend'])->name('pengeluaran.add');
});

require __DIR__ . '/auth.php';

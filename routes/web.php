<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Proses\CalonSiswaController;
use App\Http\Controllers\Proses\PembayaranController;
use App\Http\Controllers\Proses\TesOnlineController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['role:siswa'])->group(function () {
        Route::get('biodata', [BiodataController::class, 'index'])->name('biodata.index');

        Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
        Route::post('pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('calon-siswa', [CalonSiswaController::class, 'index'])->name('calon-siswa.index');
        Route::post('calon-siswa/datatable', [CalonSiswaController::class, 'datatable'])->name('calon-siswa.datatable');
        Route::get('calon-siswa/{siswa}/show', [CalonSiswaController::class, 'show'])->name('calon-siswa.show');
        Route::post('calon-siswa/{siswa}/verifikasi', [CalonSiswaController::class, 'verifikasi'])->name('calon-siswa.verifikasi');
        Route::post('calon-siswa/{siswa}/tolak', [CalonSiswaController::class, 'tolak'])->name('calon-siswa.verifikasi');

        Route::get('tes-online', [TesOnlineController::class, 'index'])->name('tes-online.index');
        Route::post('tes-online/datatable', [TesOnlineController::class, 'datatable'])->name('tes-online.datatable');
        Route::get('tes-online/{siswa}/show', [TesOnlineController::class, 'show'])->name('tes-online.show');
        Route::post('tes-online/{siswa}/verifikasi', [TesOnlineController::class, 'verifikasi'])->name('tes-online.verifikasi');
        Route::post('tes-online/{siswa}/tolak', [TesOnlineController::class, 'tolak'])->name('tes-online.verifikasi');

        Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::post('pembayaran/datatable', [PembayaranController::class, 'datatable'])->name('pembayaran.datatable');
        Route::get('pembayaran/{siswa}/show', [PembayaranController::class, 'show'])->name('pembayaran.show');
        Route::post('pembayaran/{siswa}/verifikasi', [PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');
        Route::post('pembayaran/{siswa}/tolak', [PembayaranController::class, 'tolak'])->name('pembayaran.verifikasi');
    });
});
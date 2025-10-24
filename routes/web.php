<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\StatusUsahaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');

Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

Route::get('/database', [DatabaseController::class, 'index'])->name('database');


//SATU KONTROLLER DI KECAMATAN
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
Route::get('/kecamatan/{slug}', [KecamatanController::class, 'show'])->name('kecamatan.show');
Route::get('/desa', [KecamatanController::class, 'desa'])->name('desa');
Route::get('/rentang-usia', [KecamatanController::class, 'rentangUsia'])->name('rentangusia.index');
Route::get('/rentang-usia/{slug}', [KecamatanController::class, 'showRentangUsiaDetail'])->name('rentangusia.show');



Route::get('/jenis-kelamin', [JenisKelaminController::class, 'index'])->name('jenis-kelamin');
Route::get('/jenis-kelamin/{slug}', [JenisKelaminController::class, 'show'])->name('detail_kelamin');


Route::get('/status-usaha', [StatusUsahaController::class, 'index'])->name('status-usaha.index');
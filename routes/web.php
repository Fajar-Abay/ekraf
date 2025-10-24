<?php

use Illuminate\Support\Facades\Route;
use App\Models\Desa;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LokasiController;

Route::get('/', function () {
    return view('user.beranda');
});
Route::get('/user/tentang', [UserController::class, 'tentang'])->name('user.tentang');
Route::get('/user/sektor', [UserController::class, 'sektor'])->name('user.sektor');
Route::get('/user/pendataan', [UserController::class, 'pendataan'])->name('user.pendataan');
Route::get('/user/kontak', [UserController::class, 'kontak'])->name('user.kontak');

Route::get('/get-desa-kodepos-by-kecamatan/{id}', [LokasiController::class, 'getDesaByKecamatan']);
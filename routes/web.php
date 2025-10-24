<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\Admin\UsahaController;
use App\Http\Controllers\StatusUsahaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubsektorController;

// =====================
// 🔐 AUTH ROUTES
// =====================
Route::get('/login', [AuthController::class, "showLogin"])->name("login.page");
Route::post('/login', [AuthController::class, "login"])->name("login");
Route::post('/logout', [AuthController::class, "logout"])->name("logout");

// =====================
// 🧭 ADMIN ROUTES (Protected by Auth)
// =====================
Route::middleware(['auth',"admin"])->prefix('admin')->name('admin.')->group(function () {

    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Tentang
    Route::get('/tentang', [ProfileController::class, 'index'])->name('tentang');
    Route::put('/tentang/{id}', [ProfileController::class, 'update'])->name('tentang.update');

    // Slider
    Route::resource('slider', SliderController::class);
    Route::patch('/slider/{id}/toggle', [SliderController::class, 'toggle'])->name('slider.toggle');

    // Artikel
    Route::resource('artikel', ArtikelController::class);

    // Subsektor
    Route::resource('subsektor', SubsektorController::class);
    Route::get('/subsektor/{id}/detail', [SubsektorController::class, 'detail'])->name('subsektor.detail');

    // Tidak perlu pakai prefix 'admin' kalau memang cuma 1 halaman
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('users/{id}', [KontakController::class, "destroy"])->name("kontak.destroy");


    // Rekap Usaha
    Route::get('/rekap', [UsahaController::class, 'index'])->name('rekap');

    // Database (Peta)
    Route::get('/database', [MapController::class, 'index'])->name('database');
    Route::get('/database/{id}', [MapController::class, 'show'])->name('database.show');

    // Kecamatan Statistik
    Route::get('/kecamatan/{kode}/detail', [DatabaseController::class, 'detail'])->name('kecamatan.detail');
    Route::get('/kecamatan/{kode}/statistik', [DatabaseController::class, 'statistik'])->name('kecamatan.statistik');
});

// =====================
// 📍 Desa API
// =====================
Route::get('/get-desa/{kecamatan_id}', [DesaController::class, 'getByKecamatan']);

Route::middleware(['auth'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        // Artikel (list, tambah, simpan, lihat detail)
        Route::get('/artikel', [App\Http\Controllers\Petugas\ArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/tambah', [App\Http\Controllers\Petugas\ArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/artikel', [App\Http\Controllers\Petugas\ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}', [App\Http\Controllers\Petugas\ArtikelController::class, 'show'])->name('artikel.show');
    });

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

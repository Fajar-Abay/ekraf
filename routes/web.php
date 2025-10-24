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
use App\Http\Controllers\Petugas\ArtikelController as PetugasArtikelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LokasiController;

// =====================
// 🔐 AUTH ROUTES
// =====================
Route::get('/login', [AuthController::class, "showLogin"])->name("login.page");
Route::post('/login', [AuthController::class, "login"])->name("login");
Route::post('/logout', [AuthController::class, "logout"])->name("logout");

// =====================
// 🧭 ADMIN ROUTES
// =====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
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

    // Kontak
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontak/{id}', [KontakController::class, "destroy"])->name("kontak.destroy");

    // Rekap Usaha
    Route::get('/rekap', [UsahaController::class, 'index'])->name('rekap');

    // Database (Peta)
    Route::get('/database', [MapController::class, 'index'])->name('database');
    Route::get('/database/{id}', [MapController::class, 'show'])->name('database.show');

    // Statistik Kecamatan
    Route::get('/kecamatan/{kode}/detail', [DatabaseController::class, 'detail'])->name('kecamatan.detail');
    Route::get('/kecamatan/{kode}/statistik', [DatabaseController::class, 'statistik'])->name('kecamatan.statistik');
});

// =====================
// 👩‍💼 PETUGAS ROUTES
// =====================
Route::middleware(['auth'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {
        Route::get('/artikel', [PetugasArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/tambah', [PetugasArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/artikel', [PetugasArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}', [PetugasArtikelController::class, 'show'])->name('artikel.show');
    });

// =====================
// 🌍 PENGGUNA (USER) ROUTES
// =====================
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', fn() => view('user.beranda'))->name('beranda');
    Route::get('/tentang', [UserController::class, 'tentang'])->name('tentang');
    Route::get('/sektor', [UserController::class, 'sektor'])->name('sektor');
    Route::get('/pendataan', [UserController::class, 'pendataan'])->name('pendataan');
    Route::get('/kontak', [UserController::class, 'kontak'])->name('kontak');
});

// =====================
// 📍 DATA & API
// =====================
Route::get('/get-desa/{kecamatan_id}', [DesaController::class, 'getByKecamatan']);

// =====================
// 🏠 HALAMAN UMUM
// =====================
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/database', [DatabaseController::class, 'index'])->name('database');

// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');

// Kecamatan & Desa
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
Route::get('/kecamatan/{slug}', [KecamatanController::class, 'show'])->name('kecamatan.show');
Route::get('/desa', [KecamatanController::class, 'desa'])->name('desa');

// Jenis Kelamin, Rentang Usia, Status Usaha
Route::get('/jenis-kelamin', [JenisKelaminController::class, 'index'])->name('jenis-kelamin');
Route::get('/jenis-kelamin/{slug}', [JenisKelaminController::class, 'show'])->name('detail_kelamin');
Route::get('/rentang-usia', [KecamatanController::class, 'rentangUsia'])->name('rentangusia.index');
Route::get('/rentang-usia/{slug}', [KecamatanController::class, 'showRentangUsiaDetail'])->name('rentangusia.show');
Route::get('/status-usaha', [StatusUsahaController::class, 'index'])->name('status-usaha.index');

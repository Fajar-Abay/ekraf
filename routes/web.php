<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, "showLogin"])->name("login.form");
Route::post("/login", [AuthController::class,"login"])->name("login");
Route::get("/admin",function(){
    return view("admin.dashboard");
})->name("admin.dashboard");
Route::get("/admin/tentang",function(){
    return view("admin.tentang");
})->name("admin.tentang");

Route::get("/admin/artikel",function(){
    return view("admin.artikel");
})->name("admin.artikel");

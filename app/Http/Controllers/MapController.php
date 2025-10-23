<?php

// app/Http/Controllers/Admin/MapController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function index()
    {

        return view('admin.database.index');
    }

    public function show($id)
    {
        // nanti kembangkan: ambil data detail dari DB
        return "Detail kecamatan id: $id";
    }
}

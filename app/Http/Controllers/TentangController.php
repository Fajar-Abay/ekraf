<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class TentangController extends Controller
{
    public function index()
    {
        // Ambil satu profile (misal profile utama)
        $profile = Profile::first();

        return view('tentang', compact('profile'));
    }
}

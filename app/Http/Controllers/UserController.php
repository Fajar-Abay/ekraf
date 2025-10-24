<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;

class UserController extends Controller
{
    public function index()
    {
        return view('user.beranda');
    }

    public function tentang()
    {
        return view('user.tentang');
    }

    public function sektor()
    {
        return view('user.sektor');
    }

    public function pendataan()
    {


        // Ambil semua data kecamatan
        $kecamatan = Kecamatan::orderBy('nama_kecamatan')->get(); // bisa diurutkan agar rapi

        // Kirim variabel $kecamatan ke view
        return view('user.pendataan', compact('kecamatan'));

    }

    public function kontak()
    {
        return view('user.kontak');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $berita = Artikel::paginate(10);
        return view("user.artikel.index", compact("berita"));
    }
}

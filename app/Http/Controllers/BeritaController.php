<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
   public function index(Request $request)
    {
        $q = $request->input("q");

        $berita = Artikel::when($q, function ($query) use ($q) {
            $query->where("judul", "like", "%{$q}%")
                ->orWhere("isi", "like", "%{$q}%");
        })->latest()->paginate(10);

        return view("user.artikel.index", compact("berita"));
    }


       public function show(Request $request,$id){

        $search = $request->input("search");

        $artikel = Artikel::findOrFail($id);
        $artikelTerbaru = Artikel::when($search, function ($query) use ($search) {
            $query->where("judul", "like", "%{$search}%")
                ->orWhere("isi", "like", "%{$search}%");
        })
        ->where("id", "!=", $id) // ⬅️ KECUALIKAN artikel yang sedang dibuka
        ->latest()
        ->take(3)
        ->get();


        return view("user.artikel.show", compact("artikel", "artikelTerbaru"));
      }


}

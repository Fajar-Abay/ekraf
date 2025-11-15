<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function create()
    {
        return view('petugas.artikel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'isi' => 'required|string',
            'sumber' => 'nullable|string|max:255',
        ]);

        $validated['penulis'] = Auth::user()->name();

        if ($request->hasFile('gambar')) {
             $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($validated);

        // ⬇️ ubah dari "redirect()->back()" menjadi "redirect()->route('artikel.index')"
        return redirect()->route('petugas.artikel.index')->with('success', 'Artikel berhasil disimpan!');
    }

    public function index(Request $request)
{
    $query = Artikel::query();

    // jika ada pencarian
    if ($request->filled('search')) {
        $query->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('penulis', 'like', '%' . $request->search . '%')
              ->orWhere('kategori', 'like', '%' . $request->search . '%');
    }

    $artikels = $query->latest()->paginate(6);

    return view('petugas.artikel.index', compact('artikels'));
}
public function show($id)
{
    $artikel = Artikel::findOrFail($id);
    $lainnya = Artikel::where('id', '!=', $id)
                      ->latest()
                      ->take(3)
                      ->get();

    return view('petugas.artikel.show', compact('artikel', 'lainnya'));
}


}

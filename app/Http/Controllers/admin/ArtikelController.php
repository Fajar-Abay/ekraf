<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    // Tampilkan semua artikel
    public function index()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(9);
        return view('admin.artikel.index', compact('artikels'));
    }


    // Tampilkan form tambah
    public function create()
    {
        return view('admin.artikel.create');
    }

    // Simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        $data = $request->only('judul', 'isi', 'tanggal');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    // Update artikel
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        $data = $request->only('judul', 'isi', 'tanggal');

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Hapus artikel
    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();
        return back()->with('success', 'Artikel berhasil dihapus!');
    }
}

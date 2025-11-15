<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ArtikelController extends Controller
{
    // Tampilkan semua artikel
    public function index()
    {
        try {
            $artikels = Artikel::orderBy('created_at', 'desc')->paginate(9);
            return view('admin.artikel.index', compact('artikels'));
        } catch (\Exception $e) {
            Log::error('ArtikelController@index error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menampilkan artikel.');
        }
    }

    // Tampilkan form tambah
    public function create()
    {
        try {
            return view('admin.artikel.create');
        } catch (\Exception $e) {
            Log::error('ArtikelController@create error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat membuka form tambah artikel.');
        }
    }

    // Simpan artikel baru
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'isi' => 'required|string',
                'sumber' => 'nullable|string|max:255',
            ]);

            if ($request->hasFile('gambar')) {
                $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
            }

            $validated["penulis"] = Auth::user()->name();

            Artikel::create($validated);

            return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('ArtikelController@store error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan artikel.');
        }
    }

    // Tampilkan form edit
    public function edit(Artikel $artikel)
    {
        try {
            return view('admin.artikel.edit', compact('artikel'));
        } catch (\Exception $e) {
            Log::error('ArtikelController@edit error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat membuka form edit artikel.');
        }
    }

    // Update artikel
    public function update(Request $request, Artikel $artikel)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'isi' => 'required|string',
                'sumber' => 'nullable|string|max:255',
            ]);

            if ($request->hasFile('gambar')) {
                if ($artikel->gambar) {
                    Storage::disk('public')->delete($artikel->gambar);
                }
                $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
            }

            $artikel->update($validated);

            return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('ArtikelController@update error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui artikel.');
        }
    }

    // Hapus artikel
    public function destroy(Artikel $artikel)
    {
        try {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $artikel->delete();
            return back()->with('success', 'Artikel berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('ArtikelController@destroy error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menghapus artikel.');
        }
    }
}

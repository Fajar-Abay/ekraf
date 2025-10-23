<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
   /**
     * Tampilkan halaman daftar kontak (biasanya hanya 1 data).
     */
    public function index()
    {
        // Ambil data pertama (karena biasanya hanya ada 1 kontak)
        $kontak = Kontak::first();

        // Jika belum ada data, buat default kosong agar tidak error
        if (!$kontak) {
            $kontak = Kontak::create([
                'alamat' => '-',
                'email' => '-',
                'telepon1' => null,
                'telepon2' => null,
                'telepon3' => null,
            ]);
        }

        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Form edit data kontak.
     */
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update data kontak.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon1' => 'nullable|string|max:20',
            'telepon2' => 'nullable|string|max:20',
            'telepon3' => 'nullable|string|max:20',
        ]);

        $kontak = Kontak::findOrFail($id);

        // Gunakan default jika null
        $data = [
            'alamat' => $request->alamat ?? '-',
            'email' => $request->email ?? '-',
            'telepon1' => $request->telepon1 ?: null,
            'telepon2' => $request->telepon2 ?: null,
            'telepon3' => $request->telepon3 ?: null,
        ];

        $kontak->update($data);

        return redirect()->back()->with('success', 'Data kontak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->back()->with('success', 'Data kontak berhasil dihapus!');
    }
}

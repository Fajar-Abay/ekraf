<?php

namespace App\Http\Controllers\admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil data pertama (bisa juga pakai where jika punya multi data)
        $tentang = Profile::first();

        return view('admin.tentang.index', compact('tentang'));
    }

    public function update(Request $request, $id)
    {
        $tentang = Profile::firstOrCreate(
            ['id' => $id],
            [
                'judul' => 'Ekonomi Kreatif',
                'visi' => 'Visi belum tersedia.',
                'misi' => 'Misi belum tersedia.',
                'program' => 'Belum ada program.',
                'penjelasan' => 'Belum ada penjelasan tambahan.',
            ]
        );


        // Update semua kolom
        $tentang->update([
            'judul' => $request->judul,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'program' => $request->program,
            'penjelasan' => $request->penjelasan,
        ]);

        // Upload gambar opsional
        if ($request->hasFile('gambar1')) {
            $tentang->gambar1 = $request->file('gambar1')->store('tentang', 'public');
        }
        if ($request->hasFile('gambar2')) {
            $tentang->gambar2 = $request->file('gambar2')->store('tentang', 'public');
        }
        if ($request->hasFile('gambar3')) {
            $tentang->gambar3 = $request->file('gambar3')->store('tentang', 'public');
        }

        $tentang->save();

        return redirect()->back()->with('success', 'Data Tentang berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string|max:1000',
        ]);

        // Simpan ke database, kirim email, dll (opsional)
        // Misalnya:
        // Contact::create($validated);

        return back()->with('success', 'Pesan kamu berhasil dikirim!');
    }
}

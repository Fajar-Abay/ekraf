<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa; // Pastikan model Desa diimport

class DesaController extends Controller
{
    public function getByKecamatan($kecamatan_id)
    {
        // Validasi bahwa kecamatan_id adalah angka
        if (!is_numeric($kecamatan_id)) {
            return response()->json(['error' => 'Invalid kecamatan ID'], 400);
        }

        try {
            $desas = Desa::where('kecamatan_id', $kecamatan_id)
                        ->orderBy('nama_kelurahan', 'asc') // Urutkan berdasarkan nama
                        ->get(['id', 'nama_kelurahan', "kode_pos"]); // Hanya ambil kolom yang diperlukan

            return response()->json($desas);
        } catch (\Exception $e) {
            // Log error jika diperlukan
            \Log::error('Error fetching desas: ' . $e->getMessage());

            return response()->json(['error' => 'Failed to fetch desas'], 500);
        }
    }
}

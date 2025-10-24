<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Ambil semua desa berdasarkan kecamatan
     */
    public function getDesaByKecamatan($id)
    {
        // Ambil desa berdasarkan kecamatan, termasuk kode_pos dari DB
        $desa = Desa::where('kecamatan_id', $id)
            ->select('id', 'nama', 'kode_pos') // pastikan sesuai field di DB
            ->orderBy('nama')
            ->get();

        return response()->json($desa);
    }
}

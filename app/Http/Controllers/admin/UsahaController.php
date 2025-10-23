<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Usaha;
use App\Models\Kecamatan;
use App\Models\Desa;

class UsahaController extends Controller
{
    public function index(Request $request)
    {
        $query = Usaha::with(['kecamatan', 'desa', 'subsektor']);

        // 🔍 Filter opsional
        if ($request->filled('desa_id')) {
            $query->where('desa_id', $request->desa_id);
        }
        if ($request->filled('kecamatan_id')) {
            $query->where('kecamatan_id', $request->kecamatan_id);
        }
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // 🔎 Pencarian umum
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', "%{$request->search}%")
                  ->orWhere('merk_usaha', 'like', "%{$request->search}%");
            });
        }

        $usahas = $query->paginate(10);
        $kecamatans = Kecamatan::all();

        return view('admin.rekap', compact('usahas', 'kecamatans'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('database');
    }

    public function statistik($kode)
    {
        // Coba cari kecamatan berdasarkan kd_kecamatan
        $kecamatan = Kecamatan::where('kd_kecamatan', $kode)->first();

        // Log hasil pencarian kecamatan
        if (!$kecamatan) {
            return response()->json([
                'error' => 'Data kecamatan tidak ditemukan',
                'kode' => $kode
            ], 404);
        }

        // Ambil semua usaha di kecamatan ini
        $usahas = Usaha::where('kecamatan_id', $kecamatan->id)->get();

        // Kalau belum ada usaha
        if ($usahas->isEmpty()) {
            return response()->json([
                'nama' => $kecamatan->nama_kecamatan,
                'jumlah_usaha' => 0,
                'rata_pendapatan' => 0,
                'rata_tenaga_kerja' => 0,
            ]);
        }

        // Hitung rata-rata pendapatan dan tenaga kerja
        $rataPendapatan = round($usahas->avg('pendapatan_per_bulan'));
        $rataTenaga = round($usahas->avg('jumlah_tenaga_kerja'));


        return response()->json([
            'nama' => $kecamatan->nama_kecamatan,
            'jumlah_usaha' => $usahas->count(),
            'rata_pendapatan' => $rataPendapatan,
            'rata_tenaga_kerja' => $rataTenaga,
        ]);
    }

    public function detail($kode, Request $request)
    {
        // Ambil kecamatan berdasarkan kode (misal "009")
        $kecamatan = Kecamatan::where("kd_kecamatan", $kode)->first();

        if (!$kecamatan) {
            abort(404, 'Kecamatan tidak ditemukan');
        }

        // Ambil semua usaha berdasarkan id kecamatan
        $query = Usaha::where("kecamatan_id", $kecamatan->id);

        // Filter berdasarkan dropdown
        if ($request->filter === 'terbanyak') {
            $query->orderByDesc('pendapatan_per_bulan');
        } elseif ($request->filter === 'tersedikit') {
            $query->orderBy('pendapatan_per_bulan');
        }

        $usahas = $query->get();

        // Hitung total, rata-rata, dsb
        $totalUsaha = $usahas->count();
        $rataPendapatan = $usahas->avg('pendapatan_per_bulan');
        $rataTenaga = $usahas->avg('jumlah_tenaga_kerja');

        return view('admin.database.detail', compact(
            'kecamatan',
            'usahas',
            'totalUsaha',
            'rataPendapatan',
            'rataTenaga'
        ));
    }


}

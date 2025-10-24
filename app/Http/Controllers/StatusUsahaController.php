<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusUsahaController extends Controller
{
    public function index(Request $request)
    {
        // Data statis sementara (nanti bisa diganti dari database)
        $data = [
            ['status' => 'Tidak Berbadan Usaha', 'total' => 12, 'persen' => 1.38],
            ['status' => 'Perusahaan Perorangan', 'total' => 11, 'persen' => 1.27],
            ['status' => 'Sanggar atau Perkumpulan', 'total' => 10, 'persen' => 1.15],
            ['status' => 'CV', 'total' => 9, 'persen' => 1.04],
            ['status' => 'Perseroan Terbatas (PT)', 'total' => 9, 'persen' => 1.04],
            ['status' => 'Firma', 'total' => 8, 'persen' => 0.92],
            ['status' => 'Koperasi', 'total' => 7, 'persen' => 0.81],
            ['status' => 'Yayasan', 'total' => 5, 'persen' => 0.58],
        ];

        // Ambil filter dari request
        $filter = $request->query('filter', 'default');

        // Urutkan berdasarkan filter
        if ($filter == 'terbanyak') {
            usort($data, fn($a, $b) => $b['total'] <=> $a['total']);
        } elseif ($filter == 'tersedikit') {
            usort($data, fn($a, $b) => $a['total'] <=> $b['total']);
        }

        return view('status-usaha', compact('data', 'filter'));
    }
}

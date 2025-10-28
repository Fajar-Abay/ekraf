<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\Kontak;
use App\Models\Slider;
use App\Models\Artikel;
use App\Models\Subsektor;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil slider aktif
        $sliders = Slider::where('is_active', true)->get();

        // Ambil artikel terbaru
        $artikels = Artikel::latest()->take(4)->get();

        // Hitung data pelaku ekraf
        $totalPelaku = Usaha::count();
        $pelakuLaki = Usaha::where('jenis_kelamin', 'L')->count();
        $pelakuPerempuan = Usaha::where('jenis_kelamin', 'P')->count();

        // Hitung rentang usia (pakai tanggal_lahir)
        $usia_data = collect([
            (object)[
                'rentang_usia' => '< 20 Tahun',
                'jumlah' => Usaha::whereRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) < 20')->count(),
            ],
            (object)[
                'rentang_usia' => '21 - 40 Tahun',
                'jumlah' => Usaha::whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) BETWEEN 21 AND 40')->count(),
            ],
            (object)[
                'rentang_usia' => '41 - 60 Tahun',
                'jumlah' => Usaha::whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) BETWEEN 41 AND 60')->count(),
            ]
        ]);

        $rataUsia = Usaha::whereNotNull('tanggal_lahir')
            ->selectRaw('AVG(YEAR(CURDATE()) - YEAR(tanggal_lahir)) as rata')
            ->value('rata') ?? 0;

        return view('beranda', compact(
            'sliders',
            'artikels',
            'totalPelaku',
            'pelakuLaki',
            'pelakuPerempuan',
            'usia_data',
            'rataUsia'
        ));
    }

        public function kontak()
    {
        $kontak = Kontak::first(); // ambil 1 data saja
        return view('kontak', compact('kontak'));
    }

    public function subsektor()
    {
        $subsektor = Subsektor::all(); // ambil semua data
        return view('user.sektor', compact('subsektor'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\Kontak;
use App\Models\Slider;
use App\Models\Artikel;
use App\Models\Profile;
use App\Models\Subsektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil slider aktif
        $sliders = Slider::where('is_active', true)->get();
        $profile = Profile::first();

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
            'rataUsia',
            'profile'
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

public function detail($slug)
{
    try {
        // Normalize slug: replace hyphens with spaces
        $normalizedSlug = str_replace('-', ' ', $slug);

        // Cari subsektor berdasarkan nama saja (tanpa kolom slug)
        $subsektor = Subsektor::where('nama', 'like', '%' . $normalizedSlug . '%')
            ->firstOrFail();

        // Ambil semua usaha yang ada di subsektor ini dengan pagination
        $usahas = Usaha::where('subsektor_id', $subsektor->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Hitung statistik dengan handling null values
        $jumlah_usaha = $usahas->total();
        $jumlah_tenaga_kerja = $usahas->sum(function($usaha) {
            return $usaha->jumlah_tenaga_kerja ?? 0;
        });
        $pendapatan_total = $usahas->sum(function($usaha) {
            return $usaha->pendapatan_per_bulan ?? 0;
        });

        return view('user.sektor-detail', compact(
            'subsektor',
            'usahas',
            'jumlah_usaha',
            'jumlah_tenaga_kerja',
            'pendapatan_total'
        ));

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        \Log::error("Subsektor not found for slug: {$slug}", [
            'slug' => $slug,
            'normalized_slug' => $normalizedSlug ?? null,
            'error' => $e->getMessage()
        ]);

        return redirect()->route('user.sektor')
            ->with('error', 'Subsektor tidak ditemukan. Silakan pilih dari daftar yang tersedia.');

    } catch (\Exception $e) {
        \Log::error("Error in subsektor detail method for slug: {$slug}", [
            'slug' => $slug,
            'error' => $e->getMessage()
        ]);

        return redirect()->route('user.sektor')
            ->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
    }
}
}

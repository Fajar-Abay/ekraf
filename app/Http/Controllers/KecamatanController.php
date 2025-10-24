<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KecamatanController extends Controller
{
    private $all_data;
    private $detail_data;
    private $desa_data;
    private $rentang_usia_data;
    private $detail_rentang_usia_data; // Ditambahkan

    // Template Subsektor Umum
    private $subsektor_template = [
        ['nama' => 'Desain Komunikasi Visual', 'jumlah' => 1, 'persen' => 0.12],
        ['nama' => 'Desain Produk', 'jumlah' => 1, 'persen' => 0.12],
        ['nama' => 'Film, Video dan Animasi', 'jumlah' => 2, 'persen' => 0.23],
        ['nama' => 'Fotografi', 'jumlah' => 1, 'persen' => 0.12],
        ['nama' => 'Kuliner', 'jumlah' => 1, 'persen' => 0.12],
        ['nama' => 'Musik', 'jumlah' => 2, 'persen' => 0.23],
        ['nama' => 'Penerbitan', 'jumlah' => 1, 'persen' => 0.12],
        ['nama' => 'Pengembangan Permainan', 'jumlah' => 1, 'persen' => 0.12],
        ['nama' => 'Seni Pertunjukan', 'jumlah' => 2, 'persen' => 0.23],
    ];
    
    // Helper untuk menyesuaikan subsektor placeholder
    private function generatePlaceholderSubsektor($total_pelaku, $persen_kab)
    {
        $subsektor = [];
        foreach ($this->subsektor_template as $item) {
            $item['total_kab'] = $total_pelaku;
            $item['persen_kab'] = $persen_kab;
            $subsektor[] = $item;
        }
        return $subsektor;
    }


    public function __construct()
    {
        // Data Utama untuk Index (Simulasi Database)
        $this->all_data = [
            ['Sumedang Utara', 208, 23.94], 
            ['Sumedang Selatan', 175, 20.14], 
            ['Cimalaka', 59, 6.79], 
            ['Tanjungkerta', 59, 6.79], 
            ['Tanjungsari', 43, 4.95], 
            ['Pamulihan', 41, 4.72], 
            ['Situraja', 36, 4.14], 
            ['Jatinangor', 33, 3.80], 
            ['Cisitu', 29, 3.34], 
            ['Paseh', 25, 2.88], 
            ['Rancakalong', 25, 2.88], 
            ['Ganeas', 16, 1.84], 
            ['Cisarua', 15, 1.73], 
            ['Conggeang', 13, 1.50], 
            ['Cimanggung', 13, 1.50], 
            ['Sukasari', 12, 1.38], 
            ['Jatinunggal', 11, 1.27], 
            ['Darmaraja', 10, 1.15], 
            ['Buahdua', 9, 1.04], 
            ['Wado', 9, 1.04], 
            ['Jatigede', 8, 0.92], 
            ['Ujungjaya', 7, 0.81], 
            ['Cibugel', 5, 0.58], 
            ['Tomo', 4, 0.46], 
            ['Tanjungmedar', 3, 0.35], 
            ['Surian', 1, 0.12], 
        ];

        // INISIALISASI detail_data UNTUK MENGHINDARI ERROR 404
        $this->detail_data = [];
        
        foreach ($this->all_data as $item) {
            $nama_kecamatan = $item[0];
            $slug = Str::slug($nama_kecamatan);
            $total_pelaku = $item[1];
            $persen_kab = $item[2];

            $this->detail_data[$slug] = [
                'nama' => $nama_kecamatan,
                'pelaku' => $total_pelaku,
                'persentase' => $persen_kab,
                
                // Data info default / placeholder
                'info' => [
                    'desa' => 10, 
                    'luas' => 50, 
                    'penduduk' => 50000, 
                    'kepadatan' => 1000,
                    'sumber' => 'Data Placeholder',
                ],
                'subsektor' => $this->generatePlaceholderSubsektor($total_pelaku, $persen_kab),
            ];
        }
        
        // OVERRIDE DATA SPESIFIK JIKA ADA (Contoh Buahdua)
        $this->detail_data['buahdua']['info'] = [
            'desa' => 14, 
            'luas' => 110.8, 
            'penduduk' => 33710, 
            'kepadatan' => 304.24,
            'sumber' => 'Publikasi BPS Kab. Sumedang',
        ];
        
        // DATA DESA Terbanyak
        $this->desa_data = [
            ['Situ', 'Sumedang Utara', 56, 6.44], 
            ['Kota Kulon', 'Sumedang Selatan', 53, 6.10], 
            ['Regol Wetan', 'Sumedang Selatan', 41, 4.72], 
            ['Kotakaler', 'Sumedang Utara', 33, 3.80], 
            ['Jatihurip', 'Sumedang Utara', 29, 3.34], 
            ['Talun', 'Sumedang Selatan', 24, 2.76], 
            ['Cipameungpeuk', 'Sumedang Selatan', 23, 2.65], 
            ['Cipanas', 'Tanjungkerta', 22, 2.53], 
            ['Pasanggrahan', 'Sumedang Selatan', 18, 2.07], 
            ['Rancamulya', 'Sumedang Utara', 17, 1.96], 
            ['Sundamekar', 'Cisitu', 17, 1.96], 
            ['Padasuka', 'Sumedang Utara', 15, 1.73], 
            ['Pamulihan', 'Pamulihan', 13, 1.50], 
            ['Cipacing', 'Jatinangor', 13, 1.50], 
            ['Situraja Utara', 'Situraja', 11, 1.27], 
            ['Mekarjaya', 'Sumedang Utara', 11, 1.27], 
            ['Ciptasari', 'Pamulihan', 10, 1.15], 
            ['Gudang', 'Tanjungsari', 10, 1.15], 
            ['Mandalaherang', 'Cimalaka', 9, 1.04], 
            ['Jatimulya', 'Sumedang Utara', 9, 1.04], 
        ];

        // DATA RENTANG USIA KABUPATEN
        $this->rentang_usia_data = [
            ['21-30 Tahun', 532, 61.22], 
            ['31-40 Tahun', 102, 11.74], 
            ['<20 Tahun', 27, 3.11], 
            ['41-50 Tahun', 106, 12.20], 
            ['51-60 Tahun', 46, 5.29], 
            ['>60 Tahun', 10, 1.15], 
        ];

        // 🔥 DATA BARU: DETAIL SUBSEKTOR PER RENTANG USIA 🔥
        $this->detail_rentang_usia_data = [
            '21-30-tahun' => [
                'nama' => '21-30 Tahun',
                'pelaku' => 532,
                'persentase' => 61.22,
                'subsektor_tertaut' => 20,
                'subsektor' => [ 
                    ['nama' => 'Aplikasi', 'jumlah' => 22, 'persen' => 2.53, 'total_kab' => 28, 'persen_kab' => 3.22],
                    ['nama' => 'Arsitektur', 'jumlah' => 6, 'persen' => 0.69, 'total_kab' => 7, 'persen_kab' => 0.81],
                    ['nama' => 'Desain Interior', 'jumlah' => 6, 'persen' => 0.69, 'total_kab' => 9, 'persen_kab' => 1.04],
                    ['nama' => 'Desain Komunikasi Visual', 'jumlah' => 10, 'persen' => 1.15, 'total_kab' => 15, 'persen_kab' => 1.73],
                    ['nama' => 'Desain Produk', 'jumlah' => 12, 'persen' => 1.38, 'total_kab' => 21, 'persen_kab' => 2.42],
                    ['nama' => 'Fashion', 'jumlah' => 24, 'persen' => 2.76, 'total_kab' => 49, 'persen_kab' => 5.64],
                    ['nama' => 'Film, Video dan Animasi', 'jumlah' => 33, 'persen' => 3.80, 'total_kab' => 46, 'persen_kab' => 5.29],
                    ['nama' => 'Fotografi', 'jumlah' => 30, 'persen' => 3.45, 'total_kab' => 45, 'persen_kab' => 5.18],
                    ['nama' => 'Kriya', 'jumlah' => 43, 'persen' => 4.95, 'total_kab' => 101, 'persen_kab' => 11.62],
                    ['nama' => 'Kuliner', 'jumlah' => 33, 'persen' => 3.80, 'total_kab' => 101, 'persen_kab' => 11.62],
                    ['nama' => 'Musik', 'jumlah' => 112, 'persen' => 12.89, 'total_kab' => 156, 'persen_kab' => 17.95],
                    ['nama' => 'Penerbitan', 'jumlah' => 7, 'persen' => 0.81, 'total_kab' => 10, 'persen_kab' => 1.15],
                    ['nama' => 'Pengembangan Permainan', 'jumlah' => 10, 'persen' => 1.15, 'total_kab' => 12, 'persen_kab' => 1.38],
                    ['nama' => 'Periklanan', 'jumlah' => 5, 'persen' => 0.58, 'total_kab' => 8, 'persen_kab' => 0.92],
                    ['nama' => 'Radio dan Televisi', 'jumlah' => 2, 'persen' => 0.23, 'total_kab' => 3, 'persen_kab' => 0.35],
                    // Tambahkan data lengkap di sini jika ada
                ]
            ],
            // Data placeholder untuk rentang usia lain (agar tidak 404)
            '31-40-tahun' => ['nama' => '31-40 Tahun', 'pelaku' => 102, 'persentase' => 11.74, 'subsektor_tertaut' => 5, 'subsektor' => $this->generatePlaceholderSubsektor(102, 11.74)],
            'kurang-dari-20-tahun' => ['nama' => '<20 Tahun', 'pelaku' => 27, 'persentase' => 3.11, 'subsektor_tertaut' => 3, 'subsektor' => $this->generatePlaceholderSubsektor(27, 3.11)],
            '41-50-tahun' => ['nama' => '41-50 Tahun', 'pelaku' => 106, 'persentase' => 12.20, 'subsektor_tertaut' => 7, 'subsektor' => $this->generatePlaceholderSubsektor(106, 12.20)],
            '51-60-tahun' => ['nama' => '51-60 Tahun', 'pelaku' => 46, 'persentase' => 5.29, 'subsektor_tertaut' => 4, 'subsektor' => $this->generatePlaceholderSubsektor(46, 5.29)],
            'lebih-dari-60-tahun' => ['nama' => '>60 Tahun', 'pelaku' => 10, 'persentase' => 1.15, 'subsektor_tertaut' => 2, 'subsektor' => $this->generatePlaceholderSubsektor(10, 1.15)],
        ];
    }
    
    // METODE INDEX() UNTUK HALAMAN DAFTAR KECAMATAN
    public function index(Request $request)
    {
        $perPage = 15; 
        $totalItems = count($this->all_data);
        
        $current_page = $request->query('page', 1); 
        $current_page = max(1, (int)$current_page);

        $offset = ($current_page - 1) * $perPage;
        
        $data_kecamatan = array_slice($this->all_data, $offset, $perPage);
        
        $start_index = $offset;

        $totalPages = ceil($totalItems / $perPage);

        return view('kecamatan', [ 
            'data_kecamatan' => $data_kecamatan,
            'current_page' => $current_page,
            'start_index' => $start_index,
            'totalPages' => $totalPages,
        ]);
    }


    // METODE SHOW($slug) UNTUK HALAMAN DETAIL KECAMATAN
    public function show($slug)
    {
        $data = $this->detail_data[$slug] ?? null;

        if (!$data) {
            abort(404, 'Data kecamatan tidak ditemukan.');
        }

        return view('detail-kecamatan', compact('data'));
    }

    // METODE desa() UNTUK HALAMAN DESA TERBANYAK
    public function desa() 
    {
        $data_desa = $this->desa_data;
        $start_index = 0; 

        return view('desa', compact('data_desa', 'start_index')); 
    }

    // METODE rentangUsia() UNTUK HALAMAN INDEKS RENTANG USIA
    public function rentangUsia()
    {
        $data_usia = $this->rentang_usia_data; 
        $start_index = 0; 
        return view('rentang-usia', compact('data_usia', 'start_index')); 
    }
    
    // 🔥 METODE BARU: SHOW DETAIL RENTANG USIA 🔥
    public function showRentangUsiaDetail($slug)
    {
        // Penyesuaian slug untuk format data (misal: '21-30 Tahun' menjadi '21-30-tahun')
        if ($slug == 'kurang-20-tahun') {
            $slug = 'kurang-dari-20-tahun';
        } elseif ($slug == 'lebih-60-tahun') {
             $slug = 'lebih-dari-60-tahun';
        }

        $data = $this->detail_rentang_usia_data[$slug] ?? null;

        if (!$data) {
            abort(404, 'Data detail untuk rentang usia: "' . $slug . '" tidak ditemukan.');
        }
        
        // Asumsi view-nya bernama 'detail-rentang-usia'
        return view('detail-rentang-usia', compact('data')); 
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisKelaminController extends Controller
{
    public function index()
    {
        $data = [
            ['nama' => 'Laki-laki', 'jumlah' => 483, 'persentase' => 55.58],
            ['nama' => 'Perempuan', 'jumlah' => 386, 'persentase' => 44.42],
        ];

        return view('jenis-kelamin', compact('data'));
    }

    public function show($slug)
    {
        $slug = strtolower($slug);

        if ($slug == 'laki-laki') {
            $judul = 'Laki-laki';
            $jumlah = 483;
            $persentase = 55.58;
        } elseif ($slug == 'perempuan') {
            $judul = 'Perempuan';
            $jumlah = 386;
            $persentase = 44.42;
        } else {
            abort(404);
        }

        // data subsektor (sama untuk keduanya)
        $data_subsektor = [
            ['Aplikasi', 22, 2.53, 28, 3.22],
            ['Arsitektur', 6, 0.69, 7, 0.81],
            ['Desain Interior', 6, 0.69, 9, 1.04],
            ['Desain Komunikasi Visual', 10, 1.15, 15, 1.73],
            ['Desain Produk', 12, 1.38, 21, 2.42],
            ['Fashion', 24, 2.76, 49, 5.64],
            ['Film, Video dan Animasi', 33, 3.80, 46, 5.29],
            ['Fotografi', 30, 3.45, 45, 5.18],
            ['Kriya', 43, 4.95, 101, 11.62],
            ['Kuliner', 33, 3.80, 101, 11.62],
            ['Musik', 112, 12.89, 156, 17.95],
            ['Penerbitan', 7, 0.81, 10, 1.15],
            ['Pengembangan Permainan', 10, 1.15, 12, 1.38],
            ['Periklanan', 5, 0.58, 8, 0.92],
            ['Radio dan Televisi', 2, 0.23, 3, 0.35],
            ['Seni Pertunjukan', 138, 15.88, 178, 20.48],
            ['Seni Rupa', 49, 5.64, 62, 7.13],
            ['HKI (Hak Kekayaan Intelektual)', 0, 0, 0, 0],
            ['Industri Kecantikan', 0, 0, 0, 0],
            ['Kustomisasi Otomotif', 0, 0, 0, 0],
        ];

        // subsektor terbanyak
        $subsektor_terbanyak = '20';

        $data = [
            'judul' => $judul,
            'jumlah' => $jumlah,
            'persentase' => $persentase,
            'subsektor_terbanyak' => $subsektor_terbanyak,
            'data_subsektor' => $data_subsektor
        ];

        return view('detail_kelamin', compact('data'));
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    public function run()
    {
        $artikels = [
            [
                'judul' => 'Festival Kreatif Sumedang 2025 Resmi Dibuka',
                'isi' => 'Festival Kreatif Sumedang 2025 resmi dibuka dengan menampilkan karya seni, musik, dan kuliner lokal. Acara ini dihadiri oleh pelaku ekonomi kreatif dari berbagai kecamatan.',
                'tanggal' => '2025-10-01',
            ],
            [
                'judul' => 'Pelatihan Digital Marketing untuk Pelaku UMKM',
                'isi' => 'Dinas Pariwisata dan Ekonomi Kreatif menggelar pelatihan digital marketing guna meningkatkan kemampuan promosi online bagi pelaku usaha lokal.',
                'tanggal' => '2025-09-15',
            ],
            [
                'judul' => 'Kompetisi Desain Logo Ekraf Sumedang',
                'isi' => 'Kompetisi desain logo ini terbuka untuk umum dengan tujuan menemukan identitas visual baru bagi Ekraf Sumedang. Pemenang akan mendapatkan penghargaan dan hadiah menarik.',
                'tanggal' => '2025-08-22',
            ],
            [
                'judul' => 'Kolaborasi Seniman Lokal Ciptakan Pameran Seni Rupa',
                'isi' => 'Para seniman muda di Sumedang berkolaborasi dalam pameran bertajuk "Warna dari Tanah Sunda". Karya yang ditampilkan mencerminkan budaya dan kehidupan masyarakat modern.',
                'tanggal' => '2025-07-30',
            ],
            [
                'judul' => 'Inovasi Kuliner Tradisional Jadi Daya Tarik Baru Wisatawan',
                'isi' => 'Pelaku kuliner di Sumedang mulai memadukan resep tradisional dengan sentuhan modern. Inovasi ini diharapkan dapat menarik lebih banyak wisatawan ke daerah tersebut.',
                'tanggal' => '2025-06-18',
            ],
        ];

        foreach ($artikels as $artikel) {
            DB::table('artikels')->insert([
                'judul' => $artikel['judul'],
                'isi' => $artikel['isi'],
                'tanggal' => $artikel['tanggal'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

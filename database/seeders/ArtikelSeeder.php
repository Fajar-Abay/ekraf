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
                'penulis' => 'Admin',
                'kategori' => 'Acara',
                'gambar' => 'festival.jpg',
                'isi' => 'Festival Kreatif Sumedang 2025 resmi dibuka dengan menampilkan karya seni, musik, dan kuliner lokal. Acara ini dihadiri oleh pelaku ekonomi kreatif dari berbagai kecamatan.',
                'sumber' => 'sumedang.go.id',
            ],
            [
                'judul' => 'Pelatihan Digital Marketing untuk Pelaku UMKM',
                'penulis' => 'Admin',
                'kategori' => 'Pelatihan',
                'gambar' => 'pelatihan.jpg',
                'isi' => 'Dinas Pariwisata dan Ekonomi Kreatif menggelar pelatihan digital marketing guna meningkatkan kemampuan promosi online bagi pelaku usaha lokal.',
                'sumber' => 'dispar.sumedang.go.id',
            ],
            [
                'judul' => 'Kompetisi Desain Logo Ekraf Sumedang',
                'penulis' => 'Admin',
                'kategori' => 'Kompetisi',
                'gambar' => 'kompetisi.jpg',
                'isi' => 'Kompetisi desain logo ini terbuka untuk umum dengan tujuan menemukan identitas visual baru bagi Ekraf Sumedang. Pemenang akan mendapatkan penghargaan dan hadiah menarik.',
                'sumber' => null,
            ],
            [
                'judul' => 'Kolaborasi Seniman Lokal Ciptakan Pameran Seni Rupa',
                'penulis' => 'Admin',
                'kategori' => 'Seni',
                'gambar' => 'pameran.jpg',
                'isi' => 'Para seniman muda di Sumedang berkolaborasi dalam pameran bertajuk "Warna dari Tanah Sunda". Karya yang ditampilkan mencerminkan budaya dan kehidupan masyarakat modern.',
                'sumber' => 'seni.sumedang.go.id',
            ],
            [
                'judul' => 'Inovasi Kuliner Tradisional Jadi Daya Tarik Baru Wisatawan',
                'penulis' => 'Admin',
                'kategori' => 'Kuliner',
                'gambar' => 'kuliner.jpg',
                'isi' => 'Pelaku kuliner di Sumedang mulai memadukan resep tradisional dengan sentuhan modern. Inovasi ini diharapkan dapat menarik lebih banyak wisatawan ke daerah tersebut.',
                'sumber' => 'kuliner.sumedang.go.id',
            ],
        ];

        foreach ($artikels as $artikel) {
            DB::table('artikels')->insert([
                'judul' => $artikel['judul'],
                'penulis' => $artikel['penulis'],
                'gambar' => null,
                'isi' => $artikel['isi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

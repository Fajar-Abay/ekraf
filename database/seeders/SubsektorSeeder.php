<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubsektorSeeder extends Seeder
{
    public function run()
    {
        $subsektors = [
            ['nama' => 'Seni Pertunjukan', 'ikon' => 'fa-solid fa-theater-masks', 'jumlah' => 178],
            ['nama' => 'Musik', 'ikon' => 'fa-solid fa-music', 'jumlah' => 156],
            ['nama' => 'Kriya', 'ikon' => 'fa-solid fa-hands', 'jumlah' => 101],
            ['nama' => 'Kuliner', 'ikon' => 'fa-solid fa-utensils', 'jumlah' => 101],
            ['nama' => 'Seni Rupa', 'ikon' => 'fa-solid fa-palette', 'jumlah' => 62],
            ['nama' => 'Fashion', 'ikon' => 'fa-solid fa-shirt', 'jumlah' => 49],
            ['nama' => 'Film, Video dan Animasi', 'ikon' => 'fa-solid fa-film', 'jumlah' => 46],
            ['nama' => 'Fotografi', 'ikon' => 'fa-solid fa-camera', 'jumlah' => 45],
            ['nama' => 'Aplikasi', 'ikon' => 'fa-solid fa-mobile-screen-button', 'jumlah' => 28],
            ['nama' => 'Desain Produk', 'ikon' => 'fa-solid fa-cube', 'jumlah' => 21],
            ['nama' => 'Desain Komunikasi Visual', 'ikon' => 'fa-solid fa-pen-nib', 'jumlah' => 15],
            ['nama' => 'Pengembangan Permainan', 'ikon' => 'fa-solid fa-gamepad', 'jumlah' => 12],
            ['nama' => 'Penerbitan', 'ikon' => 'fa-solid fa-book', 'jumlah' => 10],
            ['nama' => 'Desain Interior', 'ikon' => 'fa-solid fa-couch', 'jumlah' => 9],
            ['nama' => 'Periklanan', 'ikon' => 'fa-solid fa-bullhorn', 'jumlah' => 8],
            ['nama' => 'Arsitektur', 'ikon' => 'fa-solid fa-drafting-compass', 'jumlah' => 7],
            ['nama' => 'Radio dan Televisi', 'ikon' => 'fa-solid fa-tower-broadcast', 'jumlah' => 3],
        ];

        foreach ($subsektors as $subsektor) {
            DB::table('subsektors')->insert([
                'nama' => $subsektor['nama'],
                'ikon' => $subsektor['ikon'],
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

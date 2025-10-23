<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        // Hapus data lama biar bersih
        Profile::truncate();

        // Tambahkan data default
        Profile::create([
            'judul'       => 'Tentang Ekonomi Kreatif',
            'visi'        => 'Membangun masyarakat kreatif, inovatif, dan berdaya saing tinggi.',
            'misi'        => '1. Mendorong kolaborasi antar pelaku ekonomi kreatif.
                              2. Memberikan pelatihan dan pendampingan usaha mikro.
                              3. Mengembangkan potensi lokal berbasis digital.',
            'program'     => 'Pelatihan kewirausahaan, inkubasi bisnis, promosi produk lokal, dan digitalisasi UMKM.',
            'penjelasan'  => 'Ekonomi kreatif merupakan sektor unggulan dalam membangun kemandirian masyarakat
                              serta meningkatkan perekonomian daerah melalui inovasi dan kolaborasi.',
            'gambar1'     => null, // atau bisa isi "image/bg.jpg" jika mau default
            'gambar2'     => null,
            'gambar3'     => null,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}

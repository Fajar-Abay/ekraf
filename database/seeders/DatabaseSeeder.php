<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subsektor;
use Illuminate\Database\Seeder;
use Database\Seeders\UsahaSeeder;
use Database\Seeders\KontakSeeder;
use Database\Seeders\ArtikelSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\SubsektorSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user contoh
        User::factory()->create([
            'name' => 'ekraf',
            'email' => 'ekraf@sumedang.com',
            "password" => "sumedangsimpati",
            "role" => "admin"
        ]);

        $this->call([
            KecamatanSeeder::class, // Isi tabel parent dulu
            DesaSeeder::class,
            ProfileSeeder::class ,
            KontakSeeder::class  , // Baru isi tabel child
            UsahaSeeder::class,
            SubsektorSeeder::class,
            ArtikelSeeder::class
        ]);
    }
}

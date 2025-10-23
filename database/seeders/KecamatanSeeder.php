<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        $path = public_path('maps/32.11_kecamatan.geojson');
        $geojson = json_decode(file_get_contents($path), true);

        foreach ($geojson['features'] as $feature) {
            $kode = $feature['properties']['kd_kecamatan'] ?? null;
            $nama = $feature['properties']['nm_kecamatan'] ?? null;

            if (!$kode) continue;

            // Cek apakah sudah ada
            $existing = Kecamatan::where('kd_kecamatan', $kode)->first();

            if ($existing) {
                $existing->update(['nama_kecamatan' => $nama]);
                echo "🔄 Update: {$kode} - {$nama}\n";
            } else {
                Kecamatan::create([
                    'kd_kecamatan' => $kode,
                    'nama_kecamatan' => $nama,
                ]);
                echo "✅ Tambah: {$kode} - {$nama}\n";
            }
        }
    }
}

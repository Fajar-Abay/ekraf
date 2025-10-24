<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kecamatan;
use App\Models\Desa;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kosongkan tabel dulu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Desa::truncate();
        Kecamatan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Import kecamatan
        $this->importKecamatan(storage_path('app/wilayah/32.11_kecamatan.geojson'));

        // 3. Import desa/kelurahan
        $this->importDesa(storage_path('app/wilayah/32.11_kelurahan.geojson'));
    }

    private function importKecamatan($path)
    {
        echo "📍 Mengimpor data kecamatan...\n";

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        $count = 0;

        foreach ($data['features'] as $feature) {
            $props = array_change_key_case($feature['properties'], CASE_LOWER);

            $kode = strtoupper(trim($props['kd_kecamatan'] ?? $props['kode'] ?? ''));
            $nama = $props['nm_kecamatan'] ?? $props['nama'] ?? null;

            if (!$kode || !$nama) continue;

            Kecamatan::create([
                'kode' => $kode,
                'nama' => $nama,
                'kode_pos' => $props['kode_pos'] ?? null,
            ]);

            $count++;
        }

        echo "✅ Selesai impor kecamatan ({$count} data).\n";
    }

    private function importDesa($path)
    {
        echo "🏘️ Mengimpor data desa/kelurahan...\n";

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        $count = 0;
        $notFound = 0;

        foreach ($data['features'] as $feature) {
            $props = array_change_key_case($feature['properties'], CASE_LOWER);

            $kode = strtoupper(trim($props['kd_kelurahan'] ?? $props['kode'] ?? ''));
            $nama = $props['nm_kelurahan'] ?? $props['nm_desa'] ?? $props['nama'] ?? null;
            $kdKecamatan = strtoupper(trim($props['kd_kecamatan'] ?? ''));

            if (!$kode || !$nama || !$kdKecamatan) {
                $notFound++;
                continue;
            }

            $kecamatanId = Kecamatan::where('kode', $kdKecamatan)->value('id');

            if (!$kecamatanId) {
                echo "⚠️ Kecamatan tidak ditemukan untuk desa {$nama} (kd_kecamatan={$kdKecamatan})\n";
                $notFound++;
                continue;
            }

            // Gunakan create() agar semua data masuk tanpa UNIQUE
            Desa::create([
                'kode' => $kode,
                'nama' => $nama,
                'kecamatan_id' => $kecamatanId,
                'kode_pos' => $props['kode_pos'] ?? null,
            ]);

            $count++;
        }

        echo "✅ Selesai impor desa/kelurahan ({$count} data, {$notFound} dilewati karena kecamatan tidak ditemukan).\n";
    }
}

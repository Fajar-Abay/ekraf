<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data desa / kelurahan.
     */
    public function run(): void
    {
        $path = public_path('maps/32.11_kelurahan.geojson');

            if (!file_exists($path)) {
                $this->command->error("❌ File tidak ditemukan di: {$path}");
                return;
            }

            $geojson = json_decode(file_get_contents($path), true);

            if (!isset($geojson['features'])) {
                $this->command->error("❌ File GeoJSON tidak valid!");
                return;
            }

            $total = count($geojson['features']);
            $masuk = 0;
            $skip = 0;

            $this->command->info("📁 Memproses {$total} kelurahan dari file GeoJSON...");

            foreach ($geojson['features'] as $index => $feature) {
                $props = $feature['properties'] ?? [];

                $kdKecamatan = isset($props['kd_kecamatan']) ? trim($props['kd_kecamatan']) : null;
                $kdKelurahan = isset($props['kd_kelurahan']) ? trim($props['kd_kelurahan']) : null; // TAMBAH INI
                $nama = $props['nm_kelurahan'] ?? $props['nm_desa'] ?? null;
                $kodePos = $props['kode_pos'] ?? null;

                // Validasi data wajib - TAMBAH VALIDASI kd_kelurahan
                if (!$kdKecamatan || !$kdKelurahan || !$nama) {
                    $this->command->warn("⚠️ Skip: Data tidak lengkap - Kec:{$kdKecamatan}, Kel:{$kdKelurahan}, Nama:{$nama}");
                    $skip++;
                    continue;
                }

                // Normalisasi kode kecamatan (hapus leading zero)
                $kdKecamatanInt = (int) ltrim($kdKecamatan, '0');
                $kdKelurahanInt = (int) ltrim($kdKelurahan, '0'); // Normalisasi juga kode kelurahan

                // Cari kecamatan berdasarkan kd_kecamatan
                $kecamatan = Kecamatan::whereRaw('CAST(kd_kecamatan AS UNSIGNED) = ?', [$kdKecamatanInt])->first();

                if (!$kecamatan) {
                    $this->command->warn("⚠️ Skip: Kecamatan {$kdKecamatan} tidak ditemukan untuk kelurahan {$nama}");
                    $skip++;
                    continue;
                }

                try {
                    // PERBAIKI: Tambah kd_kelurahan sebagai kriteria unik
                    $desa = Desa::updateOrCreate(
                        [
                            'kecamatan_id' => $kecamatan->id,
                            'kd_kelurahan' => $kdKelurahanInt, // KRITERIA UNIK TAMBAHAN
                        ],
                        [
                            'nama_kelurahan' => $nama,
                            'kode_pos' => $kodePos,
                        ]
                    );

                    $status = $desa->wasRecentlyCreated ? "✅ Tambah" : "🔄 Update";
                    $this->command->info("{$status}: [{$index}/{$total} - {$nama} (Kec. {$kecamatan->nama_kecamatan})");
                    $masuk++;

                } catch (\Exception $e) {
                    $this->command->error("❌ Error: Gagal menyimpan {$kdKelurahan} - {$nama}: " . $e->getMessage());
                    $skip++;
                }
            }

        $this->command->line("\n📊 HASIL AKHIR:");
        $this->command->line("📁 Total fitur GeoJSON: {$total}");
        $this->command->line("✅ Berhasil diproses: {$masuk}");
        $this->command->line("⚠️ Dilewati/gagal: {$skip}");

        if ($masuk > 0) {
            $this->command->line("🎉 Seeder berhasil! {$masuk} kelurahan telah diimpor.");
        } else {
            $this->command->error("💥 Tidak ada data yang berhasil diimpor!");
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        $path = public_path('maps/32.11_kelurahan.geojson');
        $sqlPath = public_path('ekraf.sql'); // <-- Ubah sesuai lokasi file SQL kamu

        // ===============================
        // 🗂️ Ambil kode pos dari file SQL
        // ===============================
        $kodePosMap = [];
        if (file_exists($sqlPath)) {
            $this->command->info("📖 Membaca data kode pos dari file SQL...");

            $content = file_get_contents($sqlPath);

            // Cocokkan pola: ('nama_kelurahan', 'kode_pos')
            preg_match_all("/'([^']+)'\s*,\s*'(\d{5})'/", $content, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $namaKelurahan = strtolower(trim($match[1]));
                $kodePos = trim($match[2]);
                $kodePosMap[$namaKelurahan] = $kodePos;
            }

            $this->command->info("✅ Ditemukan " . count($kodePosMap) . " data kode pos dari SQL");
        } else {
            $this->command->warn("⚠️ File SQL tidak ditemukan di {$sqlPath}");
        }

        // ===============================
        // 🌍 Baca GeoJSON seperti biasa
        // ===============================
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
            $kdKelurahan = isset($props['kd_kelurahan']) ? trim($props['kd_kelurahan']) : null;
            $nama = $props['nm_kelurahan'] ?? $props['nm_desa'] ?? null;
            $kodePos = $props['kode_pos'] ?? null;

            // 🟡 Coba ambil kode_pos dari SQL jika kosong
            if (!$kodePos && isset($kodePosMap[strtolower($nama)])) {
                $kodePos = $kodePosMap[strtolower($nama)];
            }

            // Validasi data wajib
            if (!$kdKecamatan || !$kdKelurahan || !$nama) {
                $this->command->warn("⚠️ Skip: Data tidak lengkap - Kec:{$kdKecamatan}, Kel:{$kdKelurahan}, Nama:{$nama}");
                $skip++;
                continue;
            }

            // Normalisasi kode
            $kdKecamatanInt = (int) ltrim($kdKecamatan, '0');
            $kdKelurahanInt = (int) ltrim($kdKelurahan, '0');

            // Cari kecamatan berdasarkan kd_kecamatan
            $kecamatan = Kecamatan::whereRaw('CAST(kd_kecamatan AS UNSIGNED) = ?', [$kdKecamatanInt])->first();

            if (!$kecamatan) {
                $this->command->warn("⚠️ Skip: Kecamatan {$kdKecamatan} tidak ditemukan untuk kelurahan {$nama}");
                $skip++;
                continue;
            }

            try {
                $desa = Desa::updateOrCreate(
                    [
                        'kecamatan_id' => $kecamatan->id,
                        'kd_kelurahan' => $kdKelurahanInt,
                    ],
                    [
                        'nama_kelurahan' => $nama,
                        'kode_pos' => $kodePos,
                    ]
                );

                $status = $desa->wasRecentlyCreated ? "✅ Tambah" : "🔄 Update";
                $this->command->info("{$status}: [{$index}/{$total}] {$nama} (Kec. {$kecamatan->nama_kecamatan})");
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

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usaha;
use App\Models\Kecamatan;
use App\Models\Desa;

class UsahaSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Pastikan tabel tidak kosong agar tidak error foreign key
        $kecamatans = Kecamatan::all();

        if ($kecamatans->isEmpty()) {
            $this->command->warn("⚠️ Tidak ada data di tabel 'kecamatans'. Jalankan KecamatanSeeder dulu!");
            return;
        }

        // 🔹 Data dummy
        $usahas = [
            [
                'nama_lengkap' => 'Yani Suryani',
                'nik' => '3276016701010001',
                'no_telepon' => '081234567890',
                'tanggal_lahir' => '1980-01-01',
                'email' => 'yani@example.com',
                'jenis_kelamin' => 'P',
                'merk_usaha' => 'Warung Nasi Bu Yani',
                'akun_sosial_media' => '@warungyani',
                'jenis_usaha' => 'Kuliner',
                'url_website' => null,
                'status_usaha' => 'Perusahaan Perorangan',
                'url_ecommerce' => null,
                'jumlah_tenaga_kerja' => 3,
                'deskripsi_kegiatan' => 'Menyediakan makanan tradisional khas Sunda.',
                'lingkup_pemasaran' => 'Lokal',
                'asal_bahan' => 'Lokal',
                'pendapatan_per_bulan' => 7500000,
            ],
            [
                'nama_lengkap' => 'Budi Rahmat',
                'nik' => '3276012306010002',
                'no_telepon' => '082134567891',
                'tanggal_lahir' => '1985-06-23',
                'email' => 'budi@example.com',
                'jenis_kelamin' => 'L',
                'merk_usaha' => 'Toko Pakaian Sejahtera',
                'akun_sosial_media' => '@pakaiansejahtera',
                'jenis_usaha' => 'Fashion',
                'url_website' => 'https://tokosejahtera.id',
                'status_usaha' => 'Tidak Berbadan Usaha',
                'url_ecommerce' => 'https://shopee.co.id/sejahtera',
                'jumlah_tenaga_kerja' => 2,
                'deskripsi_kegiatan' => 'Menjual pakaian dan perlengkapan muslim.',
                'lingkup_pemasaran' => 'Kabupaten',
                'asal_bahan' => 'Lokal',
                'pendapatan_per_bulan' => 5000000,
            ],
            [
                'nama_lengkap' => 'Ahmad Fikri',
                'nik' => '3276011507920003',
                'no_telepon' => '081322445566',
                'tanggal_lahir' => '1979-07-15',
                'email' => 'fikri@example.com',
                'jenis_kelamin' => 'L',
                'merk_usaha' => 'CV Maju Jaya',
                'akun_sosial_media' => '@cvmajubersama',
                'jenis_usaha' => 'Manufaktur',
                'url_website' => 'https://cvmajubersama.com',
                'status_usaha' => 'CV',
                'url_ecommerce' => null,
                'jumlah_tenaga_kerja' => 15,
                'deskripsi_kegiatan' => 'Produksi peralatan rumah tangga dari logam.',
                'lingkup_pemasaran' => 'Nasional',
                'asal_bahan' => 'Lokal dan impor',
                'pendapatan_per_bulan' => 85000000,
            ],
        ];

        // 🔹 Looping insert data
        foreach ($usahas as $data) {
            $kecamatan = $kecamatans->random();
            $desa = Desa::where('kecamatan_id', $kecamatan->id)->inRandomOrder()->first();

            Usaha::create(array_merge($data, [
                'kecamatan_id' => $kecamatan->id,
                'desa_id' => $desa?->id,
                'subsektor_id' => null, // bisa diganti kalau sudah ada datanya
                'alamat_lengkap' => "Jl. Utama No. " . rand(1, 99) . ", " . ($desa?->nama_kelurahan ?? 'Sumedang'),
                'kode_pos' => $desa?->kode_pos ?? '45300',
            ]));
        }

        $this->command->info("✅ Seeder UsahaSeeder berhasil dijalankan (" . count($usahas) . " data)");
    }
}

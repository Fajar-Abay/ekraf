<?php

namespace App\Http\Controllers;


use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Subsektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // pastikan di atas

class UserController extends Controller
{
    public function index()
    {
        return view('user.beranda');
    }

    public function sektor()
    {
        return view('user.sektor');
    }

    public function pendataan()
    {


        // Ambil semua data kecamatan
        $kecamatan = Kecamatan::orderBy('nama_kecamatan')->get(); // bisa diurutkan agar rapi
        $subsektor = Subsektor::all();
        // Kirim variabel $kecamatan ke view
        return view('user.pendataan', compact('kecamatan', 'subsektor'));

    }

    public function kontak()
    {
        return view('user.kontak');
    }


    public function storePendataan(Request $request)
    {
        try {
            // Log request masuk
            \Log::info('Request masuk storePendataan', $request->all());

            // Validasi ringan
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'nik' => 'nullable|string|max:50',
                'no_telepon' => 'nullable|string|max:50',
                'tanggal_lahir' => 'nullable|date',
                'email' => 'nullable|email|max:255',
                'jenis_kelamin' => 'nullable|in:L,P',
                'merk_usaha' => 'nullable|string|max:255',         // sama dengan form
                'akun_sosial_media' => 'nullable|string|max:255',  // sama dengan form
                'jenis_usaha' => 'nullable|string|max:255',
                'url_website' => 'nullable|string|max:255',
                'status_usaha' => 'nullable|string|max:50',
                'url_ecommerce' => 'nullable|string|max:255',
                'jumlah_tenaga_kerja' => 'nullable|string|max:50',
                'deskripsi_kegiatan' => 'nullable|string',         // sama dengan form
                'lingkup_pemasaran' => 'nullable|string|max:10',
                'asal_bahan' => 'nullable|string|max:10',
                'pendapatan_per_bulan' => 'nullable|string|max:50',
                'subsektor_id' => 'nullable|exists:subsektors,id',
                'kecamatan_id' => 'nullable|exists:kecamatans,id',
                'desa_id' => 'nullable|exists:desas,id',
                'alamat_lengkap' => 'nullable|string',
                'kode_pos' => 'nullable|string|max:10',
            ]);


            // Mapping input ke kolom DB
            $data = [
                'nama_lengkap' => $validated['nama_lengkap'],
                'nik' => $validated['nik'] ?? null,
                'no_telepon' => $validated['no_telepon'] ?? null,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
                'email' => $validated['email'] ?? null,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                'merk_usaha' => $validated['merk_usaha'] ?? null,
                'akun_sosial_media' => $validated['akun_sosial_media'] ?? null,
                'jenis_usaha' => $validated['jenis_usaha'] ?? null,
                'url_website' => $validated['url_website'] ?? null,
                'status_usaha' => $validated['status_usaha'] ?? null,
                'url_ecommerce' => $validated['url_ecommerce'] ?? null,
                'jumlah_tenaga_kerja' => $validated['jumlah_tenaga_kerja'] ?? null,
                'deskripsi_kegiatan' => $validated['deskripsi_kegiatan'] ?? null,
                'lingkup_pemasaran' => $validated['lingkup_pemasaran'] ?? null,
                'asal_bahan' => $validated['asal_bahan'] ?? null,
                'pendapatan_per_bulan' => $validated['pendapatan_per_bulan'] ?? null,
                'subsektor_id' => $validated['subsektor_id'] ?? null,
                'kecamatan_id' => $validated['kecamatan_id'] ?? null,
                'desa_id' => $validated['desa_id'] ?? null,
                'alamat_lengkap' => $validated['alamat_lengkap'] ?? null,
                'kode_pos' => $validated['kode_pos'] ?? null,
                'memiliki_sertifikat' => $validated['memiliki_sertifikat'] ?? null,
            ];

            // Log sebelum simpan
            \Log::info('Data siap disimpan:', $data);

            // Simpan
            \App\Models\Usaha::create($data);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Kalau validasi gagal
            \Log::warning('Validasi gagal:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Kalau ada error lain
            \Log::error('Error simpan data:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }
}

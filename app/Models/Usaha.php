<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Subsektor;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $fillable = [
        'nama_lengkap', 'nik', 'no_telepon', 'tanggal_lahir', 'email', 'jenis_kelamin',
        'merk_usaha', 'akun_sosial_media', 'jenis_usaha', 'url_website', 'status_usaha',
        'url_ecommerce', 'jumlah_tenaga_kerja', 'deskripsi_kegiatan', 'lingkup_pemasaran',
        'asal_bahan', 'pendapatan_per_bulan', 'subsektor_id', 'kecamatan_id', 'desa_id',
        'alamat_lengkap', 'kode_pos'
    ];

    public function subSektor()
    {
        return $this->belongsTo(Subsektor::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}

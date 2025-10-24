<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama_kecamatan', 'kode_pos'];

    public function desas()
    {
        return $this->hasMany(Desa::class);
    }

    public function usahas()
    {
        return $this->hasMany(Usaha::class);
    }
}

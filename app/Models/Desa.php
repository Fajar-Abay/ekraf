<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'kecamatan_id', 'nama_kelurahan', 'kode_pos'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function usahas()
    {
        return $this->hasMany(Usaha::class);
    }
}

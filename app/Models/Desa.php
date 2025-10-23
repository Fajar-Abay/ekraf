<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = ['kecamatan_id', 'nama', "kode_pos"];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function usahas()
    {
        return $this->hasMany(Usaha::class);
    }
}

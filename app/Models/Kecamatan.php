<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Usaha;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['nama'];

    public function desas()
    {
        return $this->hasMany(Desa::class);
    }

    public function usahas()
    {
        return $this->hasMany(Usaha::class);
    }
}


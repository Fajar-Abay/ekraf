<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subsektor extends Model
{
     use HasFactory;

    protected $guarded =[];

     public function usahas()
    {
        return $this->hasMany(Usaha::class);
    }
}

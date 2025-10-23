<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
   protected $fillable = [
        'judul',
        'visi',
        'misi',
        'program',
        'penjelasan',
        'gambar1',
        'gambar2',
        'gambar3',
    ];
}

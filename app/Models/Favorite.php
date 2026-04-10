<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    // Tambahkan baris ini agar Laravel mengizinkan kolom-kolom ini diisi
    protected $fillable = [
        'user_id',
        'anime_mal_id',
        'judul',
        'gambar',
    ];
}

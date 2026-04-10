<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // masukan user
    protected $fillable = ['nama', 'pesan'];
}

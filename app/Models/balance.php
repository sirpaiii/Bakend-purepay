<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Balance extends Model
{
    protected $fillable = [
        'saldo',     // ← tambahkan ini
        'person_id', // ← pastikan juga ini kalau kamu menyetelnya manual
    ];
}

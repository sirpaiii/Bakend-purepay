<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'firebase_uid',
        'name',
        'phone',
        'email',
    ];

   public function balance()
{
    return $this->hasOne(\App\Models\Balance::class);
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
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



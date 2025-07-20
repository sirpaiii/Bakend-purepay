<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balance extends Model
{
    use HasFactory;
    protected $fillable = [
        'saldo',    
        'person_id'
    ];

    public function person()
{
    return $this->belongsTo(\App\Models\Person::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
   protected $fillable = [
        'person_id',
        'product_id',
        'nomor_tujuan',
        'amount',
        'status',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

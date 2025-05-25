<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProductTransaction extends Model
{
    protected $table = 'product_transactions'; // Opsional jika nama class sudah sesuai konvensi

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'status',
        'payment_reference',
        'paid_at'
    ];

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

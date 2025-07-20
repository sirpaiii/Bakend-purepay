<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_reference',
        'merchant_order_id',
        'status',
        'paid_at'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\Person::class, 'user_id'); // Ubah jika memang Person
    }
}

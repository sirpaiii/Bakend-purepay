<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class topup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_reference',
        'status',
        'paid_at'
    ];

    public function user() {
        return $this->belongsTo(People::class, 'user_id');
    }
}

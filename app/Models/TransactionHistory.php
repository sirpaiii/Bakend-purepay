<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_id', 'type', 'reference_id', 'amount', 'transaction_date'
    ];

    public function user() {
        return $this->belongsTo(Person::class, 'person_id');
    }

}

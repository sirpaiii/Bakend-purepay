<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 'receiver_id', 'amount', 'message', 'status', 'transferred_at'
    ];

   public function sender() {
    return $this->belongsTo(\App\Models\Person::class, 'sender_id');
}

public function receiver() {
    return $this->belongsTo(\App\Models\Person::class, 'receiver_id');
}
}






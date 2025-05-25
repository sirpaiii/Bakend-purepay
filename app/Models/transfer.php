<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 'receiver_id', 'amount', 'message', 'status', 'transferred_at'
    ];

    // Relasi ke pengirim (sender)
    public function sender()
    {
        return $this->belongsTo(People::class, 'sender_id');
    }

    // Relasi ke penerima (receiver)
    public function receiver()
    {
        return $this->belongsTo(People::class, 'receiver_id');
    }
}

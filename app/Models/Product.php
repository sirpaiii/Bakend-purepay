<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
use HasFactory;

    protected $fillable = ['category_id', 'name', 'provider', 'price'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}

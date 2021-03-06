<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image',
        'price', 'stock'
    ];

    public function getImageAttribute($image)
    {
        return asset('uploads/products/'.$image);
    }
}

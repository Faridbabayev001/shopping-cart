<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'code', 'name',
        'email', 'address', 'phone',
        'payment_type', 'amount', 'note'
    ];
}

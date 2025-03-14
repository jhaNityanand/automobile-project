<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'id',
        'user_id',
        'razorpay_payment_id',
        'amount',
        'method',
        'status',
        'email',
        'contact',
    ];
}

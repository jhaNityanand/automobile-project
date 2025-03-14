<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayType extends Model
{
    use HasFactory;

    protected $table = 'pay_type';

    protected $fillable = [
        'id',
        'name',
    ];
}

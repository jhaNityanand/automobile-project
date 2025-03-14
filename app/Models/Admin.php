<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin_register';

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'password',
		'con_pass',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}

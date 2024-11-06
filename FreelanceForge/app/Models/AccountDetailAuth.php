<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountDetailAuth extends Model
{
    use HasFactory;

    
    protected $table = 'AccounDetailAuth'; 

    protected $fillable = [
        'account_no',
        'email',
        'password',
        'role_type',
        'otp',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountDetail extends Model
{
    use HasFactory;


    protected $table = 'AccountDetails';


    protected $fillable = [
        'account_no',
        'firstname',
        'lastname',
        'age',
        'address',
        'phone_number',
        'birthday',
    ];
}

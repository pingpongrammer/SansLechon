<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payoutreq extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'username',
        'comission',
        'referral_code',
    ];
}

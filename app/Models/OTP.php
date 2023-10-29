<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OTP extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'otp',
    ];

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

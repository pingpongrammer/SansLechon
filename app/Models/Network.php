<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Network extends Model
{
    use HasFactory;
    protected $fillable = [
        'referral_code',
        'user_id',
        'parent_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

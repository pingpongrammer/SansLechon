<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Letchon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Letchon extends Model
{
    use HasFactory;

    protected $fillable = [
        'kls',
        'prices',
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}

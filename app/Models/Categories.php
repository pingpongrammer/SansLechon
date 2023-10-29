<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'img',
        'shop',
        'type',
        'description',
        'small',
        'medium',
        'large',
        'extraLarge',

    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function freebies()
    {
        return $this->hasMany(freebies::class);
    }

}

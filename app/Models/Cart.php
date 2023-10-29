<?php

namespace App\Models;

use App\Models\Letchon;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'categories_id',
        'letchon_id',
        'shop',
        'size',
        'price',
        'status',
        'freeb1',
        'freeb2',
        'priceCake',
        'priceMom',
        'sizeCake',
        'sizeMom',
    ];
    
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function letchon()
    {
        return $this->belongsTo(Letchon::class);
    }

    public function freeby1()
    {
        return $this->belongsTo(Categories::class, 'freeb1');
    }
    public function freeby2()
    {
        return $this->belongsTo(Categories::class, 'freeb2');
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'orders_id', 'id');
    }
    
    
}

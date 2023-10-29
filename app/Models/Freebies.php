<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Freebies extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'freeb1',
        'freeb2',
        'priceCake',
        'priceMom',
        'sizeCake',
        'sizeMom',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function freeby1()
    {
        return $this->belongsTo(Categories::class, 'freeb1');
    }
    public function freeby2()
    {
        return $this->belongsTo(Categories::class, 'freeb2');
    }
}

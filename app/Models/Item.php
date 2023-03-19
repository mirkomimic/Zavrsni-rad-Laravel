<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'restaurant_id',
    ];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}

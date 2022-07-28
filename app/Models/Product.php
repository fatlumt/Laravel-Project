<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'discount',
        'description',

    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

}

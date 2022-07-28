<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id', 'name','email','phone','number','notes','number_of_products','total',
        
    ];


    public function products(){
        return $this->belongsToMany(Product::class);
    }
}

//

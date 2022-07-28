<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', [
       'latest_products' => Product::take(2)->orderBy('id', 'desc')->get()
        ]);
    }       
}


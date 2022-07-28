<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;




class ShopController extends Controller
{

    public function index(Request $request) {
        $slug = $request->input('category');
        $sort = $request->input('sort');

        $column = 'id';
        $sort_type = 'desc';

        // sort
        if(!is_null($sort)) {
            $sort_parts = explode("_", $sort);
            $column = $sort_parts[0]; 
            $sort_type = $sort_parts[1];
        }

        // filter
        if(!is_null($slug)) {
            $results = [];
            $products = Product::orderBy($column, $sort_type)->get();

            foreach($products as $product) {
                if(in_array($slug, $product->categories()->get()->pluck('slug')->toArray())) {
                    $results[] = Product::find($product->id);
                }
            }

            $products = $results;
        } else {
            $products = Product::orderBy($column, $sort_type)->get();
        }


        return view('shop', [
            'categories' => Category::all(),
            'products' => $products
        ]);
    }
    public function getProductDetails($id) {
        $product = Product::findOrFail($id);

        return view('product-details', [
            'product' => $product,
        ]);
    }

   public function search(Request $request){
    if(!is_null($request->input('q')) && !empty($request->input('q'))){
        $products = Product::where('name','like','%'.$request->input('q').'%')->get();
    }
    return view('shop',[
        'categories'=>Category::all(),
        'products'=> $products,
    ]);
   }


}

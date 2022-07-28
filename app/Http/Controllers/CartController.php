<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function cart() {
        return view('cart');
    }

    public function addToCart(Request $request, $id) {
        $product = Product::findOrFail($id);

        // return $request['quantity'];

       \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' =>$product->price,
            'quantity' => $request['quantity'],
            'attributes' => []
        ]);

        return redirect()->back()->with('status', 'Product was added to cart.');
    }
   public function increase($id) {
        \Cart::update($id, array(
            'quantity' => +1, 
          ));
          return back();
    }
    public function decrease($id) {
       \Cart::update($id, array(
            'quantity' => -1,
          ));
          return back();
    }
    
 
    public function delete($id) {
        \Cart::remove($id);
          return back();
    }

    public function checkout(Request $request){
        $this->validate($request , [ 
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email', 
        ]);
        $data=[
            'user_id'=>Auth::id(),
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'notes'=>$request['notes'],
            'number_of_products'=>count(\Cart::getContent()),
            'total'=>\Cart::getTotal(),
        ];
        if($order = Order::create($data)){
            foreach(\Cart::getContent() as $item)
             $order->products()->attach($item->id);
          return view('cart');
          \Cart::remove();
        }
        else
          return back()->with('status','Something went wrong');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{

    public function  __construct()
    {
        $this->middleware(['role:admin']);
    }



    /**
     * Display a listing of `the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('dashboard.products.index', [
                'products' => Product::paginate(100),
            ]);
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */  
    public function store(Request $request)
    {
        $this->validate($request,[
               'name'=>'required',
               'quantity'=>'required',
               'price'=>'required '
        ]);
        $data = $request->except('__token','images');

            if($product = Product::create($data)) {

                foreach($request->file('images') as $image){
                        $file = $image->getClientOriginalName();
                        $filename = pathinfo($file, PATHINFO_FILENAME);
                        $extension = pathinfo($file , PATHINFO_EXTENSION);
                        $photo = rand(1111111111, 999999999)."-".$filename.".".$extension;

                        Storage::putFileAs('public/web-page-assets/', $image, $photo);

                        Image::create(['product_id' => $product->id,'name' => $photo]);
                }
                return redirect()->route('products.index')->with('status','Product added');

            }
            return back()->with('status','Product did not added');
            
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('dashboard.products.edit', [
            'product' => $product,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
               'name'=>'required',
               'quantity'=>'required',
               'price'=>'required '
        ]);


        $product = Product::findORFail($product->id);
        $product->name = $request['name'];
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->description = $request['description'];


        if($product->save()) {
                foreach((array)$request->file('images') as $image){
                        $file = $image->getClientOriginalName();
                        $filename = pathinfo($file, PATHINFO_FILENAME);
                        $extension = pathinfo($file , PATHINFO_EXTENSION);
                        $photo = rand(1111111111, 999999999)."-".$filename.".".$extension;

                        Storage::putFileAs('public/products/', $image, $photo);

                        Image::create(['product_id' => $product->id,'name' => $photo]);
                }
                return redirect()->route('products.index')->with('status','Product updatet');

            }
            return back()->with('status','Product did not updatet');
            
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Product::destroy($product->id))
            {
                return back()->with('status','Product was deleted succsessufuly');
            }
        return back()->with('status','Something went wrong');
    }

    public function deleteProductImage($id){
        $image = Image::findOrFail($id);
        if($image->delete())
        {
            return back()->with('status','Image was deleted succsessufuly');
        }
    return back()->with('status','Something went wrong');
    }
}

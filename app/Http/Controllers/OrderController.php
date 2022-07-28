<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    // public function  __construct()
    // {
    //     $this->middleware(['role:admin']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasAnyRole(['admin' , 'client']))
            return redirect()->route('dashboard')->with('status','you are not allowed to view requested pGE!');
 
        if(Auth::user()->hasRole('admin'))
            $orders = Order::paginate(20);
            
        if(!Auth::user()->hasRole('admin'))
           $orders = Order::where('user_id', Auth::id())->paginate(20);
       
        
        if(Auth::user()->hasRole('client'))
            $orders = Order::where('user_id', Auth::id())->paginate(20);

        

        return view('dashboard.orders.index',  [
            'orders' => $orders , 
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
       


        if(!Auth::user()->hasAnyRole('admin'))
            return redirect()->route('dashboard')->with('status','you are not allowed to view requested pGE!');

        if($order->delete())
            {
                return back()->with('status','order was deleted succsessufuly');
            }
        return back()->with('status','Something went wrong');
    }
}

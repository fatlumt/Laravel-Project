@extends('layouts.guest')
@section('title', 'Cart')
@section('content')
<br class="my-5"/>
<div class="container my-5">
  <table class="table table-hover table-dark ">
    <tr>
      <th class="text-center" >Product</th>
      <th class="text-center" >Quantity</th>
      <th class="text-center">Price</th>
      <th class="text-center"> Subtotal</th>

    </tr>
    @foreach(\Cart::getContent() as $item)
    <section class="h-100 h-custom" style="background-color: #eee;">

</section>
    <tr>
      <td class="text-center">{{ $item->name }}</td>
        <td class="text-center">
          <a href="{{ route('decrease',['id'=>$item->id]) }}"  class="btn btn-sm btn-outline-white me-2 rounded-pill fw-bold "><i class="fa-solid fa-circle-minus"></i></a>
          {{ $item->quantity }}
          <a href="{{ route('increase',['id'=>$item->id]) }}" class="btn btn-sm btn-outline-white mx-2 rounded-pill fw-bold "><i class="fa-solid fa-circle-plus"></i></a>
          
          <a href="{{ route('delete',['id'=>$item->id]) }}" class="btn btn-sm btn-outline-danger hover  rounded-pill fw-bold " onclick="return confirm('Are you sure')"><i class="fa-solid fa-trash"></i></a>
        </td>
        <td class="text-center">{{  number_format($item->price - (($item->price * ($item->discount / 100))), 2, ".", "") }} &euro;
                            <span class="badge bg-dark  p-2">-{{ $item->discount }}%</span></td>
      <td class="text-center" >{{ number_format($item->quantity * ($item->price - $item->discount), 2, ".", "")  }} &euro;</td>
      
    </tr>
    @endforeach
    <tr>
      <td colspan="3" class="text-end fw-bold">Total: </td>
      <td class="fw-bold text-center"> {{  number_format(\Cart::getTotal() ,2 , '.' , '') }} &euro;</td>
    </tr>
    
  </table>
</div>
  <div class="container">
    @auth 
    @if($errors->any())
    <div class="alert alert-dark w-25 ">
     
      <ul>
        @foreach ($errors->all() as $error)
          <li class=" text-danger m-auto ">{{ $error }}</li>
        @endforeach
      </ul>
     
    </div>
 @endif
    <form class="row g-4  text-white" action="{{ route('checkout') }}" method="POST">
      @csrf
  <div class="col-md-4">
    <div class="form-outline">
      <input type="text" class="form-control"  id="name" name="name"  value=""  />
      <label for="name" class="form-label">First name</label>
    </div>
  </div>
  <div class="col-md-4">
    <div class=" form-outline">
      <input
        type="text"
        class="form-control "
        id="email" 
        name="email"  
      />
      <label for="email" class="form-label ">Email</label>
  </div>
    </div>
  <div class="col-md-4">
    <div class="form-outline">
      <input type="text" class="form-control " id="validationServer02" name="phone"  value=""  />
      <label for="phone" class="form-label">Phone</label>
    </div>
  </div>

 
  <div class="col-md-6">
    <div class="form-outline">
      <input type="text" class="form-control " name="notes" id="notes"  />
      <label for="notes" class="form-label ">Notes</label>
    </div>
  </div>
  <div class="col-md-6">
    
  <button class="btn btn-primary" type="submit">Checkout</button>
  </div>

  </div>
  

</form>
    @endauth

    @guest
      @if(count(\Cart::getContent()) > 0)
        You have to <a href="{{ route('login') }}">Login</a> first to checkout

      @endif
    @endguest
  </div>
@endsection
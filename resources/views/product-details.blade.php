@extends('layouts.guest')
@section('title', '{{$product->name}}')

@section('content')

<hr>

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
    @if( Session::get('status'))
    <div class="d-flex w-100 justify-content-flex-end">
        <div class="alert alert-dark w-25 flex-end" role="alert">
         Added to cart !! (:
        </div> 
    </div>
            
     @endif                             
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <img src="{{ asset('storage/products/.$product->images()->first()->name') }}" alt="">
                </div>
                @if($product->images()->count() > 0)
                        <img src="{{ asset('storage/products/'.$product->images()->first()->name) }}" class="img-fluid" id="large-image" alt="{{ $product->name }}" /> 
                        <ul class="gallery">
                            @foreach($product->images()->get() as $image)
                                <li><img src="{{ asset('storage/'.$image->name) }}" alt="{{ $product->name }}" height="80" class="border border-light" /></li>
                            @endforeach
                        </ul>
                        @else
                        <img src="{{ asset('pweb-page-assets/team-member-01.jpg') }}"  class="img" alt="{{ $product->name }}" /> 
                       
                    @endif
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{ $product->name }}</h4>
                    
                    <span class="price">  @if($product->discount > 0)
                                            <span class="price ">{{  number_format($product->price - (($product->price * ($product->discount / 100))), 2, ".", "") }} &euro;</span>
                                            <span class="text-decoration-line-through link-danger org-price">{{  number_format($product->price, 2, ".", "") }}  &euro;  </span>
                                            @else
                                            <span class="price ">{{  number_format($product->price, 2, ".", "") }}  &euro;  </span>
                                             @endif</span>
                    <ul class="stars">
                        <li class="badge bg-dark mt-n1 p-2">-{{ $product->discount }}</li>
                    </ul>
                    <span>{{ $product->description }}</span>
                    <div class="quote">
                    <i class="fa-duotone fa-arrow-down"></i><p>Size::  S M L XL</p>
                    </div>
                    <div class="quantity-content">
                        
                     <!--    <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div>
                    </div> -->
                    <div class="total">
                        <form action="{{ route('add-to-cart', ['id' => $product->id]) }}" class="d-flex justify-content-space-between gap-2" method="POST">
                        @csrf
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <input type="number" name="quantity" min="1" max="{{ $product->quantity }}" value="1" class="w-25 form-control me-2" />
                        <button class="main-border-button" type="submit">Add to cart</button>
                    </form>
                  
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    

@endsection
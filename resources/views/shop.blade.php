@extends('layouts.guest')
@section('title','Shop')
@section('content')
 <style>
   
 

</style>
<hr><br/><br/><br/><br/><br/>
<!--Main Navigation-->

            <!-- Sidebar -->
            <!--  -->
            <!-- Sidebar -->

       
<div class="container">
    @if(count( $categories ) > 0)
   <section class="section ">
        <div class="container ">
          <div class="w-100 row-12 d-flex justify-content-center gap-3">
           <div>
            @foreach($categories as $category)
                        <li class="btn btn-dark "><a class="text-white" @if($category->products()->get()->count() > 0) href="?category={{$category->slug}}"@else href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" @endif > {{ $category->name }}</a></li>
                        
             @endforeach </div>

                        <form action="{{ route('search') }} "class="flex-end">
              <div class="input-group rounded">
                  <input type="search" name="q" class="form-control rounded" placeholder="Search" aria-label="Search"
                   @if(!empty(Request::input('q'))) value="{{ Request::input('q') }} "@endif aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
            </div>
            </form>
          </div>
       
        </div>
     
        </div>
        
        
    </section>
        @endif

        
    @if(count( $products ) > 0)
   <section class=" mt-5">
        <div class="container ">
            <div class="section-heading">
                      </div>
            <div class="row  row-cols-1 row-cols-md-3 g-3 justify-content-center">
                @foreach($products as $product)

                <div class="container page-wrapper gap-5">
                    <div class="page-inner">
                        <div class="row">
                        <div class="el-wrapper">
                            <div class="box-up">
                            <div class="d-flex justify-content-end ">
                            <span class="badge bg-dark mt-n1 p-2">-{{ $product->discount }}%</span>
                        </div>
                        <img class="img"  src="{{ asset('public/products/'.$product->images()->first()->name) }}" alt="{{ $product->name }}">
                        <div class="img-info">
                                <div class="info-inner">
                                <span class="p-name"><a href="{{ route('product-details', [ 'id' => $product->id]) }}">{{ $product->name }}</a></span>
                                <span class="p-company">Yeezy</span>
                                </div>
                                <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
                            </div>
                            </div>

                            <div class="box-down">
                            <div class="h-bg">
                                <div class="h-bg-inner"></div>
                            </div>

                               <a class="cart" href="#">
                                            @if($product->discount > 0)
                                            <span class="price ">{{  number_format($product->price - (($product->price * ($product->discount / 100))), 2, ".", "") }} &euro;</span>
                                            <span class="text-decoration-line-through link-danger org-price">{{  number_format($product->price, 2, ".", "") }}  &euro;  </span>
                                            @else
                                            <span class="price ">{{  number_format($product->price, 2, ".", "") }}  &euro;  </span>
                                             @endif
                                      
                                                
                                <span class="add-to-cart">
                                <span class="txt">Add in cart</span>
                                </span>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
     
                @endforeach
          </div>    
        </div>
    </section>
    @else 
      0 Products
        @endif

        <!-- noProductModal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="noProductModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Whooppsss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        There are no product in this category!!<i class="fa-solid fa-face-frown"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
<script>
    $('#sort').on('change', (e) => {
        e.preventDefault();
        const filter = e.target.value;
        window.location.href = `?sort=${filter}`;
    });
</script>
  @endsection
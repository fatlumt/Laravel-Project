
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/><x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
       
    </x-slot>
@section('content')
   
        <div class="content-wrapper">               
        <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex w-100 ">
                                    <a href="{{ route('products.create') }}" class="btn btn-outline-primary m-3 flex-end">Add Product</a>

                                    </div>
                                    <h4 class="card-title">Products</h4>
                                   
                                    <div class="table-responsive">
                                         @if(count($products))

                                        <table class="table">
                                            <thead>
                                                <tr>  
                                                     <th> Image</th>
                                                     <th> Name </th>
                                                     <th>  Quantity</th>
                                                     <th>  Price </th>
                                                     <th> Discount </th>
                                                     <th></th>
                                                </tr>   
                                            </thead>
                                        
                                                        @foreach($products as $product)
                                            <tbody>
                                                
                                                        <td>
                                                            <img src="assets/images/faces/face1.jpg" alt=" {{ $product->name}}"  width="60px"/>
                                                      
                                                        </td>
                                                        <td> {{ $product->name}} </td>
                                                        <td> {{ $product->quantity}} </td>
                                                        <td> {{ $product->price}}</td>
                                                        <td> {{ $product->discount}} </td>
                                                     
                                                        <td>  <a href="{{ route('products.edit',['product'=> $product->id]) }}"  class="badge badge-outline-primary">
                                                        <i class="fa-solid fa-pen-to-square">Edit</i>
                                                        </a> 
                                                            <form action="{{ route('products.destroy',['product'=> $product->id]) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="badge badge-outline-danger">
                                                                      <i class="fa-solid fa-trash">Delete</i>
                                                                </button>
                                                            </form>
                                                        </td>
                                            
                                            </tbody>
                                    @endforeach
                                        </table>
                                  
                                
                                    </div>
                               
                                </div>
                             
                            </div>
                        </div>
                    </div>
                   
                 </div>
             </div>

   </div>

     @else
        <p class="m-4">0 Products</p>
    @endif


@endsection

</x-app-layout>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/><x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
       
    </x-slot>
@section('content')
   
        <div class="content-wrapper">               
           <div class="row ">       
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Product</h4>
                        <p class="card-description"> </p>
                        @if($errors->any())
                            <div class="alert alert-dark w-25 ">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li class=" text-danger m-auto ">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
    
                        @endif
                        <form  action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control text-white" name="quantity" id="quantity" placeholder="Number of products" value="{{ old('quantity')}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price of the product" value="{{ old('price')}}">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount of product" value="{{ old('discount')}}">
                            </div>
                        
                            <div class="form-group ">
                                <input type="file" name="images[]" id="images" multiple />
                            </div>
                            <div class="form-group">
                                <label for="description">Describtion</label>
                                <textarea class="form-control" id="description"  name="description" rows="4" value="{{ old('description')}}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div> 
                 


@endsection

</x-app-layout>
    
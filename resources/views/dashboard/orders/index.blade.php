
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/><x-app-layout>
 
@section('content')
   
        <div class="content-wrapper">               
        <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Orders</h4>
                                   
                                    <div class="table-responsive">
                                         @if(count($orders) > 0)

                                        <table class="table text-white">
                                            <thead>
                                                <tr >  
                                                     <th class="fw-bold"> Customer</th>
                                                     <th class="fw-bold"> Notes </th>
                                                     <th class="fw-bold">  Number of products</th>
                                                     <th class="fw-bold">  total </th>
                                                     @role('admin')
                                                     <th class="fw-bold"></th>
                                                     @endrole
                                                </tr>   
                                            </thead>
                                        
                                    @foreach($orders as $order)
                                            <tbody>
                                                
                                                     
                                                        <td> {{ $order->name}}
                                                               <br><br>
                                                                {{ $order->email }}
                                                                <br><br>
                                                                {{$order->phone }}        
                                                    </td>
                                                        <td> {{ $order->notes}}</td>
                                                        <td> {{ $order->number_of_products}} </td>
                                                        <td>{{ $order->total }} </td>


                                                     @role('admin')
                                                     <td>
                                                            <form action="{{ route('orders.destroy',['order'=> $order->id]) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="badge badge-outline-danger">
                                                                      <i class="fa-solid fa-trash">Delete</i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endrole
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
@if(count( $products ) > 0)
   <section class="section ">
        <div class="container ">
            <div class="section-heading">
                        <h2>Categoiress</h2>
                        <span>Details to details is what makes us different from the other .</span>
                    </div>
            <div class="row justify-content-center">
                @foreach($products as $product)
                <div class="">
                    <div class="card">
                    <div class="card-body">
                            <h3>{{ $product->name }}</h3>
                            <h3>{{ $product->quantity }}</h3>
                            <h3>{{ $product->price }}</h3>
                            <h3>{{ $product->discount }}</h3>

                            <h3>{{ $product->describtion }}</h3>
                            <h3>{{ $product->created_at }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      
        </div>
    </section>
    @endif
       
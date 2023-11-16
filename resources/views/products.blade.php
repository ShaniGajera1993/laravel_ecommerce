@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text" style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Explore Our Product Catalog</h4>
              <h2>Products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">

          @foreach($products as $product)
            <div class="col-md-4">
                <div class="product-item">
                    <a href="{{ route('product.details', ['id' => $product->id]) }}"><img src="{{ asset('images/' .$product -> image) }}" alt=""></a>
                    <div class="down-content">
                        <a href="{{ route('product.details', ['id' => $product->id]) }}">
                            <h4>{{ $product -> name}}</h4>
                        </a>
                        <h6>
                            @if($product -> sale_price)
                            <small><del>${{ $product -> price }} </del></small> ${{ $product -> sale_price}}
                            @else
                            ${{ $product -> price }}
                            @endif
                        </h6>    
                        <p>{{ $product -> description }}</p>
                    </div>
                </div>
            </div>
          @endforeach

          <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection
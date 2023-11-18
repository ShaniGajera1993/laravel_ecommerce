@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text" style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Elegance is an attitude, and our product speaks it fluently.</h4>
              <h2>Product Details</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">


          <div class="col-md-4 col-xs-12">
            <div>
              <img src="{{ asset('images/'. $products -> image) }}" alt="" class="img-fluid wc-image">
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 col-xs-6">
                <div>
                  <img src="{{ asset('images/'. $products -> image) }}" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
                  <img src="{{ asset('images/'. $products -> image1) }}" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
                  <img src="{{ asset('images/'. $products -> image2) }}" alt="" class="img-fluid">
                </div>
                <br>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-xs-12">
              <h2>{{ $products -> name }}</h2>

              <br>

              <p class="lead">
                @if($products -> sale_price)
                <small><del> ${{ $products -> price}}</del></small><strong class="text-primary">${{ $products -> sale_price}}</strong>
                @else
                ${{ $products -> price}}
                @endif
              </p>

              <br>

              <p class="lead">
                {{ $products -> description}}
              </p>

              <br> 

              <div class="row">
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-sm-6">
                      <form action="{{ route('add_to_cart') }}" method="post" class="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products -> id }}"/>
                        <input type="hidden" name="name" value="{{ $products -> name }}"/>
                        <input type="hidden" name="image" value="{{ $products -> image }}"/>
                        <input type="hidden" name="price" value="{{ $products -> price }}"/>
                        <input type="hidden" name="sale_price" value="{{ $products -> sale_price }}"/>
                        <input type="hidden" name="quantity" value="1"/>
                        <button type="submit" name="add_to_cart" class="filled-button">Add to Cart</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Similar Products</h2>
              <a href="/products">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          @foreach($similarProducts as $similarProduct)
          <div class="col-md-4">
            <div class="product-item">
              <a href="{{ route('product.details', ['id' => $similarProduct->id]) }}"><img src="{{ asset('images/' .$similarProduct -> image) }}" alt=""></a>
              <div class="down-content">
                <a href="{{ route('product.details', ['id' => $similarProduct->id]) }}"><h4>{{ $similarProduct -> name }}</h4></a>
                <h6>
                  @if($similarProduct -> sale_price)
                  <small><del>${{ $similarProduct -> price }} </del></small> ${{ $similarProduct -> sale_price }}
                  @else
                  ${{ $similarProduct -> price }}
                  @endif
                </h6>
              </div>
            </div>
          </div>
          @endforeach
  
        </div>
      </div>
    </div>
@endsection
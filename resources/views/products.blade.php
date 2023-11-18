@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text"
  style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
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
    <div class="row justify-content-end">
      <div class="col-auto">
        <div class="dropdown show">
          <a class="filled-button dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Short By
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/newest">Newest</a>
            <a class="dropdown-item" href="/lowest_price">Lowest Price</a>
            <a class="dropdown-item" href="/highest_price">Highest Price</a>
            <a class="dropdown-item" href="/men">Men</a>
            <a class="dropdown-item" href="/women">Women</a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">

      @foreach($products as $product)
      <div class="col-md-4">
        <div class="product-item">
          <a href="{{ route('product.details', ['id' => $product->id]) }}"><img
              src="{{ asset('images/' .$product -> image) }}" alt=""></a>
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
          @if ($products->onFirstPage())
          <li class="disabled"><span>&laquo;</span></li>
          @else
          <li><a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
          @endif

          @for ($i = 1; $i <= $products->lastPage(); $i++)
            <li class="{{ ($products->currentPage() == $i) ? 'active' : '' }}">
              <a href="{{ $products->url($i) }}">{{ $i }}</a>
            </li>
            @endfor

            @if ($products->hasMorePages())
            <li><a href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
            <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
      </div>

    </div>
  </div>
</div>
@endsection
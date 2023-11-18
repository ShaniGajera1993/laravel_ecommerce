@extends('layouts.main')

@section('content')

<div class="page-heading about-heading header-text"
  style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Your Cart, Your Style, Your Happiness</h4>
          <h2>Cart</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="products call-to-action">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Shopping Cart</h2>
        </div>
      </div>
      <div class="col-md-8">
        <div class="contact-form">
          @if(Session::has('cart') && count(Session::get('cart')) > 0)
          <div class="table-responsive">

            <table class="table">

              <thead>

                <tr>
                  <th></th>
                  <th colspan="2">Product</th>

                  <th>Quantity</th>

                  <th>Price</th>

                  <th colspan="1"> Sub Total </th>

                </tr>

              </thead>

              <tbody>

                @if(Session::has('cart'))

                @foreach(Session::get('cart') as $id => $product)
                <tr>

                  <td>
                    <form action="{{ route('remove_from_cart') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$product['id']}}" />
                      <button type="submit" name="remove"
                        style="background: none; border: none; padding: 0; cursor: pointer;">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                    </form>
                  </td>
                  <td>
                    <img height="100" width="100" src="{{ asset('images/'.$product['image']) }}">
                  </td>

                  <td>

                    <a href="#">
                      {{ $product['name'] }}
                    </a>

                  </td>

                  <td>
                    <form action="{{ route('edit_product_quantity') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$product['id']}}" />
                      <input type="number" name="quantity" value="{{ $product['quantity'] }}" class="quantity form-control" min="1" />
                    </form>
                  </td>

                  <td>

                    ${{ $product['price'] }}
                  </td>

                  <td>

                    ${{ number_format($product['price'] * $product['quantity'], 2) }}

                  </td>

                </tr>
                @endforeach
                @endif


              </tbody>

              <tfoot>
                @if(Session::has('total'))
                <tr>

                  <th colspan="5"> Total </th>

                  <th colspan="2">
                    ${{number_format(Session::get('total'),2)}}
                  </th>

                </tr>
                @endif
              </tfoot>

            </table>

            <div class="form-inline pull-right">

            </div>

          </div>


          <div class="clearfix">
            <a href="/products" style="color:white" type="button" class="filled-button pull-left">Continue
              Shopping</a>
            <a style="color:white" type="submit" class="filled-button pull-right">Checkout</a>
          </div>
          @else
          <center><h6>No items in the cart</h6></center>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endsection
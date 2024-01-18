@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text"
     style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
     <div class="container">
          <div class="row">
               <div class="col-md-12">
                    <div class="text-content">
                         <h4>From cart to heart – complete your purchase now</h4>
                         <h2>Checkout</h2>
                    </div>
               </div>
          </div>
     </div>
</div>


<div class="products call-to-action">
     <div class="container">
          @if(Session::has('cart') && count(Session::get('cart')) > 0)
          <ul class="list-group list-group-flush">

               @if(Session::has('total'))
               <li class="list-group-item">
                    <div class="row">
                         <div class="col-6">
                              <em>Total Amount</em>
                         </div>

                         <div class="col-6 text-right">
                              <strong>${{number_format(Session::get('total'),2)}}</strong>
                         </div>
                    </div>
               </li>
               @endif

          </ul>

          <br>

          <div class="inner-content">
               <div class="contact-form">
                    <form action="{{ route('place_order') }}" method="post">
                         @csrf
                         <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                   <div class="form-group">
                                        <label class="control-label">Name:</label>
                                        <input type="text" name="name" id="name" value="{{ session('name') }}" class="form-control">
                                   </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12">
                                   <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <input type="text" name="email" id="email" value="{{ session('email') }}" class="form-control">
                                   </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                   <div class="form-group">
                                        <label class="control-label">Phone:</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                   </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12">
                                   <div class="form-group">
                                        <label class="control-label">Address:</label>
                                        <input type="text" name="address" id="address" class="form-control">
                                   </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12">
                                   <div class="form-group">
                                        <label class="control-label">City:</label>
                                        <input type="text" name="city" id="city" class="form-control">
                                   </div>
                              </div>
                         </div>

                         <div class="clearfix">
                              <a href="/cart" type="button" class="filled-button pull-left">Back</a>

                              <button type="submit" class="filled-button pull-right">Payment</button>
                         </div>
                    </form>
               </div>
          </div>
          @else
          <center>
               <h6>No items in the cart</h6>
          </center>
          @endif
     </div>
</div>
@endsection
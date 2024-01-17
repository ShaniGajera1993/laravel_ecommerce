@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text" style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
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
              <form action="#">
                   <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Name:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Email:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Phone:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Address:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">City:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">State:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Zip:</label>
                                  <input type="text" class="form-control">
                             </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Country:</label>
                                  <select class="form-control">
                                        <option value="">-- Choose --</option>
                                       <option value="">India</option>
                                       <option value="">Germany</option>
                                       <option value="">UK</option>
                                       <option value="">US</option>
                                  </select>
                             </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="form-group">
                                  <label class="control-label">Payment method</label>

                                  <select class="form-control">
                                       <option value="">-- Choose --</option>
                                       <option value="bank">Bank account</option>
                                       <option value="cash">Cash</option>
                                       <option value="paypal">PayPal</option>
                                  </select>
                             </div>
                        </div>

               </div>

                   <div class="clearfix">
                        <button type="button" class="filled-button pull-left">Back</button>
                        
                        <button type="submit" class="filled-button pull-right">Finish</button>
                   </div>
              </form>
          </div>
        </div>
      </div>
    </div>
@endsection
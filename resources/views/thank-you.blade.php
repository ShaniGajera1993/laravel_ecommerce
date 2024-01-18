@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text"
    style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Congratulations – your payment is confirmed</h4>
                    <h2>Thank You</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products call-to-action">
    <div class="container">
        @if(Session::has('order_id') && Session::get('order_id') != null)
        <div class="inner-content">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5 style="color:black">Thank you for your order</h5><br>
                                <h6 style="color:black">Your order id is : {{ Session::get('order_id') }}<h6>
                            </div>
                        </div>
                    </div>
                </div>
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
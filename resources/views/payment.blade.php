@extends('layouts.main')

@section('content')
<div class="page-heading about-heading header-text"
    style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>From cart to heart – complete your payment now</h4>
                    <h2>Payment</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products call-to-action">
    <div class="container">
        @if(Session::has('order_id') && Session::get('order_id') != null)
            @if(Session::has('total') && Session::get('total') != null)
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

            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div id="paypal-button-container"></div>
                                <script
                                    src="https://www.paypal.com/sdk/js?client-id=AYZ7K6FMYU2bGpCunKfGYNx0nyn5Uq8ObYBaNInLE0W1IK7j4uceT5s-r_uLFXqI9rj4NBQ386p2vuwI&currency=USD&disable-funding=giropay,sepa,sofort,card"></script>

                                <script>
                                    // Render the PayPal button
                                    paypal.Buttons({
                                        style: {
                                            layout: 'vertical',
                                            color: 'silver',
                                            label: 'paypal'
                                        },
                                        createOrder: function (data, actions) {
                                            // Set up the transaction
                                            return actions.order.create({
                                                purchase_units: [{
                                                    amount: {
                                                        value: '10.00' // Set your transaction amount here
                                                    }
                                                }]
                                            });
                                        },
                                        onApprove: function (data, actions) {
                                            // Capture the funds from the transaction
                                            return actions.order.capture().then(function (details) {
                                                // Display a thank you message to the buyer
                                                alert('Transaction completed by ' + details.payer.name.given_name);
                                            });
                                        }
                                    }).render('#paypal-button-container'); // Specify the container where you want to render the PayPal button
                                </script>
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
        @endif
    </div>
</div>

@endsection
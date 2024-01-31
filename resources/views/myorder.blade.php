@extends('layouts.main')

@section('content')

<div class="page-heading about-heading header-text"
    style="background-image: url('{{ asset('images/heading-6-1920x500.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Your Order, Your Style, Your Happiness</h4>
                    <h2>My Order</h2>
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
                    <h2>Order Details</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Transaction Id</th>
                                    <th>Total Price</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderDetails as $orderDetail)
                                @foreach($orderDetail['products'] as $index => $product)
                                <tr>
                                    @if($index === 0)
                                    <td rowspan="{{ count($orderDetail['products']) }}">{{ $orderDetail['order']->id }}
                                    </td>
                                    @foreach($orderDetail['payment'] as $payment)
                                    <td rowspan="{{ count($orderDetail['products']) }}">{{ $payment->transaction_id }}
                                    </td>
                                    @endforeach
                                    <td rowspan="{{ count($orderDetail['products']) }}">{{ $orderDetail['order']->cost
                                        }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td><img height="100" width="100" src="{{ asset('images/'.$product->product_image) }}"></td>
                                    <td>{{ $product->product_price }}</td>
                                    <td rowspan="{{ count($orderDetail['products']) }}">{{ $orderDetail['order']->status
                                        }}</td>
                                    @else
                                    <td>{{ $product->product_name }}</td>
                                    <td><img height="100" width="100" src="{{ asset('images/'.$product->product_image) }}"></td>
                                    <td>{{ $product->product_price }}</td>
                                    @endif
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
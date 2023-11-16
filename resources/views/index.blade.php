@extends('layouts.main')

@section('content')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Discover the latest trends and shop from the comfort of your home.</h4>
                <h2>Home</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Experience Effortless Elegance</h4>
                <h2>Escape to Serenity</h2>
            </div>
        </div>
        <div class="banner-item-03">
            <div class="text-content">
                <h4>Discover the Secrets of Simplicity</h4>
                <h2>Everyday Wonders</h2>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Featured Products</h2>
                    <a href="products">view more <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

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

        </div>
    </div>
</div>

<div class="best-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit. Explicabo, esse
                        consequatur alias repellat in excepturi inventore ad <a href="#">asperiores</a> tempora ipsa.
                        Accusantium tenetur voluptate labore aperiam molestiae rerum excepturi minus in pariatur
                        praesentium, corporis, aliquid dicta.</p>
                    <ul class="featured-list">
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Consectetur an adipisicing elit</a></li>
                        <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                        <li><a href="#">Corporis, omnis doloremque</a></li>
                    </ul>
                    <a href="about-us" class="filled-button">Read More</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-image">
                    <img src="{{ asset('images/about-1-570x350.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                author nulla.</p>
                        </div>
                        <div class="col-lg-4 col-md-6 text-right">
                            <a href="contact" class="filled-button">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
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
          <form action="cart.php" method="post" enctype="multipart-form-data">
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

                  <tr>

                    <td>
                      <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                    <td>

                      #

                    </td>

                    <td>

                      <a href="#">
                        #
                      </a>

                    </td>

                    <td>
                      <input type="text" name="quantity" class="quantity form-control">
                    </td>

                    <td>

                      #

                    </td>

                    <td>

                      #

                    </td>

                  </tr>



                </tbody>

                <tfoot>

                  <tr>

                    <th colspan="5"> Total </th>

                    <th colspan="2">
                      #
                    </th>

                  </tr>

                </tfoot>

              </table>

              <div class="form-inline pull-right">

              </div>

            </div>


            <div class="clearfix">
              <a href="/products" style="color:white" type="button" class="filled-button pull-left">Continue Shopping</a>
              <a style="color:white" type="submit" class="filled-button pull-right">Checkout</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection
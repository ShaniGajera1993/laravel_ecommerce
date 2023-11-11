@extends('layouts.main')

@section('content')
<div class="page-heading contact-heading header-text" style="background-image: url('{{
    asset('images/heading-4-1920x500.jpg') }}');"> <div class="container"> <div class="row">
    <div class="col-md-12">
    <div class="text-content">
    <h4>Welcome Back! Log In to Your Account</h4>
    <h2>Login</h2>
</div>
</div>
</div>
</div>
</div>

<div class="send-message">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Log In To Your Account</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="password" type="text" class="form-control" id="password"
                                        placeholder="Password" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">login</button>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <fieldset>
                                    <p>Don't have an account? <a href="register">Sign Up</a></p>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('content')
<div class="page-heading contact-heading header-text" style="background-image: url('{{
    asset('images/heading-4-1920x500.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Reset Password</h4>
                    <h2>Reset Password</h2>
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
                    <h2>Reset your password</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    <form id="contact" action="{{ route('reset.password') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail Address">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span><br><br>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-lg-12">

                                <fieldset>
                                    <button type="submit" id="form-submit"
                                        class="filled-button pull-left">Reset</button>
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
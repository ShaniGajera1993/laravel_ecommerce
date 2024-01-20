@extends('layouts.main')

@section('content')
<div class="page-heading contact-heading header-text" style="background-image: url('{{ asset('images/heading-4-1920x500.jpg') }}');">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Have questions or need assistance? Our customer support team is here to help!</h4>
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238132.6728893771!2d72.6574825667839!3d21.159440566132552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat%2C%20India!5e0!3m2!1sen!2sde!4v1699551672299!5m2!1sen!2sde" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our office</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="{{ route('sendmail') }}" method="post">
                @csrf
                @if (Session::has('success'))
                  <center><span class="text-danger">{{ Session::get('success') }}</span><br><br></center>
                @endif
                @if (Session::has('error'))
                  <center><span class="text-danger">{{ Session::get('error') }}</span><br><br></center>
                @endif
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name">
                      @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br><br>
                      @endif
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="contactemail" type="text" class="form-control" id="contactemail" placeholder="E-Mail Address">
                      @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span><br><br>
                      @endif
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject">
                      @if ($errors->has('subject'))
                        <span class="text-danger">{{ $errors->first('subject') }}</span><br><br>
                      @endif
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="body" rows="6" class="form-control" id="body" placeholder="Your Message"></textarea>
                      @if ($errors->has('body'))
                        <span class="text-danger">{{ $errors->first('body') }}</span><br><br>
                      @endif
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/team_01.jpg') }}" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;">John Doe</h5>
          </div>
        </div>
      </div>
    </div>
@endsection
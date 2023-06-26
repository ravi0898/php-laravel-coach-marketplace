@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
    <!-- Banner Start -->
    <section class="breadcrum-banner d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="text-white fw-700 exo">Get In Touch</h1>
        </div>
    </section>
    <!-- Banner End -->
    <!-- Contact Form Start-->
    <section class="contact-us my-3 my-sm-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="contact-img-wrap">
                        <img src="assets/media/contact-concept.png" alt="" class="contact-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-wrap bg-gray">
                        <h2 class="roboto text-main fw-700 mb-3">Let's Connect With Us</h2>
                        <p class="text-white">Receive advice from the #1 most accomplished and experienced entrepreneurs and executives. </p>
                        
                       
                        <center><div class="error" style="color: #8c001a;font-weight: 400">&nbsp;</div></center>
                        <form method="POST" id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="text-main roboto mb-2">Full Name :</label>
                                        <input type="text" class="form-control roboto contact-input  @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Enter name" name="name" maxlength="50">
                                        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="text-main roboto mb-2">Email :</label>
                                        <input type="email" class="form-control contact-input roboto  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Enter email" name="email" maxlength="100">
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="text-main roboto mb-2">Message :</label>
                                    <textarea id="message" name="message" class="w-100 form-control contact-input contact-textarea roboto @error('message') is-invalid @enderror" placeholder="Type Message Here...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="button-secondary roboto mb-4 mb-sm-0" style="background: #ff9b7b;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->
    <!-- Contact Info Start-->
    <section class="contact-info-section mb-5 py-5 bg-gray">
        <div class="container">
            <div class="row">
                <h2 class="text-main text-center roboto mb-5">We are here for you, Feel free to reach us</h2>
                <div class="col-md-4 pe-4 position-relative d-flex mb-5 mb-sm-0">
                    <div class="how-it-word-overlay advisor-overlay"></div>
                   <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                            <img src="assets/media/email.png" alt="" class="card-serach-img contact-card-img">
                        </div>
                        <h3 class="text-main roboto mb-4">Write An Email</h3>
                        <a href="mailto:info@zentia.io" class="text-center work-card-text contact-card-text roboto">info@zentia.io</a>
                   </div> 
                </div>
                <div class="col-md-4 pe-4 position-relative d-flex mb-5 mb-sm-0">
                    <div class="how-it-word-overlay advisor-overlay"></div>
                    <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                            <img src="assets/media/telephone.png" alt="" class="card-serach-img contact-card-img">
                        </div>
                        <h3 class="text-main roboto mb-4">Give A Call</h3>
                        <a href="#" class="text-center work-card-text contact-card-text roboto">+83 123456789</a>
                    </div> 
                </div>
                <div class="col-md-4 pe-4 position-relative d-flex mb-2 mb-sm-0">
                 <div class="how-it-word-overlay advisor-overlay"></div>
                     <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                            <img src="assets/media/locations.png" alt="" class="card-serach-img contact-card-img">
                        </div>
                        <h3 class="text-main roboto mb-4">Location</h3>
                        <p class="text-center work-card-text contact-card-text roboto">
                            Zentia Inc. <br>
                            8 The Green, Ste R, <br>
                            Dover County of Kent, 19901 <br>
                            Delaware
                        </p>
                     </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Info End-->
@endsection
@section('scripts')  
<script>
    $("#contactForm").submit(function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var name     = $('#name').val();
        var emails   = $('#emails').val();
        var message = $('#message').val();
        
        if(name === ''){
            $(".error").html('Please enter full name...');
            return false;
        }
        
        
        if(email === ''){
            $(".error").html('Please enter work email address...');
            return false;
        }
        
       
        if(message === ''){
            $(".error").html('Please describe what you are looking to achieve with Zentia');
            return false;
        }

        formdata = new FormData($(this)[0]);

        $.ajax({
            url: 'contact-send',

            contentType: false,
            processData: false,
            data: formdata,
            type: 'POST',

            success: function(response)
             {      
                    $("#contactForm")[0].reset();
                    $(".error").css('color', 'green');
                    $(".error").html('Request sent successfully. Zentia will contact you soon. Thanks!');
            },

        });
        return false;
    });
</script>

@endsection
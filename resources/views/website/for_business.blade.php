@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
     <section class="banner for-business-banner d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="text-main fw-700 exo">Zentia For Business</h1>
            

        </div>
    </section>
    <!-- Banner Section End --> 
    <!-- For Business Content Section Start -->
    <section class="pt-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-main roboto mb-4 fw-700">What you'll get with <br> Zentia for Business</h1>
                    <p class="text-white mb-4 fs-22 for-business-content">Customized advisor courses for your top performers and leaders.</p>
                    <p class="text-white mb-4 fs-22 for-business-content">Have the brightest and most experienced tier 1 entrepreneurs and executives help your employees unlock their full potential.</p>
                    <p class="text-white mb-4 fs-22 for-business-content">Get concrete input and feedback on strategy, organization, leadership etc., and uncover the unknown unknowns with the help of our experienced advisors.</p>
                    <div class="mt-5">
                        <a href="#" class="button-primary roboto discover-btn" data-bs-toggle="modal" data-bs-target="#forBusinessModal">Get in Touch</a>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-sm-0">
                    <div class="business-box-1 mb-4"></div>
                    <div class="business-box-2 mb-4"></div>
                    <div class="business-img-wrap text-end mb-4">
                        <img src="assets/media/for-business-img.png" alt="" class="img-fluid">
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="business-icon d-flex justify-content-center align-items-center">
                            <img src="assets/media/marketing-agent.png" alt="">
                        </div>
                        <div>
                            <div class="business-icon-2 d-flex justify-content-center align-items-center mb-4">
                                <img src="assets/media/light-bulb.png" alt="">
                            </div>
                            <div class="business-box-3"></div>
                        </div>
                    </div>
                </div>
                <!-- The Modal Content Start-->
                <div class="modal fade" id="forBusinessModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content business-modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <h2 class="modal-title text-center mb-2 fw-700 roboto">Zentia for Business</h2>
                                <p class="text-dark text-center fs-20">Let's get in touch</p>
                                
                                <center><div class="error" style="color: #8c001a;font-weight: 400">&nbsp;</div></center>
                                <form id="contactForm" class="pt-3 pb-3 pb-sm-5">
                                    
                                    <div class="text-center mb-4">
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="First & Last Name" class="contact-inputs roboto">
                                         
                                    </div>
                                    <div class="text-center mb-4">
                                        <input type="email" id="emails" name="emails" value="{{ old('emails') }}" placeholder="Work Email Address" class="contact-inputs roboto">
                                         <div id="name_error" style="color:red">{{ $errors->first('emails') }}</div>
                                    </div>
                                    <div class="text-center mb-4">
                                        <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Company" class="contact-inputs roboto">
                                         <div id="name_error" style="color:red">{{ $errors->first('company') }}</div>
                                    </div>
                                    <div class="text-center mb-4">
                                        <textarea name="comments" id="comments" rows="4" class="roboto textarea"
                                        placeholder="Please describe what you're looking to achieve with Zentia">{{ old('comments') }}</textarea>
                                         <div id="name_error" style="color:red">{{ $errors->first('comments') }}</div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="button-primary roboto discover-btn d-inline-block mt-0">Submit</button>
                                        
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- The Modal Content End-->
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="business-img-wrap mb-4">
                        <img src="assets/media/for-business-aside.webp" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="text-main roboto mb-4 fw-700">Empower, support and <br> develop top performers <br>and improve retention</h1>
                    <p class="text-white mb-4 fs-22 for-business-content">Choose specific topics for each month (fx scaling marketing, product dev., sales, fundraising etc.) - we'll match you with the coaches who fit your specific stage and criteria the best way possible.</p>
                </div>
            </div>
        </div>
    </section>
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
        var company  = $('#company').val();
        var comments = $('#comments').val();
        
        if(name === ''){
            $(".error").html('Please enter first & last name...');
            return false;
        }
        
        
        if(emails === ''){
            $(".error").html('Please enter work email address...');
            return false;
        }
        
        
        if(company === ''){
            $(".error").html('Please enter company...');
            return false;
        }
        
        
        if(comments === ''){
            $(".error").html('Please describe what you are looking to achieve with Zentia');
            return false;
        }

        formdata = new FormData($(this)[0]);

        $.ajax({
            url: 'contactInq',

            contentType: false,
            processData: false,
            data: formdata,
            type: 'POST',

            success: function(response)
             {      
                    $("#contactForm")[0].reset();
                    $(".error").css('color', 'green');
                    $(".error").html('Thanks For Your Inquiry !');
                   

                

            },

        });
        return false;
    });
</script>


@endsection
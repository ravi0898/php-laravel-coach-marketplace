<!DOCTYPE html>

<html>

<head>

	<title>Zentia</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.min.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">

        .panel-title {

        display: inline;

        font-weight: bold;

        }

        .display-table {

            display: table;

        }

        .display-tr {

            display: table-row;

        }

        .display-td {

            display: table-cell;

            vertical-align: middle;

            width: 61%;

        }
        .d-block{
            display: block;
        }
        .mt-2{
            margin-top: 16px;
        }
        .panel-heading{
            padding: 14px 18px;
        }
        .panel-title{
            font-size: 22px;
        }
        .payment-body{
            background-image: linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.4)), url(https://t4.ftcdn.net/jpg/04/65/45/67/360_F_465456720_bZ8mTB934YkoKXKh4dkqjM9OXnkkdNRl.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
    </style>

</head>

<body class="payment-body">

  

<div class="container">

  

   
    <div class="row" style="margin:100px 0 0 0">

        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-default credit-card-box">

                <div class="panel-heading display-table d-block" >

                    <div class="d-flex" >

                        <h3 class="panel-title display-td roboto" >Payment Details</h3>

                        <div class="display-td" >                            

                            <div style="display: flex; justify-content: space-between; align-items: center">
                                <img class="img-responsive pull-right" class="" src="{{ URL::asset('assets/media/visa.png') }}">
                                <img class="img-responsive pull-right" src="{{ URL::asset('assets/media/mastercard.png') }}">
                                <img class="img-responsive pull-right" src="{{ URL::asset('assets/media/american-express.png') }}">
                                <img class="img-responsive pull-right" src="{{ URL::asset('assets/media/discover.png') }}">
                            </div>

                        </div>

                    </div>                    

                </div>

                <div class="panel-body">

  

                    @if (Session::has('success'))

                        <div class="alert alert-success text-center">

                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                            <p>{{ Session::get('success') }}</p>

                        </div>

                    @endif

  

                    <form role="form" action="{{ route('stripe_extend.post') }}" method="post" class="require-validation"

                                                     data-cc-on-file="false"

                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"

                                                    id="payment-form">

                        @csrf

                        <input type="hidden" value="{{ $booking->id }}" name="booking_id">
                        <input type="hidden" value="{{ $booking->order_id }}" name="order_id">
                        <input type="hidden" name="session_time" value="{{ $session_time1 }}">
                        <input type="hidden" name="new_session_time" value="{{ $new_session_time }}">
                        <input type="hidden" name="price" value="{{ $price }}">

                        <div class='form-row row'>

                            <div class='col-xs-12 form-group required'>

                                <label class='control-label roboto'>Name on Card</label> <input

                                    class='form-control  payment-input roboto' size='4' type='text' placeholder="Full Name">

                            </div>

                        </div>

  

                        <div class='form-row row'>

                            <div class='col-xs-12 form-group card required'>

                                <label class='control-label roboto'>Card Number</label> <input

                                    autocomplete='off' class='form-control card-number  payment-input roboto' size='20'

                                    type='text' placeholder="1234 1234 1234 1234">

                            </div>

                        </div>

  

                        <div class='form-row row'>

                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                <label class='control-label roboto'>CVC</label> <input autocomplete='off'

                                    class='form-control card-cvc  payment-input roboto' placeholder='ex. 311' size='4'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label roboto'>Expiration Month</label> <input

                                    class='form-control card-expiry-month  payment-input roboto' placeholder='MM' size='2'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label roboto'>Expiration Year</label> <input

                                    class='form-control card-expiry-year  payment-input roboto' placeholder='YYYY' size='4'

                                    type='text'>

                            </div>

                        </div>

  

                        <div class='form-row row'>

                            <div class='col-md-12 error form-group hide'>

                                <div class='alert-danger alert'>Please correct the errors and try

                                    again.</div>

                            </div>

                        </div>

  

                        <div class="row">

                            <div class="col-xs-12">

                                <button class="btn btn-primary  btn-lg btn-block text-capitalize d-block button-primary fs-14 roboto" type="submit">Pay Now ({{ $price }})</button>

                            </div>

                        </div>

                          

                    </form>

                </div>

            </div>        

        </div>

    </div>

      

</div>

  

</body>

  

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

  

<script type="text/javascript">

$(function() {

    var $form         = $(".require-validation");

  $('form.require-validation').bind('submit', function(e) {

    var $form         = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs       = $form.find('.required').find(inputSelector),

        $errorMessage = $form.find('div.error'),

        valid         = true;

        $errorMessage.addClass('hide');

 

        $('.has-error').removeClass('has-error');

    $inputs.each(function(i, el) {

      var $input = $(el);

      if ($input.val() === '') {

        $input.parent().addClass('has-error');

        $errorMessage.removeClass('hide');

        e.preventDefault();

      }

    });

  

    if (!$form.data('cc-on-file')) {

      e.preventDefault();

      Stripe.setPublishableKey($form.data('stripe-publishable-key'));

      Stripe.createToken({

        number: $('.card-number').val(),

        cvc: $('.card-cvc').val(),

        exp_month: $('.card-expiry-month').val(),

        exp_year: $('.card-expiry-year').val()

      }, stripeResponseHandler);

    }

  

  });

  

  function stripeResponseHandler(status, response) {

        if (response.error) {

            $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

        } else {

            // token contains id, last4, and card type

            var token = response['id'];

            // insert the token into the form so it gets submitted to the server

            $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

            $form.get(0).submit();

        }

    }

  

});

</script>

</html>
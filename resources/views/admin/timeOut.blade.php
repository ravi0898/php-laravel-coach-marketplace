<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meeting Time Expire</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.min.css') }}">
</head>
<body id="chat-pag" class="bg-gray d-flex justify-content-center align-items-center rating-body">
    <main>
        <div class="rating-wrap text-center">
             @if (\Session::has('success'))

            <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
            <strong> <i class="mdi mdi-alert-octagon"></i> </strong> {!! \Session::get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            
            
            <form method="POST" action="{{ route('user-addReview') }}">
            @csrf
            <!-- <img src="../assets/media/star.webp" alt="" class="rating-img mb-2"> -->
            <h4 class="text-main fw-700 mb-3 roboto rating-heading">How was your meeting with the  advisor</h4>
            <div class="star-rating m-auto mb-3">
                <input type="radio" id="5-stars" name="rating" value="5" {{(old('rating') == '5') ? 'checked' : ''}} />
                <label for="5-stars" class="star">&#9733;</label>
                <input type="radio" id="4-stars" name="rating" value="4" {{(old('rating') == '4') ? 'checked' : ''}} />
                <label for="4-stars" class="star">&#9733;</label>
                <input type="radio" id="3-stars" name="rating" value="3" {{(old('rating') == '3') ? 'checked' : ''}} />
                <label for="3-stars" class="star">&#9733;</label>
                <input type="radio" id="2-stars" name="rating" value="2" {{(old('rating') == '2') ? 'checked' : ''}} />
                <label for="2-stars" class="star">&#9733;</label>
                <input type="radio" id="1-star" name="rating" value="1"  {{(old('rating') == '1') ? 'checked' : ''}} />
                <label for="1-star" class="star">&#9733;</label>
            </div>
            <div id="name_error" style="color:red">{{ $errors->first('rating') }}</div>
                <input type="hidden" name="coach_id" value="{{ $booking->coach_id }}">
                <textarea name="comment" class="rate-textarea roboto mt-3 mb-4" placeholder="Please write a small review of your session with the advisor">{{ old('comment') }}</textarea>
                 <div id="name_error" style="color:red">{{ $errors->first('comment') }}</div>
                <div class="text-center mt-2 mt-sm-4">
                    <button type="submit" class="button-primary roboto discover-btn bg-main d-inline-block mt-0 text-dark w-50" style="border-radius: 34px;border: 2px solid #ff9b7b">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/ui.min.js') }}"></script>
</body>
</html>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta http-equiv="content-type" content="text/html; charset=utf-8">-->
<!--    <meta name="author" content="TechyDevs">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Meeting Time Expire</title>-->
     
     <!--== css include ==-->
      
    <!-- Favicon -->
<!--<link rel="icon" href="">-->

<!-- Google Fonts -->

<!--== css include ==-->
<!--</head>-->
<!--<body id="chat-pag">-->
<!--    <center>-->
        
<!--     <h1>Expire Meeting.....</h1>-->
<!--     <p>Right now your time is expire for meeting , if you want meeting again you can purchase any slots.</p>-->
<!--    </center>-->
<!--</body>-->
<!--</html>-->


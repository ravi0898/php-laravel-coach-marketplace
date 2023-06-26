@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
    <!-- Profile Section Start -->
    <!-- Banner Section Start -->
    <section class="discover-banner banner d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="banner-heading m-0 mb-5 roboto fw-700">Discover all tier 1 entrepreneurs and executives</h1>
            <div class="search-btn-wrap">
                
                 <input type="text" id="search" name="search" class="roboto discover-search-input" placeholder="Search by name...">
                 <button class="search_coach button-primary roboto text-main px-5 discover-search-btn text-black">Search</button>
                
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
    <!-- Category Section Start --> 
    <section class="categories-section py-5">
        <div class="container">
        <p class="profile-heading text-white roboto mb-2">Industry</p>
            <div class="swiper discover-slider">
                <div class="swiper-wrapper">

			 @foreach ($Industry as $IndustryList)
                	  <div class="swiper-slide">
                        <div class="profile-time-slot category-slots mb-0">
                            <div class="time-select check-cl custom-color1">
                                <label> 
                                    <input type="checkbox" name="industry[]" value="{{ $IndustryList->id }}" class="ajaxfilter industrycheckbox"><span class="text-white exo">{{ $IndustryList->name }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                 	 @endforeach
                   
                </div>
                <div class="swiper-button-next slider-next-btn"></div>
                <div class="swiper-button-prev slider-prev-btn"></div>
            </div>


		<p class="profile-heading text-white roboto mb-2">Expertise</p>
            <div class="swiper discover-slider">
                <div class="swiper-wrapper">

			@foreach ($Expertise as $ExpertiseList)
                	  <div class="swiper-slide">
                        <div class="profile-time-slot category-slots mb-0">
                            <div class="time-select check-cl custom-color1">
                                <label> 
                                    <input type="checkbox" name="expertise[]" value="{{ $ExpertiseList->id }}" class="ajaxfilter expertisecheckbox"><span class="text-white exo">{{ $ExpertiseList->name }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                 	 @endforeach
                   
                </div>
                <div class="swiper-button-next slider-next-btn"></div>
                <div class="swiper-button-prev slider-prev-btn"></div>
            </div>

		
		<p class="profile-heading text-white roboto mb-2">Business Models</p>
            <div class="swiper discover-slider">
                <div class="swiper-wrapper">

			@foreach ($Business as $BusinessList)
                	  <div class="swiper-slide">
                        <div class="profile-time-slot category-slots mb-0">
                            <div class="time-select check-cl custom-color1">
                                <label> 
                                    <input type="checkbox" name="business_models[]" value="{{ $BusinessList->id }}" class="ajaxfilter business_modelscheckbox"><span class="text-white exo">{{ $BusinessList->name }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                 	 @endforeach
                   
                </div>
                <div class="swiper-button-next slider-next-btn"></div>
                <div class="swiper-button-prev slider-prev-btn"></div>
            </div>

        </div>
    </section>
    <!-- Category Section End -->
    <!-- Trending Coaches Section Start-->
    <section class="founders-section bg-gray py-5">
        <div class="container">
            <h2 class="text-white roboto text-center mb-4 fw-700">Highlighted Categories</h2>
            
            <div id="coach_listing">
            <div class="section-title">
                <h3 class="text-white roboto mb-4">Trending coaches</h3>
            </div>    
            @if(!empty($coaches))
            <div class="swiper mySwiper swiper-padding mb-5">
                <div class="swiper-wrapper">
                    @foreach($coaches as $coach)
                    <div class="swiper-slide">
                        <div class="card-wrapper">
                            @php $ide = Crypt::encrypt($coach->id); @endphp
                            <a href="{{ route('coach-detail', $ide )}}" class="d-block card-img-wrap bg-main">
                               @if(!empty($coach->profile_photo))
                               <img src="{{ URL::asset('/'.$coach->profile_photo) }}">
                               @else
                               <img src="{{ URL::asset('assets/media/favicon.png') }}">
                               @endif
                                <!--<img src="{{ URL::asset('assets/media/s1.jpg') }}" alt="">-->
                                <div class="image-overlay"></div>
                            </a>
                            <a href="{{ route('coach-detail', $ide )}}" class="image-content d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-white mb-0">{{ $coach->name }}</p>
                                    <p class="text-white mb-1">${{ $coach->price_20 }} / Session</p>
                                </div>
                                <img src="{{ URL::asset('assets/media/correct.png') }}" alt="" class="check-img">
                            </a>
                            <div class="featured-card-content">
                                <p class="text-white roboto mb-2 card-subtitle">{{ $coach->biography }}
                                </p>
                                <!--<p class="text-white roboto mb-0 card-subtitle">CMO @Netflix, 2x IPO's in USA -->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            @endif

            <div class="section-title">
                <h3 class="text-white roboto mb-4">Marketing & Branding</h3>
            </div>
             @if(!empty($coaches_marketing))
            <div class="swiper mySwiper swiper-padding mb-5">
                <div class="swiper-wrapper">
                    @foreach($coaches_marketing as $coach)
                    <div class="swiper-slide">
                        <div class="card-wrapper">
                            @php $ide = Crypt::encrypt($coach->id); @endphp
                            <a href="{{ route('coach-detail', $ide )}}" class="d-block card-img-wrap bg-main">
                               @if(!empty($coach->profile_photo))
                               <img src="{{ URL::asset('/'.$coach->profile_photo) }}">
                               @else
                               <img src="{{ URL::asset('assets/media/favicon.png') }}">
                               @endif
                                <!--<img src="{{ URL::asset('assets/media/s1.jpg') }}" alt="">-->
                                <div class="image-overlay"></div>
                            </a>
                            <a href="{{ route('coach-detail', $ide )}}" class="image-content d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-white mb-0">{{ $coach->name }}</p>
                                    <p class="text-white mb-1">${{ $coach->price_20 }} / Session</p>
                                </div>
                                <img src="{{ URL::asset('assets/media/correct.png') }}" alt="" class="check-img">
                            </a>
                            <div class="featured-card-content">
                                <p class="text-white roboto mb-2 card-subtitle">{{ $coach->biography }}
                                </p>
                                <!--<p class="text-white roboto mb-0 card-subtitle">CMO @Netflix, 2x IPO's in USA -->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            @endif

            <div class="section-title">
                <h3 class="text-white roboto mb-4">Product Development</h3>
            </div>
             @if(!empty($coaches_product))
            <div class="swiper mySwiper swiper-padding mb-5">
                <div class="swiper-wrapper">
                    @foreach($coaches_product as $coach)
                    <div class="swiper-slide">
                        <div class="card-wrapper">
                            @php $ide = Crypt::encrypt($coach->id); @endphp
                            <a href="{{ route('coach-detail', $ide )}}" class="d-block card-img-wrap bg-main">
                               @if(!empty($coach->profile_photo))
                               <img src="{{ URL::asset('/'.$coach->profile_photo) }}">
                               @else
                               <img src="{{ URL::asset('assets/media/favicon.png') }}">
                               @endif
                                <!--<img src="{{ URL::asset('assets/media/s1.jpg') }}" alt="">-->
                                <div class="image-overlay"></div>
                            </a>
                            <a href="{{ route('coach-detail', $ide )}}" class="image-content d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-white mb-0">{{ $coach->name }}</p>
                                    <p class="text-white mb-1">${{ $coach->price_20 }} / Session</p>
                                </div>
                                <img src="{{ URL::asset('assets/media/correct.png') }}" alt="" class="check-img">
                            </a>
                            <div class="featured-card-content">
                                <p class="text-white roboto mb-2 card-subtitle">{{ $coach->biography }}
                                </p>
                                <!--<p class="text-white roboto mb-0 card-subtitle">CMO @Netflix, 2x IPO's in USA -->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            @endif

            <div class="section-title">
                <h3 class="text-white roboto mb-4">Fundraising Experience</h3>
            </div>
             @if(!empty($coaches_Fundraising))
            <div class="swiper mySwiper swiper-padding mb-5">
                <div class="swiper-wrapper">
                    @foreach($coaches_Fundraising as $coach)
                    <div class="swiper-slide">
                        <div class="card-wrapper">
                            @php $ide = Crypt::encrypt($coach->id); @endphp
                            <a href="{{ route('coach-detail', $ide )}}" class="d-block card-img-wrap bg-main">
                               @if(!empty($coach->profile_photo))
                               <img src="{{ URL::asset('/'.$coach->profile_photo) }}">
                               @else
                               <img src="{{ URL::asset('assets/media/favicon.png') }}">
                               @endif
                                <!--<img src="{{ URL::asset('assets/media/s1.jpg') }}" alt="">-->
                                <div class="image-overlay"></div>
                            </a>
                            <a href="{{ route('coach-detail', $ide )}}" class="image-content d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-white mb-0">{{ $coach->name }}</p>
                                    <p class="text-white mb-1">${{ $coach->price_20 }} / Session</p>
                                </div>
                                <img src="{{ URL::asset('assets/media/correct.png') }}" alt="" class="check-img">
                            </a>
                            <div class="featured-card-content">
                                <p class="text-white roboto mb-2 card-subtitle">{{ $coach->biography }}
                                </p>
                                <!--<p class="text-white roboto mb-0 card-subtitle">CMO @Netflix, 2x IPO's in USA -->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            @endif

            </div>
        </div>
    </section>
    
@endsection
@section('scripts')  
<script>
$('.ajaxfilter').on('click', function(){    
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var industry = [];
   
    $('.industrycheckbox:checked').each(function() {
       industry.push(this.value);
    });
    
    var expertise = [];
   
    $('.expertisecheckbox:checked').each(function() {
       expertise.push(this.value);
    });
    
    var business_models = [];
   
    $('.business_modelscheckbox:checked').each(function() {
       business_models.push(this.value);
    });
    
    
    $.ajax({
		url: "{{url('search/discover-advisors')}}",  
		type: "POST",
		cache: false,
		type: "POST",
		data: {
    			industry: industry, expertise: expertise, business_models: business_models, 
    		},
		success: function(data){ 
		  // alert(data);
		    if (data != 'error') {
               
                $("#coach_listing").html(data);
               
            }
		
		}
	});
     
});
</script>

<script>
$('.search_coach').on('click', function(){    
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var search     = $('#search').val();
    
    if(search === ''){
        return false;
    }
    
    $.ajax({
		url: "{{url('search-coach')}}",  
		type: "POST",
		cache: false,
		type: "POST",
		data: {
    			search: search
    		},
		success: function(data){ 
		  // alert(data);
		    if (data != 'error') {
               
                $("#coach_listing").html(data);
               
            }
		
		}
	});
     
});
</script>
@endsection
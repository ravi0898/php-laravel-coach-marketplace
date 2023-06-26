@extends('website_tp.layouts.header')
@section('styles') 
@endsection
@section('content')  
@if(!empty($coachsearches))  
    <div class="swiper mySwiper mt-5 pt-5 swiper-padding mb-5">
        <div class="swiper-wrapper">
            @if(count($coachsearches) > 0)
            @foreach($coachsearches as $coach)
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
            @else
            <div class="text-center w-100"> 
                <img src="{{ URL::asset('assets/media/no-data-found.png') }}" alt="" class="no-data-img"> 
                <h2 class="text-main roboto no-data-text">No Data Found!</h2>
            <div class="text-center my-5">
                <a href="" class="clear-fix search_coach button-primary roboto text-main px-5 text-black">View All</a>
            </div>

            </div>


            @endif
            
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
@endif
@endsection
@section('scripts')  

@endsection        
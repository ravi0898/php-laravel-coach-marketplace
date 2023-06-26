@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
    <!-- Profile Section Start -->
    <main class="bg-gray py-5">
        <div class="container">
          
               @if($message = Session::get('success_done'))
               <!--<div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">-->
               <!--   <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> -->
               <!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
               <!--   <span aria-hidden="true">&times;</span>-->
               <!--   </button>-->
               <!--</div>-->
               <div class="alert alert-success alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong class="exo">{{ $message }}</strong>
               </div>
               @endif
               @if($message = Session::get('error_done'))
               <!--<div class="alert alert-danger alert-dismissible fade show col-lg-8 mx-auto" role="alert">-->
               <!--   <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> -->
               <!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
               <!--   <span aria-hidden="true">&times;</span>-->
               <!--   </button>-->
               <!--</div>-->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong class="exo">{{ $message }}</strong>
                 </div>
               @endif 
            <div class="row">
                <!-- Aside Section Start -->
                <aside class="col-md-5">
                    <div class="content-left p-4 mb-3">
                        <div class="coach-profile-user-name mb-2">
                            <h3 class="coach-name roboto text-white mb-0">{{ $coach->name }}</h3>
                            <img src="{{ URL::asset('assets/media/correct.png') }}" alt="">
                        </div>
                        <p class="text-white">{{ $coach->biography }}</p>
                        <div class="review-starts mb-5">
                            <ul class="stars-wrap">
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                            </ul>
                            <div class="reivew-count"><a href="#" class="text-white roboto">5.0 (@php echo count($rating); @endphp)</a></div>
                        </div>
                        <div class="about-coach-wrap">
                            <h4 class="text-white roboto mb-3 fw-700">About the coach</h4>
                            <p class="text-white">{{ $coach->about_me }}</p>
                            <!--<p class="text-white">t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>-->
                        </div>
                    </div>
                    <div class="content-left p-4">
                        <div class="about-review">
                            <h4 class="text-white roboto mb-3 fw-700">Review</h4>
                            <div class="review-content">
                                <div class="review-starts mb-3">
                                    <ul class="stars-wrap">
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                               
                                <!--<p class="text-white">Super talk!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                                
                                @if(count($rating)>0)
                                @foreach($rating as $rate)
                                <p class="text-white">{{ $rate->comment }}</p>
                                @endforeach
                                @else
                                <p class="text-white">No review available</p>
                                @endif
                            </div>
                           
                        </div>
                    </div>
                </aside>
                <!-- Aside Section End -->
                <!-- Coach Profile Content Start -->
                <section class="col-md-7">
                    <div class="coach-profile-content">
                        <div class="coach-img mb-4">
                           @if(!empty($coach->profile_photo))
                           <img src="{{ URL::asset('/'.$coach->profile_photo) }}"  alt="" class="coach-profile-img">
                           @else
                           <img src="{{ URL::asset('assets/media/coach-img.webp') }}" alt="" class="coach-profile-img">
                           @endif
                           
                        </div>
                        
                        @php
                        $today = date("Y-m-d");
                        $NewDate = Date('Y-m-d', strtotime('+10 days'));
                        $period = new DatePeriod(
                             new DateTime($today),
                             new DateInterval('P1D'),
                             new DateTime($NewDate)
                        );
                        @endphp
                       
                        @if ($errors->any())
                           @foreach ($errors->all() as $error)
                                 <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong class="exo">{{ $error }}</strong>
                                 </div>
                           @endforeach
                             
                        @endif
                        <h1 class="text-white fw-700 roboto">Book a video session </h1>
                        <p class="profile-heading text-white roboto">Choose your preferred session length</p> 
                        <form action="{{route('user-slot-booking' )}}" class="profile-form"  method="post">
                        {{ csrf_field() }}
                        
                            <input type="hidden" value="{{ $coach->id }}" name="coach_id">
                            <div class="profile-time-slot mb-4">
                                <div class="time-select check-cl"> 
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_20 }}/20"  {{(old('preferred_session') == $coach->price_20.'/20') ? 'checked' : ''}} ><span class="text-white exo">20 Min.</span>
                                    </label>
                                </div>
                                <div class="time-select check-cl">
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_40 }}/40" {{(old('preferred_session') == $coach->price_40.'/40') ? 'checked' : ''}} ><span class="text-white exo">40 Min.</span>
                                    </label>
                                </div>
                                <div class="time-select check-cl">
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_60 }}/60" {{(old('preferred_session') == $coach->price_60.'/60') ? 'checked' : ''}} ><span class="text-white exo">1 Hour</span>
                                    </label>
                                </div>
                            </div>
                            <p class="profile-heading text-white roboto">Choose your preferred date</p><p class="mb-4">(To increase your chances of getting your request accepted, we suggest selecting 5 or more time slots of when you're available)</p>
                          
                            <div class="form-max">
                                @php $slot_array = explode(",",$coach->available_slots); @endphp
                        
                            @foreach ($period as $key => $value) 
                            @php
                                $some_time = strtotime($value->format('Y-m-d'));    
                                if($value->format('Y-m-d') == $today){
                                    $dd = 'Today';
                                }else{
                                    $dd = date('l', $some_time).', '.date('d F', $some_time).'.';
                                }
                            @endphp
                            <div class="mb-3">
                                <p class="profile-heading text-white roboto mb-2">{{ $dd }}</p> 
                                <div class="profile-date-available-slot mb-4">
                                    @foreach ($slot_array as $s_arr) 
                                    
                                    @foreach ($coach_booking as $coach_book) 
                                        @if($coach_book->meeting_date == $value->format('Y-m-d') )
                                            @if($coach_book->meeting_time == $s_arr )
                                            <div class="time-select check-cl">
                                                <label>
                                                    <!--<input type="checkbox"  name="preferred_date[]" value="{{ $s_arr }}/{{$value->format('Y-m-d')}}" >-->
                                                    <span class="text-white exo sold-unselect" style="padding: 8px 30px;">{{ $s_arr }} <h6 class="text-uppercase text-main p-0 fw-700 sold-status">sold</h6></span>
                                                </label>
                                            </div>
                                            @endif
                                        @else
                                        
                                        @endif
                                    @endforeach
                                    
                                    <div class="time-select check-cl">
                                        <label>
                                            <input type="checkbox"  name="preferred_date[]" value="{{ $s_arr }}/{{$value->format('Y-m-d')}}" >
                                            <span class="text-white exo">{{ $s_arr }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                    <!--<div class="time-select check-cl">-->
                                    <!--    <label>-->
                                    <!--        <input type="checkbox"  name="availability[]" value="6-7am" >-->
                                    <!--        <span class="text-white exo">12:00 AM </span>-->
                                    <!--    </label>-->
                                    <!--</div>-->
                                    <!--<div class="time-select check-cl">-->
                                    <!--    <span class="text-white exo sold-unselect">9:00 AM <h5 class="text-uppercase text-main p-0 fw-700 sold-status">sold</h5> </span>-->
                                    <!--</div>-->
                                    <!--<div class="time-select check-cl">-->
                                    <!--    <label>-->
                                    <!--        <input type="checkbox"  name="availability[]" value="6-7am" >-->
                                    <!--        <span class="text-white exo">11:00 AM </span>-->
                                    <!--    </label>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            @endforeach
                 
                            </div>
                            <div class="slot-info">
                                <!--<p class="profile-heading text-blue mb-1 roboto">Friday 7'th of June 2022</p>-->
                                <!--<p class="profile-heading text-blue mb-1 roboto">10.40 - 11:40 AM</p>-->
                                <p class="profile-heading text-white roboto">${{ $coach->price_20 }} / Session</p>
                                <button type="submit" class="btn button-primary btn-blue roboto">Book now</button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- Coach Profile Content End -->
            </div>
        </div>
    </main>
    <!-- Profile Section End -->
@endsection
@section('scripts')  
@endsection







<!-- 31-8-2022      -->
@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
    <!-- Profile Section Start -->
    <main class="bg-gray py-5">
        <div class="container">
          
               @if($message = Session::get('success_done'))
               <!--<div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">-->
               <!--   <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> -->
               <!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
               <!--   <span aria-hidden="true">&times;</span>-->
               <!--   </button>-->
               <!--</div>-->
               <div class="alert alert-success alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong class="exo">{{ $message }}</strong>
               </div>
               @endif
               @if($message = Session::get('error_done'))
               <!--<div class="alert alert-danger alert-dismissible fade show col-lg-8 mx-auto" role="alert">-->
               <!--   <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> -->
               <!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
               <!--   <span aria-hidden="true">&times;</span>-->
               <!--   </button>-->
               <!--</div>-->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong class="exo">{{ $message }}</strong>
                 </div>
               @endif 
            <div class="row">
                <!-- Aside Section Start -->
                <aside class="col-md-5">
                    <div class="content-left p-4 mb-3">
                        <div class="coach-profile-user-name mb-2">
                            <h3 class="coach-name roboto text-white mb-0">{{ $coach->name }}</h3>
                            <img src="{{ URL::asset('assets/media/correct.png') }}" alt="">
                        </div>
                        <p class="text-white">{{ $coach->biography }}</p>
                        <div class="review-starts mb-5">
                            <ul class="stars-wrap">
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                            </ul>
                            <div class="reivew-count"><a href="#" class="text-white roboto">5.0 (@php echo count($rating); @endphp)</a></div>
                        </div>
                        <div class="about-coach-wrap">
                            <h4 class="text-white roboto mb-3 fw-700">About the coach</h4>
                            <p class="text-white">{{ $coach->about_me }}</p>
                            <!--<p class="text-white">t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>-->
                        </div>
                    </div>
                    <div class="content-left p-4">
                        <div class="about-review">
                            <h4 class="text-white roboto mb-3 fw-700">Review</h4>
                            <div class="review-content">
                                <div class="review-starts mb-3">
                                    <ul class="stars-wrap">
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active-star" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                               
                                <!--<p class="text-white">Super talk!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                                
                                @if(count($rating)>0)
                                @foreach($rating as $rate)
                                <p class="text-white">{{ $rate->comment }}</p>
                                @endforeach
                                @else
                                <p class="text-white">No review available</p>
                                @endif
                            </div>
                           
                        </div>
                    </div>
                </aside>
                <!-- Aside Section End -->
                <!-- Coach Profile Content Start -->
                <section class="col-md-7">
                    <div class="coach-profile-content">
                        <div class="coach-img mb-4">
                           @if(!empty($coach->profile_photo))
                           <img src="{{ URL::asset('/'.$coach->profile_photo) }}"  alt="" class="coach-profile-img">
                           @else
                           <img src="{{ URL::asset('assets/media/coach-img.webp') }}" alt="" class="coach-profile-img">
                           @endif
                           
                        </div>
                       
                        @php
                        $today = date("Y-m-d");
                        $NewDate = Date('Y-m-d', strtotime('+10 days'));
                        $period = new DatePeriod(
                             new DateTime($today),
                             new DateInterval('P1D'),
                             new DateTime($NewDate)
                        );
                        @endphp
                       
                        @if ($errors->any())
                           @foreach ($errors->all() as $error)
                                 <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong class="exo">{{ $error }}</strong>
                                 </div>
                           @endforeach
                             
                        @endif
                        <h1 class="text-white fw-700 roboto">Book a video session </h1>
                        <p class="profile-heading text-white roboto">Choose your preferred session length</p> 
                        <form action="{{route('user-slot-booking' )}}" class="profile-form"  method="post">
                        {{ csrf_field() }}
                        
                            <input type="hidden" value="{{ $coach->id }}" name="coach_id">
                            <div class="profile-time-slot mb-4">
                                <div class="time-select check-cl"> 
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_20 }}/20"  {{(old('preferred_session') == $coach->price_20.'/20') ? 'checked' : ''}} ><span class="text-white exo">20 Min.</span>
                                    </label>
                                </div>
                                <div class="time-select check-cl">
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_40 }}/40" {{(old('preferred_session') == $coach->price_40.'/40') ? 'checked' : ''}} ><span class="text-white exo">40 Min.</span>
                                    </label>
                                </div>
                                <div class="time-select check-cl">
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_60 }}/60" {{(old('preferred_session') == $coach->price_60.'/60') ? 'checked' : ''}} ><span class="text-white exo">1 Hour</span>
                                    </label>
                                </div>
                            </div>
                            <p class="profile-heading text-white roboto">Choose your preferred date</p><p class="mb-4">(To increase your chances of getting your request accepted, we suggest selecting 5 or more time slots of when you're available)</p>
                          
                            <div class="form-max">
                                @php $slot_array = explode(",",$coach->available_slots); @endphp
                        
                            @foreach ($period as $key => $value) 
                            @php
                                $some_time = strtotime($value->format('Y-m-d'));    
                                if($value->format('Y-m-d') == $today){
                                    $dd = 'Today';
                                }else{
                                    $dd = date('l', $some_time).', '.date('d F', $some_time).'.';
                                }
                            @endphp
                            <div class="mb-3">
                                <p class="profile-heading text-white roboto mb-2">{{ $dd }}</p> 
                                <div class="profile-date-available-slot mb-4">
                                    
                                    @foreach ($slot_array as $s_arr) 
                                    @if(in_array($s_arr.'/'.$value->format('Y-m-d'), $coach_booking_array))
                                    
                                            <div class="time-select check-cl">
                                                <label>
                                                    <!--<input type="checkbox"  name="preferred_date[]" value="{{ $s_arr }}/{{$value->format('Y-m-d')}}" >-->
                                                    <span class="text-white exo sold-unselect" style="padding: 8px 30px;">{{ $s_arr }} <h6 class="text-uppercase text-main p-0 fw-700 sold-status">sold</h6></span>
                                                </label>
                                            </div>
                                         
                                    @else   
                                            
                                       
                                            <div class="time-select check-cl">
                                                <label>
                                                    <input type="checkbox"  name="preferred_date[]" value="{{ $s_arr }}/{{$value->format('Y-m-d')}}" >
                                                    <span class="text-white exo">{{ $s_arr }}</span>
                                                </label>
                                            </div>
                                            @endif
                                    @endforeach
                                
                                </div>
                            </div>
                            @endforeach
                 
                            </div>
                            <div class="slot-info">
                                <!--<p class="profile-heading text-blue mb-1 roboto">Friday 7'th of June 2022</p>-->
                                <!--<p class="profile-heading text-blue mb-1 roboto">10.40 - 11:40 AM</p>-->
                                <p class="profile-heading text-white roboto">${{ $coach->price_20 }} / Session</p>
                                <button type="submit" class="btn button-primary btn-blue roboto">Book now</button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- Coach Profile Content End -->
            </div>
        </div>
    </main>
    <!-- Profile Section End -->
@endsection
@section('scripts')  
@endsection
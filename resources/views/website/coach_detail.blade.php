@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
    <!-- Profile Section Start -->
    <main class="bg-gray py-5">
        <div class="container">
          
               @if($message = Session::get('success_done_confirm'))
               <div class="alert alert-success alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong class="exo">{{ $message }}</strong>
               </div>
               @endif

              @if($message = Session::get('success_done'))
                    @php $ide = Crypt::encrypt($coach->id); @endphp
                    <div class="modal fade show bg-gray"  id="timeZoneModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog"> 
                      <div class="modal-dialog modal-dialog-centered timezone-modal ">
                        <div class="modal-content timezone-content roboto">
                          
                          <div class="modal-header border-0 justify-content-end">
                              <a href="{{ route('coach-detail', $ide) }}" class="text-white cross-btn" >X</a>
                          </div>

                          <div class="modal-body pt-0 px-sm-5 roboto"> 
                            <h3 class="text-main text-capitalize timezone-heading">Confirm Meeting Time Suggestions</h3>
                            <p class="roboto fs-20 text-center mb-3 mb-sm-5">As we have users and advisors from all over the world, the time slots are presented according to CET((GMT/UTC +01:00) Brussels) per default. Please see the time converter below, for your local time:</p>
                          @php 
                            $user_timezone = Auth::user()->timezone;
                            $booking = DB::table('booking_tempory')->where('id', $message )->first();
                          @endphp
                                @php  $plan_array =  explode(",",$booking->plan);  @endphp
                                <div class="row">
                                @if(count($plan_array) > 0)
                                
                                <div class="col-6">
                                    <h5 class="text-gray mb-4 text-center">Your selected time slots illustrated in Europe/Brussels time: </h5>

                                @foreach($plan_array as $plan_arr)
                                @php $rr = explode("/",$plan_arr); @endphp
                                
                                @php
                        
                                if($rr[0] == '1-2pm'){
                                  $meeting_start_time = $rr[1].' 13:00:00';
                                }else if($rr[0] == '2-3pm'){
                                  $meeting_start_time = $rr[1].' 14:00:00';
                                }else if($rr[0] == '3-4pm'){
                                  $meeting_start_time = $rr[1].' 15:00:00';
                                }else if($rr[0] == '4-5pm'){
                                  $meeting_start_time = $rr[1].' 16:00:00';
                                }else if($rr[0] == '5-6pm'){
                                  $meeting_start_time = $rr[1].' 17:00:00';
                                }else if($rr[0] == '6-7pm'){
                                  $meeting_start_time = $rr[1].' 18:00:00';
                                }else if($rr[0] == '7-8pm'){
                                  $meeting_start_time = $rr[1].' 19:00:00';
                                }else if($rr[0] == '8-9pm'){
                                  $meeting_start_time = $rr[1].' 20:00:00';
                                }else if($rr[0] == '9-10pm'){
                                  $meeting_start_time = $rr[1].' 21:00:00';
                                }else if($rr[0] == '10-11pm'){
                                  $meeting_start_time = $rr[1].' 22:00:00';
                                }else if($rr[0] == '11-12am'){
                                  $meeting_start_time = $rr[1].' 23:00:00';
                                }else if($rr[0] == '12-1am'){
                                  $meeting_start_time = $rr[1].' 00:00:00';
                                }else if($rr[0] == '1-2am'){
                                  $meeting_start_time = $rr[1].' 01:00:00';
                                }else if($rr[0] == '2-3am'){
                                  $meeting_start_time = $rr[1].' 02:00:00';
                                }else if($rr[0] == '3-4am'){
                                  $meeting_start_time = $rr[1].' 03:00:00';
                                }else if($rr[0] == '4-5am'){
                                  $meeting_start_time = $rr[1].' 04:00:00';
                                }else if($rr[0] == '5-6am'){
                                  $meeting_start_time = $rr[1].' 05:00:00';
                                }else if($rr[0] == '6-7am'){
                                  $meeting_start_time = $rr[1].' 06:00:00';
                                }else if($rr[0] == '7-8am'){
                                  $meeting_start_time = $rr[1].' 07:00:00';
                                }else if($rr[0] == '8-9am'){
                                  $meeting_start_time = $rr[1].' 08:00:00';
                                }else if($rr[0] == '9-10am'){
                                  $meeting_start_time = $rr[1].' 09:00:00';
                                }else if($rr[0] == '10-11am'){
                                  $meeting_start_time = $rr[1].' 10:00:00';
                                }else if($rr[0] == '11-12pm'){
                                  $meeting_start_time = $rr[1].' 11:00:00';
                                }else if($rr[0] == '12-1pm'){
                                  $meeting_start_time = $rr[1].' 12:00:00';
                                }
                                @endphp
                                
                                        <div class="date-time-wrap mb-2">
                                            @php
                                            $datetime = new DateTime($meeting_start_time);
                                            $la_time = new DateTimeZone($user_timezone);
                                            $datetime->setTimezone($la_time);
                                            $ttn_user =  $datetime->format('Y-m-d H:i:s');
                                            @endphp
                                            <p class="roboto mb-0">@php echo $meeting_start_time;  @endphp </p>
                                        </div>

                                @endforeach
                                
                          
                                <div class="text-center mt-4">
                                    <a href="{{ route('coach-detail', $ide) }}" class="button-primary roboto discover-btn" style="border-radius:30px; font-weight: 400;">Choose Again</a>
                                </div>
                              </div>
                              @endif
                              

                              @if(count($plan_array) > 0)
                                
                              <div class="col-6">
                                  <h5 class="text-gray mb-4 text-center">Your selected time slots illustrated in your local time (@php echo $user_timezone; @endphp):</h5>

                                @foreach($plan_array as $plan_arr)
                                @php $rr = explode("/",$plan_arr); @endphp
                                
                                @php
                        
                                if($rr[0] == '1-2pm'){
                                  $meeting_start_time = $rr[1].' 13:00:00';
                                }else if($rr[0] == '2-3pm'){
                                  $meeting_start_time = $rr[1].' 14:00:00';
                                }else if($rr[0] == '3-4pm'){
                                  $meeting_start_time = $rr[1].' 15:00:00';
                                }else if($rr[0] == '4-5pm'){
                                  $meeting_start_time = $rr[1].' 16:00:00';
                                }else if($rr[0] == '5-6pm'){
                                  $meeting_start_time = $rr[1].' 17:00:00';
                                }else if($rr[0] == '6-7pm'){
                                  $meeting_start_time = $rr[1].' 18:00:00';
                                }else if($rr[0] == '7-8pm'){
                                  $meeting_start_time = $rr[1].' 19:00:00';
                                }else if($rr[0] == '8-9pm'){
                                  $meeting_start_time = $rr[1].' 20:00:00';
                                }else if($rr[0] == '9-10pm'){
                                  $meeting_start_time = $rr[1].' 21:00:00';
                                }else if($rr[0] == '10-11pm'){
                                  $meeting_start_time = $rr[1].' 22:00:00';
                                }else if($rr[0] == '11-12am'){
                                  $meeting_start_time = $rr[1].' 23:00:00';
                                }else if($rr[0] == '12-1am'){
                                  $meeting_start_time = $rr[1].' 00:00:00';
                                }else if($rr[0] == '1-2am'){
                                  $meeting_start_time = $rr[1].' 01:00:00';
                                }else if($rr[0] == '2-3am'){
                                  $meeting_start_time = $rr[1].' 02:00:00';
                                }else if($rr[0] == '3-4am'){
                                  $meeting_start_time = $rr[1].' 03:00:00';
                                }else if($rr[0] == '4-5am'){
                                  $meeting_start_time = $rr[1].' 04:00:00';
                                }else if($rr[0] == '5-6am'){
                                  $meeting_start_time = $rr[1].' 05:00:00';
                                }else if($rr[0] == '6-7am'){
                                  $meeting_start_time = $rr[1].' 06:00:00';
                                }else if($rr[0] == '7-8am'){
                                  $meeting_start_time = $rr[1].' 07:00:00';
                                }else if($rr[0] == '8-9am'){
                                  $meeting_start_time = $rr[1].' 08:00:00';
                                }else if($rr[0] == '9-10am'){
                                  $meeting_start_time = $rr[1].' 09:00:00';
                                }else if($rr[0] == '10-11am'){
                                  $meeting_start_time = $rr[1].' 10:00:00';
                                }else if($rr[0] == '11-12pm'){
                                  $meeting_start_time = $rr[1].' 11:00:00';
                                }else if($rr[0] == '12-1pm'){
                                  $meeting_start_time = $rr[1].' 12:00:00';
                                }
                                @endphp
                                
                                        <div class="date-time-wrap mb-2">
                                            @php
                                            $datetime = new DateTime($meeting_start_time);
                                            $la_time = new DateTimeZone($user_timezone);
                                            $datetime->setTimezone($la_time);
                                            $ttn_user =  $datetime->format('Y-m-d H:i:s');
                                            @endphp
                                            <p class="roboto mb-0">@php echo $ttn_user;  @endphp </p>
                                        </div>

                                @endforeach
                                @php $idd = Crypt::encrypt($message); @endphp
                                <div class="text-center mt-4">
                                    <a href="{{ route('coach-booking-confirm', $idd) }}" class="button-primary roboto discover-btn button-blue" style="border-radius:30px; font-weight: 400;">Confirm Time</a>
                                </div>
                              </div>
                              @endif
                            
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>





               @endif
               @if($message = Session::get('error_done'))
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
                        <div class="review-starts mb-4 mb-sm-5">
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
                            <h4 class="text-white roboto mb-3 fw-700">About the advisor</h4>
                            <p class="text-white">{{ $coach->about_me }}</p>
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
                        <div class="coach-img mb-4 text-center">
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
                        <form action="{{route('booking-confirm' )}}" class="profile-form"  method="post">
                        {{ csrf_field() }}
                        
                        @php
                            if (Auth::check())
                            {
                                echo $ttzz = Auth::user()->timezone;
                            }else{
                                echo $ttzz = 'Europe/Brussels';
                            }
                           
                            $d_date = '2022-08-22 10:05:00';
                        
                            $datetime = new DateTime($d_date);
                            $la_time = new DateTimeZone($ttzz);
                            $datetime->setTimezone($la_time);
                            echo $datetime->format('Y-m-d H:i:s');
                        @endphp

                            <input type="hidden" value="{{ $coach->id }}" name="coach_id">
                            <div class="profile-time-slot mb-4 flex-wrap justify-content-center time-label">
                                <div class="time-select check-cl"> 
                                    <label>
                                        <input type="radio"  name="preferred_session" id="session_20" value="{{ $coach->price_20 }}/20"  {{(old('preferred_session') == $coach->price_20.'/20') ? 'checked' : ''}} >
                                        <span class="text-white exo">20 Min.</span>
                                    </label>
                                    <p class="text-white roboto profile-price-tag">${{ $coach->price_20 }}</p>
                                    <input type="hidden"  name="session_20_val" id="session_20_val" value="{{ $coach->price_20 }}">
                                </div>
                                <div class="time-select check-cl">
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_40 }}/40" id="session_40" {{(old('preferred_session') == $coach->price_40.'/40') ? 'checked' : ''}} ><span class="text-white exo">40 Min.</span>
                                    </label>
                                    <p class="text-white roboto profile-price-tag">${{ $coach->price_40 }}</p>
                                    <input type="hidden"  name="session_40_val" id="session_40_val" value="{{ $coach->price_40 }}">
                                </div>
                                <div class="time-select check-cl">
                                    <label>
                                        <input type="radio"  name="preferred_session" value="{{ $coach->price_60 }}/60" id="session_60" {{(old('preferred_session') == $coach->price_60.'/60') ? 'checked' : ''}} ><span class="text-white exo">1 Hour</span>
                                    </label>
                                    <p class="text-white roboto profile-price-tag">${{ $coach->price_60 }}</p>
                                    <input type="hidden"  name="session_60_val" id="session_60_val" value="{{ $coach->price_60 }}">
                                </div>
                            </div>
                            <p class="profile-heading text-white roboto">Choose your preferred date</p><p class="mb-4">(To increase your chances of getting your request accepted, we suggest selecting 5 or more time slots of when you're available)</p>
                            <div class="form-max">
                                @php $slot_array = explode(",",$coach->available_slots); @endphp
                            @php 
                            $i=1; @endphp
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
                                <div class="profile-date-available-slot mb-4 justify-content-center justify-content-sm-start">
                                 
                                    @foreach ($slot_array as $s_arr) 
                                    @if(in_array($s_arr.'/'.$value->format('Y-m-d'), $coach_booking_array) || in_array($i, $count_i_array))
                                    
                                            <div class="time-select check-cl">
                                                <label>
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
                                            @php $i++; @endphp
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            </div>
                            <div class="slot-info">
                                <p class="profile-heading text-white roboto" id="price_area">${{ $coach->price_20 }} / Session</p>
                                <button type="submit" class="btn button-primary btn-blue roboto">Book now</button>

                                
                    </div>
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
<script>
$(document).ready(function(){
  $("#session_20").click(function(){
     var price = $("#session_20_val").val();
    $("#price_area").text("$"+price+" / Session");
  });

  $("#session_40").click(function(){
     var price = $("#session_40_val").val();
    $("#price_area").text("$"+price+" / Session");
  });

  $("#session_60").click(function(){
     var price = $("#session_60_val").val();
    $("#price_area").text("$"+price+" / Session");
  });
});
</script>
@endsection
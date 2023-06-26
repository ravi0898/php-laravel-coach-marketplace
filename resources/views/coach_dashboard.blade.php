@extends('coach.layouts.header')
@section('styles') 

@endsection
@section('content')

   <div class="content-wrapper">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="row">
                    <div class="col-12 col-xl-12 mb-0 mb-sm-4 mb-xl-0">
                      <h3 class="font-weight-bold text-white mb-0">Dashboard Overview</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 grid-margin transparent order-1 order-sm-0">
                  <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card custom-color6 pb-3">
                        <div class="card-body text-center">
                          <h4 class="mb-4 font-weight-bold">Booking</h4>
                          <br>
                          <p class="fs-30 mb-2 font-weight-bold">{{ count($bookingDone) }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card custom-color2 pb-3">
                        <div class="card-body text-center">
                          <h4 class="mb-4 font-weight-bold">Earnings</h4>
                          <br>
                          
                          <!--done price-->
                           @php $sumPrice = 0; @endphp
                           
                           @if(!empty($earning))
                           
                           @foreach($earning as $amount)
                           
                           @php 
                           $price           = explode(',',$amount->paid_amount);
                           $sumPrice        = $sumPrice + array_sum($price);
                           
                           @endphp
                           
                           @endforeach
                           
                           @endif
                           
                          <p class="fs-30 mb-2 font-weight-bold">${{ $sumPrice }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                      <div class="card custom-color5 pb-3">
                        <div class="card-body text-center">
                          <h4 class="mb-4 font-weight-bold">Donations</h4>
                          <br>
                          <p class="fs-30 mb-2 font-weight-bold">{{ count($donate) }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                      <div class="card custom-color4 pb-3">
                        <div class="card-body text-center">
                          <h4 class="mb-4 font-weight-bold">Sessions</h4>
                          <br>
                          
                           @php $sumMinitue = 0; @endphp
                           
                           @if(!empty($paid_session))
                           
                           @foreach($paid_session as $miniteTotal)
                           
                           @php 
                           $minTotal             = explode(',',$miniteTotal->paid_session);
                           $sumMinitue           = $sumMinitue + array_sum($minTotal);
                           
                           @endphp
                           
                           @endforeach
                           
                           @endif
                           
                          <p class="fs-30 mb-2 font-weight-bold">{{ $sumMinitue }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card order-0 order-sm-1">
                  @php
                   $booking = DB::table('booking')->where('booking.coach_id', Auth::user()->id )->where('booking.status', 'scheduled')->join('users', 'users.id', '=', 'booking.user_id')->select('booking.*', 'users.name')->get();
                  @endphp
                  <div class="card">
                    <div class="card-body">
                      <!--<p class="card-title mb-0 text-white">Scheduled Meeting</p>-->
                      <div class="table-responsive">
                          @if(count($booking) > 0)
                        <table class="table">
                          <thead class="table-bg">
                            <tr>
                              <th class="text-white">Join Meeting</th>
                              <th class="text-white">Session Length</th>
                              <th class="text-white">Meeting With</th>
                              <th class="text-white">Price</th>
                              <th class="text-white">Time & Date</th>
                              <th class="text-white">Your Local Date & Time</th>
                            </tr>  
                          </thead>
                          <tbody class="table-border">
                            
                            @php $i = 1; @endphp
                            @foreach($booking as $book)
                        	 
                            <tr class="countdownpp"  data-timer="<?=$book->meeting_start_time?>" data-curr_time="<?=date('Y-m-d H:i:s');?>" data-id="demo<?=$book->id;?>" data-link="<?=$book->meeting_link?>">
                            
                            <td id="demo<?=$book->id;?>"  value='<?php echo $book->meeting_start_time;?>'></td>

                            <td>{{ $book->meeting_session}} minutes</td>
                            
                              <td>{{ $book->name}}</td>
                              <td class="font-weight-bold">${{ $book->paid_amount}}</td>
                              <td>{{ $book->meeting_start_time}}</td>
                              @php
                              $user_timezone = Auth::user()->timezone;
                              $datetime = new DateTime($book->meeting_start_time);
                              $la_time = new DateTimeZone($user_timezone);
                              $datetime->setTimezone($la_time);
                              $ttn_user =  $datetime->format('Y-m-d H:i:s');
                              @endphp
                              <td>{{ $ttn_user }}</td>
                            </tr>
                            @php $i++; @endphp
                            
                            @endforeach
                            
                          </tbody>
                        </table>
                        @else
                            
                        <tr>
                            <div class="text-center">
                                <img src="{{ URL::asset('assets/media/pay-wait.png') }}" class="pay-gif mb-4">
                                <h4 class="text-main not-scheduled-text">You don't have any meeting scheduled yet</h4>
                            </div>
                        </tr>
                        
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
@endsection
@section('scripts')   
@endsection




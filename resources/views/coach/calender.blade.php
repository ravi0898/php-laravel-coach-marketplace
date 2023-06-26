@extends('coach.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
 
    @if($user->status == '1' && !empty($user->available_slots) )
        @if(!empty($user->price_20) && !empty($user->expertise) && !empty($user->about_me))
        <!-- <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
          <strong> <i class="mdi mdi-thumb-up-outline"></i> Your profile and calendar has been updated and saved. Our team will look through it and approve or provide feedback shortly.</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div> -->
        <div class="alert alert-dismissible fade show col-lg-8 mx-auto success-message-wrap" role="alert">
            <div class="d-flex align-items-center">
               <p class="success-tag d-none d-sm-flex"><i class="ti-check-box menu-icon mr-2"></i>Saved</p>
               <div class="d-flex flex-column">
                  <h4 class="message-heading text-success mb-1">Successfully Updated</h4>
                  <span>Your profile and calendar has been updated and saved. Our team will look through it and approve or provide feedback shortly.</span>
               </div> 
            </div>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </button>
          </div>
        @else
            <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
              <strong> <i class="mdi mdi-thumb-up-outline"></i> Your calender is updated and saved.Please complete your profile too.</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-dismissible fade show col-lg-8 mx-auto success-message-wrap" role="alert">
               <div class="d-flex align-items-center">
                  <p class="success-tag d-none d-sm-flex"><i class="ti-check-box menu-icon mr-2"></i>Saved</p>
                  <div class="d-flex flex-column">
                     <h4 class="message-heading text-success mb-1">Update Profile</h4>
                     <span>Your calender is updated and saved.Please complete your profile too.</span>
                  </div> 
               </div>
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               </button>
            </div>
        @endif
    @endif
    
    @if($user->status == '1' && empty($user->available_slots))
        <div class="alert alert-dismissible fade show col-lg-8 mx-auto error-message-wrap" role="alert">
            <div class="d-flex align-items-center">
               <p class="danger-tag d-none d-sm-flex"><i class="ti-pencil-alt menu-icon mr-2"></i>Update</p>
               <p class="text-danger mr-4 mb-0">Please update your calender. And locked categories will unlock once your profile and calendar has been approved. Thanks!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
         </div>
    @endif
 

    @if($message = Session::get('success_done_tempory'))
    <div class="modal fade show" id="timeZoneModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block; background: #222;" aria-modal="true" role="dialog"> 
    <div class="modal-dialog modal-dialog-centered timezone-modal ">
      <div class="modal-content timezone-content roboto">
        <div class="modal-header border-0 justify-content-end">
            <a href="{{ route('coach-calender') }}" class="text-white cross-btn" >X</a>
        </div>
        <div class="modal-body pt-0 px-sm-5 roboto"> 
          <h3 class="text-main text-capitalize timezone-heading">Confirm Calendar</h3>
          <p class="roboto fs-20 text-center mb-3 mb-sm-5">Zentia shows time slots according to CET((GMT/UTC +01:00) Brussels) time zone on all Advisor’s profiles per default.</p>
        @php 
          $user_timezone = Auth::user()->timezone;
          $user = DB::table('users')->where('id', Auth::user()->id )->first();
        @endphp
              @php  $plan_array =  explode(",",$user->available_slots_tempory);  @endphp
          <div class="row">
              @if(count($plan_array) > 0)
              
                  <div class="col-6">
                      <h5 class="text-gray mb-4 text-center">The time you chose (according to Europe/Brussels): </h5>

              @foreach($plan_array as $rr)
              
              @php
      
              if($rr == '1-2pm'){
                $slot = '13:00:00';
              }else if($rr == '2-3pm'){
                $slot = '14:00:00';
              }else if($rr == '3-4pm'){
                $slot = '15:00:00';
              }else if($rr == '4-5pm'){
                $slot = '16:00:00';
              }else if($rr == '5-6pm'){
                $slot = '17:00:00';
              }else if($rr == '6-7pm'){
                $slot = '18:00:00';
              }else if($rr == '7-8pm'){
                $slot = '19:00:00';
              }else if($rr == '8-9pm'){
                $slot = '20:00:00';
              }else if($rr == '9-10pm'){
                $slot = '21:00:00';
              }else if($rr == '10-11pm'){
                $slot = '22:00:00';
              }else if($rr == '11-12am'){
                $slot = '23:00:00';
              }else if($rr == '12-1am'){
                $slot = '00:00:00';
              }else if($rr == '1-2am'){
                $slot = '01:00:00';
              }else if($rr == '2-3am'){
                $slot = '02:00:00';
              }else if($rr == '3-4am'){
                $slot = '03:00:00';
              }else if($rr == '4-5am'){
                $slot = '04:00:00';
              }else if($rr == '5-6am'){
                $slot = '05:00:00';
              }else if($rr == '6-7am'){
                $slot = '06:00:00';
              }else if($rr == '7-8am'){
                $slot = '07:00:00';
              }else if($rr == '8-9am'){
                $slot = '08:00:00';
              }else if($rr == '9-10am'){
                $slot = '09:00:00';
              }else if($rr == '10-11am'){
                $slot = '10:00:00';
              }else if($rr == '11-12pm'){
                $slot = '11:00:00';
              }else if($rr == '12-1pm'){
                $slot = '12:00:00';
              }
              @endphp
              
                      <div class="date-time-wrap mb-2">
                          @php
                          $datetime = new DateTime($slot);
                          $la_time = new DateTimeZone($user_timezone);
                          $datetime->setTimezone($la_time);
                          $ttn_user =  $datetime->format('H:i:s');
                          @endphp
                          <p class="roboto mb-0">@php echo $slot;  @endphp </p>
                      </div>

              @endforeach
              
              <div class="text-center mt-4">
                  <a href="{{ route('coach-calender') }}" class="button-primary roboto discover-btn" style="border-radius:30px; font-weight: 400;">Choose Again</a>
              </div>
            </div>
            @endif
            

            @if(count($plan_array) > 0)
              
                  <div class="col-6">
                      <h5 class="text-gray mb-4 text-center">The time according to your local time zone (@php echo $user_timezone; @endphp):</h5>

              @foreach($plan_array as $rr)
              
              @php
      
              if($rr == '1-2pm'){
                $slot = '13:00:00';
              }else if($rr == '2-3pm'){
                $slot = '14:00:00';
              }else if($rr == '3-4pm'){
                $slot = '15:00:00';
              }else if($rr == '4-5pm'){
                $slot = '16:00:00';
              }else if($rr == '5-6pm'){
                $slot = '17:00:00';
              }else if($rr == '6-7pm'){
                $slot = '18:00:00';
              }else if($rr == '7-8pm'){
                $slot = '19:00:00';
              }else if($rr == '8-9pm'){
                $slot = '20:00:00';
              }else if($rr == '9-10pm'){
                $slot = '21:00:00';
              }else if($rr == '10-11pm'){
                $slot = '22:00:00';
              }else if($rr == '11-12am'){
                $slot = '23:00:00';
              }else if($rr == '12-1am'){
                $slot = '00:00:00';
              }else if($rr == '1-2am'){
                $slot = '01:00:00';
              }else if($rr == '2-3am'){
                $slot = '02:00:00';
              }else if($rr == '3-4am'){
                $slot = '03:00:00';
              }else if($rr == '4-5am'){
                $slot = '04:00:00';
              }else if($rr == '5-6am'){
                $slot = '05:00:00';
              }else if($rr == '6-7am'){
                $slot = '06:00:00';
              }else if($rr == '7-8am'){
                $slot = '07:00:00';
              }else if($rr == '8-9am'){
                $slot = '08:00:00';
              }else if($rr == '9-10am'){
                $slot = '09:00:00';
              }else if($rr == '10-11am'){
                $slot = '10:00:00';
              }else if($rr == '11-12pm'){
                $slot = '11:00:00';
              }else if($rr == '12-1pm'){
                $slot = '12:00:00';
              }
              @endphp
              
                      <div class="date-time-wrap mb-2">
                          @php
                          $datetime = new DateTime($slot);
                          $la_time = new DateTimeZone($user_timezone);
                          $datetime->setTimezone($la_time);
                          $ttn_user =  $datetime->format('H:i:s');
                          @endphp
                          <p class="roboto mb-0">@php echo $ttn_user;  @endphp </p>
                      </div>

              @endforeach
             
              <div class="text-center mt-4">
                  <a href="{{ route('coach-calender-confirm') }}" class="button-primary roboto discover-btn button-blue" style="border-radius:30px; font-weight: 400;">Confirm Time</a>
              </div>
            </div>
            @endif
          
        </div>


      </div>
    </div>
  </div>
 </div>    
     
              
   @endif
 
   @if($message = Session::get('success_done'))
   <div class="alert alert-dismissible fade show col-lg-8 mx-auto success-message-wrap" role="alert">
      <div class="d-flex align-items-center">
         <p class="success-tag d-none d-sm-flex"><i class="ti-check-box menu-icon mr-2"></i>Success</p>
         <div class="d-flex flex-column">
            <h4 class="message-heading text-success mb-1">Updated!</h4>
            <span>{{ $message }} </span>
         </div> 
      </div>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      </button>
   </div>
   @endif
   @if($message = Session::get('error_done'))
   <div class="alert alert-dismissible fade show col-lg-8 mx-auto error-message-wrap" role="alert">
      <div class="d-flex align-items-center">
         <p class="danger-tag d-none d-sm-flex"><i class="ti-close menu-icon mr-2"></i>Error</p>
         <div class="d-flex flex-column">
            <h4 class="message-heading text-danger mb-1">Something Wrong</h4>
            <span>{{ $message }} </span>
         </div> 
      </div>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      </button>
   </div>
   @endif 

   <div class="row">
      <div class="col-md-12 mb-sm-3 mb-sm-5">
         <div class="col-12 mb-4 mb-xl-0 px-0">
            <h3 class="font-weight-bold text-white pp">Add Availability</h3>
            <p class="font-weight-normal mb-0 text-white">Please choose the hours you’re interested in receiving meeting requests within in general.<br>
            When you receive an actual meeting request, you will always have the option to accept, decline or suggest a different time for the meeting.</p>
         </div>
      </div>
   </div>

   <form action="{{route('coach-update-calender-tempory' )}}" id="editform2" method="post">
      {{ csrf_field() }}
      <div class="row">
         <div class="col-md-12 grid-margin stretch-card px-0">
            <div class="card coach-calendar" style="border-radius: 30px;">
               <div class="card-body p-padding py-3 py-sm-5">
                  <!-- <h3 class="text-white pl-sm-4 mb-3 mb-sm-4">Time Zone</h4> -->
                  <!-- <div class="session-detail-wrap pl-sm-4 mb-3 mb-sm-4">
                     <p class="text-capitalize" style="background-color: #7D8287 ">Please choose your local time zone</p>
                  </div> -->
                  <div class="form-group col-lg-12">
                     @php  
                     $ex_array = $user->available_slots; 
                     $arr_ex = explode(",",$ex_array); 
                     @endphp
                     @if($ex_array)
                        @if(in_array("6-7am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="6-7am" checked ><span>6-7 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="6-7am" ><span>6-7 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                        <label>
                        <input type="checkbox"  name="availability[]" value="6-7am" ><span>6-7 Am</span>
                        </label>
                     </div>
                     @endif
                     @if($ex_array)
                        @if(in_array("7-8am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="7-8am" checked ><span>7-8 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="7-8am" ><span>7-8 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox" class="w4" name="availability[]" value="7-8am" ><span>7-8 Am</span>
                           </label>
                     </div>
                     @endif
                     @if($ex_array)
                        @if(in_array("8-9am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="8-9am" checked ><span>8-9 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="8-9am" ><span>8-9 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="8-9am" ><span>8-9 Am</span>
                           </label>
                     </div>
                     @endif
                     @if($ex_array)
                        @if(in_array("9-10am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="9-10am" checked ><span>9-10 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="9-10am" ><span>9-10 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                        <label>
                        <input type="checkbox"  name="availability[]" value="9-10am" ><span>9-10 Am</span>
                        </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("11-12am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="10-11am" checked ><span>10-11  Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="10-11am" ><span>10-11 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="10-11am" ><span>10-11 Am</span>
                           </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("11-12am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="11-12am" checked ><span>11-12  Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="11-12am" ><span>11-12 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="11-12am" ><span>11-12 Am</span>
                           </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("12-1pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="12-1pm" checked ><span>12-1 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="12-1pm" ><span>12-1 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="12-1pm" ><span>12-1 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("1-2pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="1-2pm" checked ><span>1-2 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="1-2pm" ><span>1-2 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="1-2pm" ><span>1-2 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("2-3pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="2-3pm" checked ><span>2-3 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="2-3pm" ><span>2-3 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="2-3pm" ><span>2-3 Pm</span>
                           </label>
                     </div>
                     @endif



                     @if($ex_array)
                        @if(in_array("3-4pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="3-4pm" checked ><span>3-4 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="3-4pm" ><span>3-4 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="3-4pm" ><span>3-4 Pm</span>
                           </label>
                     </div>
                     @endif


                    @if($ex_array)
                        @if(in_array("4-5pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="4-5pm" checked ><span>4-5 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="4-5pm" ><span>4-5 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="4-5pm" ><span>4-5 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("5-6pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="5-6pm" checked ><span>5-6 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="5-6pm" ><span>5-6 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="5-6pm" ><span>5-6 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("7-8pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="6-7pm" checked ><span>6-7 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="6-7pm" ><span>6-7 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="6-7pm" ><span>6-7 Pm</span>
                           </label>
                     </div>
                     @endif
                     
                     @if($ex_array)
                        @if(in_array("7-8pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="7-8pm" checked ><span>7-8 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="7-8pm" ><span>7-8 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="7-8pm" ><span>7-8 Pm</span>
                           </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("8-9pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="8-9pm" checked ><span>8-9 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="8-9pm" ><span>8-9 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="8-9pm" ><span>8-9 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("9-10pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="9-10pm" checked ><span>9-10 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="9-10pm" ><span>9-10 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="9-10pm" ><span>9-10 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("10-11pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="10-11pm" checked ><span>10-11 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="10-11pm" ><span>10-11 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="10-11pm" ><span>10-11 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("11-12pm", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="11-12pm" checked ><span>11-12 Pm</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="11-12pm" ><span>11-12 Pm</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="11-12pm" ><span>11-12 Pm</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("12-1am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="12-1am" checked ><span>12-1 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="12-1am" ><span>12-1 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="12-1am" ><span>12-1 Am</span>
                           </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("1-2am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="1-2am" checked ><span>1-2 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="1-2am" ><span>1-2 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="1-2am" ><span>1-2 Am</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("2-3am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="2-3am" checked ><span>2-3 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="2-3am" ><span>2-3 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="2-3am" ><span>2-3 Am</span>
                           </label>
                     </div>
                     @endif


                     @if($ex_array)
                        @if(in_array("3-4am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="3-4am" checked ><span>3-4 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="3-4am" ><span>3-4 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="3-4am" ><span>3-4 Am</span>
                           </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("4-5am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="4-5am" checked ><span>4-5 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="4-5am" ><span>4-5 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl">
                           <label>
                           <input type="checkbox"  name="availability[]" value="4-5am" ><span>4-5 Am</span>
                           </label>
                     </div>
                     @endif

                     @if($ex_array)
                        @if(in_array("5-6am", $arr_ex))
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="5-6am" checked ><span>5-6 Am</span>
                            </label>
                         </div>
                        @else
                          <div class="time-select check-cl">
                            <label>
                            <input type="checkbox"  name="availability[]" value="5-6am" ><span>5-6 Am</span>
                            </label>
                         </div>
                        @endif
                     @else
                     <div class="time-select check-cl @error('availability') is-invalid @enderror">
                           <label>
                           <input type="checkbox"  name="availability[]" value="5-6am" ><span>5-6 Am</span>
                           </label>
                     </div>
                     @endif


                     @error('availability')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="form-group col-lg-12 mt-2 text-center">

         <button  type="submit"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Save Changes</button>

      </div>

   </form>
</div>
<!-- content-wrapper ends -->
@endsection
@section('scripts')  
   
@endsection


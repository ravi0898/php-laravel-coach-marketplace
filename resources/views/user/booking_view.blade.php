@extends('user.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">

@if (Session::has('success'))

    <div class="alert alert-success text-center">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

        <p>{{ Session::get('success') }}</p>

    </div>

@endif
                    
@php $ss = explode("/",$booking->price); @endphp
<div class="mb-4">
    <!--<h4 class="font-weight-bold session-heading">Session: ${{ $ss[0] }}/{{ $ss[1] }} min</h4>--> 
    <h4 class="font-weight-bold session-heading">Session Details</h4>
    <div class="session-detail-wrap">
        <p>Price of session: <span> ${{ $ss[0] }}</span></p>
        <p>Length of session: <span>{{ $ss[1] }} min</span></p> 
	  <p>Order Id: <span> {{ $booking->order_id }}</span></p> 
    </div>
</div>
@if(isset($booking->status))
<!----------------------------------------------------------------------------------->
    @if($booking->status == 'Request')
    <!-- <div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0"> 
    		<div class="card">
    			<div class="card-body">
    				<div class="row text-center text-sm-left">
    					<div class="form-group col-lg-12 mb-4">
    						<h3 class="font-weight-bold text-white mb-4">Wait for advisor availability Confirmation</h3>
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>
    					    <img src="{{ URL::asset('assets/media/waiting.png') }}" class="pay-gif mt-3 meeting-wait">
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h4 class="text-main">Thanks for using Zentia, Advisor will confirm his availbility soon.</h4>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div> -->
	<div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0"> 
    		<div class="card">
    			<div class="card-body bg-black">
    				<div class="row text-center text-sm-left">
						<div class="form-group col-12 col-md-7 px-0 px-sm-2">
							<div class="user-view-cards">
								<h4 class="text-main mb-4">Awaiting confirmation from the advisor</h4>
								<div class="user-view-content">
									<div>
										<img src="{{ URL::asset('assets/media/message-icon.png') }}" alt="" class="user-view-icon">
									</div>
									<p class="text-white mb-0 text-left">Your request has been sent to the advisor and we're now awaiting their response. Please sit tight, we'll be right back. <br><br> Talk soon!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endif
 <!----------------------------------------------------------------------------------->   
    @if($booking->status == 'Pending')
    <div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-3 mb-sm-5">
    						<div class="d-block d-sm-flex justify-content-between align-items-center mb-4">
    						    <h3 class="font-weight-bold text-white mb-3 mb-sm-0">Pay to confirm the meeting</h3>
    						</div>
    					    <p class="text-white">Please complete the payment below within 12 hours, to confirm the meeting with the Advisor</p>	
    					</div> 
    					<div class="form-group col-lg-12 mb-1">
							<div class="d-block d-sm-flex align-items-center mb-4">
								<h5 class="text-white after-line position-relative booking-status mb-5 mb-sm-3">Availability Details</h5>
								<div>
        						    @php $ide = Crypt::encrypt($booking->id); @endphp
        					        <a href="{{route('stripe-pay', $ide )}}" class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder booking-status-value btn-blue" id="save-chage" style="border-radius: 4px;">Pay to schedule meeting</a>
            				   	</div>
							</div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Date :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_date }}</h5>
    					    </div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Slot :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_time }}</h5>
    					    </div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Start Time -(Europe/Brussels):</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_start_time }}</h5>
    					    </div>
    					    @php
    					    $user_timezone = Auth::user()->timezone;
                  $datetime = new DateTime($booking->meeting_start_time);
                  $la_time = new DateTimeZone($user_timezone);
                  $datetime->setTimezone($la_time);
                  $ttn_user =  $datetime->format('Y-m-d H:i:s');
                  @endphp
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Start Time Timezone-(@php echo $user_timezone; @endphp)</h5>
    					        <h5 class="text-white booking-status-value">{{ $ttn_user }}</h5>
    					    </div>

    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Session :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_session }} min</h5>
    					    </div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Price :</h5>
    					        <h5 class="text-white booking-status-value">${{ $booking->meeting_price }}</h5>
    					    </div>
    					    
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    @endif
 <!----------------------------------------------------------------------------------->   
    @if($booking->status == 'Reject')
    <!-- <div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row text-center text-sm-left"> 
    					<div class="form-group col-lg-12 mb-4">
    						<h3 class="font-weight-bold text-white mb-4">Your meeting has been rejected for some reason</h3> 
    						<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					    <img src="{{ URL::asset('assets/media/rejected-sign.png') }}" class="pay-gif mt-4">
				    	</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h4 class="text-main">The reason for the meeting rejection is explained below</h4>
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<p class="text-white">{{ $booking->rejection }}</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div> -->
	<div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0"> 
    		<div class="card">
    			<div class="card-body bg-black">
    				<div class="row text-center text-sm-left">
						<div class="form-group col-12 col-md-7 px-0 px-sm-2">
							<div class="user-view-cards">
								<h4 class="text-main mb-4">Your meeting request was declined by the advisor</h4>
								<div class="user-view-content mb-4">
									<div>
										<img src="{{ URL::asset('assets/media/meeting-reject.png') }}" alt="" class="user-view-icon">
									</div>
									<p class="text-white mb-0 text-left">Unfortunately your meeting request was declined by the advisor. Please see the reason below.</p>
								</div>
								<div class="meeting-decline-wrap text-left">
									<p class="text-white text-left">{{ $booking->rejection }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endif
 <!----------------------------------------------------------------------------------->   
      @if($booking->status == 'Scheduled')
      @php
        $m_start_time =$booking->meeting_start_time; 
        $starttime = explode(" ",$m_start_time); 
        $ms_date1 = $starttime[0];    
        $ms_date = date("Ymd", strtotime($ms_date1));
        $ms_time1 = $starttime[1];
        $ms_time = date("His", strtotime($ms_time1));   
        $gm_start_date =  $ms_date.'T'.$ms_time;

        $m_session = $booking->meeting_session;

        $m_end_time = date('Y-m-d H:i:s', strtotime($m_start_time. ' +'.$m_session.' minutes'));
        $endtime = explode(" ",$m_end_time);
        $me_date1 = $endtime[0]; 
        $me_date = date("Ymd", strtotime($me_date1));   
        $me_time1 = $endtime[1]; 
        $me_time = date("His", strtotime($me_time1));    
        $gm_end_date =  $me_date.'T'.$me_time;
      @endphp
    <div class="row countdownppp"  data-timer="<?=$booking->meeting_start_time?>" data-curr_time="<?=date('Y-m-d H:i:s');?>" data-id="demo<?=$booking->id;?>" data-link="<?=$booking->meeting_link?>" data-gm_start_date="<?=$gm_start_date?>" data-gm_end_date="<?=$gm_end_date?>" data-linkid="<?=$booking->order_id?>">
    	<div class="col-md-12 mb-3 stretch-card px-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-3 mb-sm-5"> 
    						<div class="d-block d-sm-flex justify-content-between align-items-center mb-4">
    						    <h3 class="font-weight-bold text-white mb-0 text-capitalize">Meeting With {{ $booking->coach_details->name }}</h3>
    						</div>
    					    <p class="text-white">Here's the details for your booking. Please add the calendar invite to your Google Calendar, to ensure you remember your meeting.</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-3">
							<div class="d-block d-sm-flex align-items-center mb-4">
    						    <h5 class="text-white after-line booking-status position-relative mb-4 mb-sm-0">Meeting Details</h5>
								
								@php
    					
						$current_date = date('Y-m-d H:i:s');
						$meeting_start_time = $booking->meeting_start_time;
						$session_time = $booking->meeting_session;
						$meeting_date = $booking->meeting_date; 
						
						$ddate = $meeting_start_time;
						$meeting_end_time = date('Y-m-d H:i:s', strtotime($ddate. ' +'.$session_time.' minutes'));
						
						
							if($current_date <= $meeting_end_time){
								@endphp
								
								<div id="demo<?=$booking->id;?>"  value='<?php echo $booking->meeting_start_time;?>'></div>
								@php
							   
							}else{
							@endphp
							<div>
								<a href="#" data-toggle="modal" data-target="#meet_expire"   class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder btn-blue" id="save-chage" style="border-radius: 5px;">Meeting Expire</a>
							</div>
							
							@php
								
							}
					   
						@endphp
	 
			
						    </div>
    					</div>
    					<div class="form-group col-lg-12 mb-1">
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Date :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_date }}</h5>
    					    </div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Slot :</h5>
    					        <h5 class="text-white booking-status-value"> {{ $booking->meeting_time }}</h5>
    					    </div>
    					     <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Start Time -(Europe/Brussels):</h5>
    					        <h5 class="text-white booking-status-value"> {{ $booking->meeting_start_time }}</h5>
    					    </div>
    					    @php
    					    $user_timezone = Auth::user()->timezone;
                  $datetime = new DateTime($booking->meeting_start_time);
                  $la_time = new DateTimeZone($user_timezone);
                  $datetime->setTimezone($la_time);
                  $ttn_user =  $datetime->format('Y-m-d H:i:s');
                  @endphp
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Start Time Timezone-(@php echo $user_timezone; @endphp)</h5>
    					        <h5 class="text-white booking-status-value"> {{ $ttn_user }}</h5>
    					    </div>
    					    
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Session :</h5>
    					        <h5 class="text-white booking-status-value"> {{ $booking->meeting_session }} min</h5>
    					    </div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Price :</h5>
    					        <h5 class="text-white booking-status-value"> ${{ $booking->meeting_price }}</h5>
    					    </div>
    					    <div class="d-block d-sm-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status mb-3 mb-sm-0">Meeting Link :</h5>
    					        <h5 class="text-white booking-status-value"><a href="#" class="text-white">{{ $booking->meeting_link }}</a></h5>
    					    </div>
    					</div>
    					<!-- <div class="form-group col-lg-12 my-3">
    					    <div class="meeting-note">
    					        <p class="font-weight-bold text-white">You can extend meeting in between by paying for required session of time. </p>
    					     
    						    <p class="font-weight-bold text-white mb-0">Please join on sheduled time otherwise it will expire and zentia is not responsible for this.</p>
    					     
    					    </div> 
    					</div> -->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    @endif
  <!----------------------------------------------------------------------------------->  
     <!----------------------------------------------------------------------------------->   
    @if($booking->status == 'Done')
    <!-- <div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row text-center text-sm-left">
    					<div class="form-group col-lg-12 mb-4">
    						<h3 class="font-weight-bold text-white mb-4">Congratulations! Your meeting is done with {{ $booking->coach_details->name }}</h3> 
    						<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					    <img src="{{ URL::asset('assets/media/meeting-removebg-preview.png') }}" class="pay-gif mt-4"> 
				    	</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h4 class="text-main">Thank you choosing zentia and connection with us through the meeting.</h4>
    					</div>
    					
    				</div>
    			</div>
    		</div>
    	</div>
    </div> -->
	<div class="row">
    	<div class="col-md-12 mb-3 stretch-card px-0"> 
    		<div class="card">
    			<div class="card-body bg-black">
    				<div class="row text-center text-sm-left">
						<div class="form-group col-12 col-md-7 px-0 px-sm-2">
							<div class="user-view-cards">
								<h4 class="text-main mb-4">Your meeting is now done</h4>
								<div class="user-view-content">
									<div>
										<img src="{{ URL::asset('assets/media/meeting-done.png') }}" alt="" class="user-view-icon">
									</div>
									<p class="text-white mb-0 text-left">We hope you had a great meeting and look forward to hosting more meetings for in the future. <br><br> Talk soon!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endif
   <!----------------------------------------------------------------------------------->
 @endif
</div>
<!-- content-wrapper ends -->





<!-- Modal -->
<div class="modal fade" id="meet_havetime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Meeting Have Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Meeting Have Time to start. Please wait 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="meet_expire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mt-0" role="document">
    <div class="modal-content">
      <div class="p-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0 text-center"> 
          <img src="{{ URL::asset('assets/media/meeting.webp') }}" class="modal-img">
          <h4 class="text-main mt-2">Congratulations! Your meeting is done with Zentia</h4>
          <p class="mt-4 px-2 px-sm-5">Thank you choosing zentia and connection with us through the meeting.</p>
        <button type="button" class="btn btn-primary btn-sm btn-rounded custom-padding mt-3" data-dismiss="modal">Go Back</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')  
       <!--=======Js========-->



        <!-----Tiny Editer----->

        <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>

          <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>

          <script src="{{ URL::asset('theme/js/intlTelInput.js') }}"></script>

          <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>

        <!-----Tiny Editer----->





<script type="text/javascript">



/*Editer*/

tinymce.init({

  selector: 'textarea#about-me',

  height: 250,

  menubar: false,

  plugins: [

    'advlist autolink lists link image charmap print preview anchor',

    'searchreplace visualblocks code fullscreen',

    'insertdatetime media table paste code help wordcount'

  ],

  toolbar: 'undo redo | formatselect | ' +

  'bold italic backcolor | alignleft aligncenter ' +

  'alignright alignjustify | bullist numlist outdent indent | ' +

  'removeformat | help',

  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

});



  /*Editer*/





 (function($) {

  'use strict';



  if ($(".js-example-basic-single").length) {

    $(".js-example-basic-single").select2();

  }

  if ($(".expertise").length) {

   /* $(".expertise").select2();*/

   $(".expertise").select2({ maximumSelectionLength: 3, });

    

  }



  if ($(".seniority").length) {

    /* $(".seniority").select2();*/

        $(".seniority").select2({ maximumSelectionLength: 3, });

  }



  if ($(".industry").length) {

    /* $(".industry").select2();*/

     $(".industry").select2({ maximumSelectionLength: 3, });



  }





   if ($(".business-model").length) {

      /*$(".business-model").select2();*/

      $(".business-model").select2({  maximumSelectionLength: 3, });

  }



   if ($(".availability").length) {

      $(".availability").select2();

     /* $(".availability").select2({  maximumSelectionLength: 3, });*/

  }



  



})

(jQuery);









$('.file-input').change(function(){

var curElement = $('.image');

console.log(curElement);

var reader = new FileReader();

reader.onload = function (e) {

// get loaded data and render thumbnail.

curElement.attr('src', e.target.result);

};

// read the image file as a data URL.

reader.readAsDataURL(this.files[0]);

});



        </script>



        <script>



          /*image upload*/



document.getElementById("output1i").style.display = "none";

document.getElementById("att1s1i").style.display = "none";



var loadFile1i = function(event) {

document.getElementById("att11i").style.display = "none";

document.getElementById("att1s1i").style.display = "block";

document.getElementById("output1i").style.display = "block";

var output1i = document.getElementById('output1i');

output1i.src = URL.createObjectURL(event.target.files[0]);

document.getElementById("hideset1i").style.display = "none";

};

function hideatt1i() {

document.getElementById("output1i").style.display = "none";

document.getElementById("att11i").style.display = "block";

document.getElementById("att1s1i").style.display = "none";

document.getElementById("img1").value = null;





}

/*image upload*/



/*intlTelInput*/



$("#mobile_code").intlTelInput({

  initialCountry: "in",

  separateDialCode: true,

 

});



/*intlTelInput*/

  

  /*Sweet alert*/



document.getElementById('save-chage_').onclick = function(){

  swal("Good !", "Yours chages is Done !", "success");

};

   

  /*Sweet alert*/

</script>
@endsection

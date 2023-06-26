@extends('admin.layouts.header')
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
    <h4 class="font-weight-bold session-heading">Your session details are given below</h4>
    <div class="session-detail-wrap">
        <p>Amount of session: <span> ${{ $ss[0] }}</span></p>
        <p>Timing of session: <span>{{ $ss[1] }} min</span></p>  
    </div>
</div>
@if(isset($booking->status))
<!----------------------------------------------------------------------------------->
    @if($booking->status == 'Request')
    <div class="row">
    	<div class="col-md-12 mb-3 stretch-card pl-0"> 
    		<div class="card">
    			<div class="card-body">
    				<div class="row text-center">
    					<div class="form-group col-lg-12 mb-5">
    						<h3 class="font-weight-bold text-white mb-4">Wait for advisor availability Confirmation</h3>
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>
    					    <img src="{{ URL::asset('assets/media/pay-wait.jpg') }}" class="pay-gif mt-4">
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h4 class="text-main">Thanks for using Zentia, Advisor will confirm his availbility soon.</h4>
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
    	<div class="col-md-12 mb-3 stretch-card pl-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-5">
    						<div class="d-flex justify-content-between align-items-center mb-4">
    						    <h3 class="font-weight-bold text-white mb-0">Confirm with payment to schedule meeting</h3>
        						<div>
        						    @php $ide = Crypt::encrypt($booking->id); @endphp
        					        <a href="{{route('stripe-pay', $ide )}}" class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Pay to schedule meeting</a>
            				   	</div>
    						</div>
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h5 class="text-white after-line position-relative">Availability Details</h5>
    					</div>  
    					<div class="form-group col-lg-12 mb-1">
    					
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Date :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_date }}</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Slot :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_time }}</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Start Time :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_start_time }}</h5>
    					    </div>
    					       <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Session :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_session }} min</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Price :</h5>
    					        <h5 class="text-white booking-status-value">${{ $booking->meeting_price }}</h5>
    					    </div>
    					    
    						<!--<h5 class="text-white">Meeting Date: {{ $booking->meeting_date }}</h5>-->
    						<!--<h5 class="text-white">Meeting Slot: {{ $booking->meeting_time }}</h5>-->
    						<!--<h5 class="text-white">Meeting Start Time: {{ $booking->meeting_start_time }}</h5>-->
    						<!--<h5 class="text-white">Meeting Session: {{ $booking->meeting_session }} min</h5>-->
    						<!--<h5 class="text-white">Meeting Price: ${{ $booking->meeting_price }}</h5>-->
    					</div>
    					<!--$ide = Crypt::encrypt($id);  $user_id = Crypt::decrypt($id);-->
    						<div class="col-lg-12">
    					         </div>
    				    <!--<form action="{{route('user-booking-scheduled' )}}"  method="post">-->
         <!--                 {{ csrf_field() }}-->
                          
         <!--               <input type="hidden" value="{{ $booking->id }}" name="booking_id" >-->
         <!--               <input type="hidden" value="{{ $booking->order_id }}" name="order_id" >-->
         <!--               <input type="hidden" name="status" value="Scheduled">-->
    					<!--<div class="form-group col-lg-12 mt-2 text-center">-->
         <!--                   <button  type="submit"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Pay to schedule meeting</button>-->
         <!--               </div>-->
         <!--               </form>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    @endif
 <!----------------------------------------------------------------------------------->   
    @if($booking->status == 'Reject')
    <div class="row">
    	<div class="col-md-12 mb-3 stretch-card pl-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row text-center"> 
    					<div class="form-group col-lg-12 mb-5">
    						<h3 class="font-weight-bold text-white mb-4">Your meeting has been rejected for some reason</h3> 
    						<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					    <img src="{{ URL::asset('assets/media/rejection.jpg') }}" class="pay-gif mt-4">
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
    </div>
    @endif
 <!----------------------------------------------------------------------------------->   
      @if($booking->status == 'Scheduled')
    <div class="row countdownpp"  data-timer="<?=$booking->meeting_start_time?>" data-curr_time="<?=date('Y-m-d H:i:s');?>" data-id="demo<?=$booking->id;?>" data-link="<?=$booking->meeting_link?>">
    	<div class="col-md-12 mb-3 stretch-card pl-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-5">
    						<div class="d-flex justify-content-between align-items-center mb-4">
    						    <h3 class="font-weight-bold text-white mb-0">Meeting With {{ $booking->coach_details->name }}</h3>
    						    
    						    	@php
    					
                					echo $current_date = date('Y-m-d H:i:s');
                                    $meeting_start_time = $booking->meeting_start_time;
                                    $session_time = $booking->meeting_session;
                                    $meeting_date = $booking->meeting_date; 
                                    
                                    $ddate = $meeting_start_time;
                                    $meeting_end_time = date('Y-m-d H:i:s', strtotime($ddate. ' +'.$session_time.' minutes'));
                                    
                                    
                                        if($current_date <= $meeting_end_time){
                                            @endphp
                                            
                                            <div id="demo<?=$booking->id;?>"  value='<?php echo $booking->meeting_start_time;?>' style="width: 100% !important; color: white;" ></div>
                                            @php
                                           
                                        }else{
                                        @endphp
                                        <div>
                					        <a href="#" data-toggle="modal" data-target="#meet_expire"   class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Meeting Expire</a>
                                	    </div>
                                        
                                        @php
                                            
                                        }
                                   
                                    @endphp
                 
    					
                        
    						</div>
    						
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h5 class="text-white after-line position-relative">Meeting Details</h5>
    					</div>
    					<div class="form-group col-lg-12 mb-1">
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Date :</h5>
    					        <h5 class="text-white booking-status-value">{{ $booking->meeting_date }}</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Slot :</h5>
    					        <h5 class="text-white booking-status-value"> {{ $booking->meeting_time }}</h5>
    					    </div>
    					     <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Start Time :</h5>
    					        <h5 class="text-white booking-status-value"> {{ $booking->meeting_start_time }}</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Session :</h5>
    					        <h5 class="text-white booking-status-value"> {{ $booking->meeting_session }} min</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Price :</h5>
    					        <h5 class="text-white booking-status-value"> ${{ $booking->meeting_price }}</h5>
    					    </div>
    					    <div class="d-flex align-items-center mb-4">
    					        <h5 class="text-white booking-status">Meeting Link :</h5>
    					        <h5 class="text-white booking-status-value"><a href="#" class="text-white">{{ $booking->meeting_link }}</a></h5>
    					    </div>
    						<!--<h5 class="text-white">Meeting Date: {{ $booking->meeting_date }}</h5>-->
    						<!--<h5 class="text-white">Meeting Slot: {{ $booking->meeting_time }}</h5>-->
    						<!--<h5 class="text-white">Meeting Start Time: {{ $booking->meeting_start_time }}</h5>-->
    						<!--<h5 class="text-white">Meeting Session: {{ $booking->meeting_session }} min</h5>-->
    						<!--<h5 class="text-white">Meeting Price: ${{ $booking->meeting_price }}</h5>-->
    						<!--<h5 class="text-white">Meeting Link: {{ $booking->meeting_link }}</h5>-->
    					</div>
    					<!--<div class="form-group col-lg-12 mt-2 text-center">-->
         <!--                   <a href="{{ $booking->meeting_link }}"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Click here to join</a>-->
         <!--               </div>-->
    					<div class="form-group col-lg-12 my-3">
    					    <div class="meeting-note">
    					        <p class="font-weight-bold text-white">You can extend meeting in between by paying for required session of time. </p>
    					     
    						    <p class="font-weight-bold text-white mb-0">Please join on sheduled time otherwise it will expire and zentia is not responsible for this.</p>
    					     
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Meeting Expire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Meeting Expire
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
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

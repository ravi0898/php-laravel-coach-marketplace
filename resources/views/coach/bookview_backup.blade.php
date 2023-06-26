@extends('coach.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
@php $ss = explode("/",$booking->price); @endphp
<div class="mb-4">
    <!--<h4 class="font-weight-bold text-white">Session: ${{ $ss[0] }}/{{ $ss[1] }} min</h4>-->
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
    	<div class="col-md-6 mb-3 stretch-card pl-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-2">
    						<h3 class="font-weight-bold text-white">Confirm Availability</h3>
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-2">
    						<h5 class="text-white">Confirm Availability</h5>
    					</div>
    					<table id="order-table" class="table" style="width:100%">
    
                            <thead>
                    
                                <tr class="text-white">
                    
                                    <th>Sr.No.</th>
                    
                                    <th>Date</th>
                    
                                    <th>Slot</th>
                    
                                    <th>Action</th>
                    
                                </tr>
                    
                            </thead>
                    
                            <tbody>
                                @php  $plan_array =  explode(",",$booking->plan);  @endphp
                                @if(count($plan_array) > 0)
                                @php $i = 1; @endphp
                                @foreach($plan_array as $plan_arr)
                                    @php $rr = explode("/",$plan_arr); @endphp
                                <tr>
                    
                                    <td>{{ $i }}</td>
                    
                                    <td>{{ $rr[1] }}</td>
                    
                                    <td>{{ $rr[0] }}</td>
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
                                      $meeting_start_time = $rr[1].' 1:00:00';
                                    }else if($rr[0] == '2-3am'){
                                      $meeting_start_time = $rr[1].' 2:00:00';
                                    }else if($rr[0] == '3-4am'){
                                      $meeting_start_time = $rr[1].' 3:00:00';
                                    }else if($rr[0] == '4-5am'){
                                      $meeting_start_time = $rr[1].' 4:00:00';
                                    }else if($rr[0] == '5-6am'){
                                      $meeting_start_time = $rr[1].' 5:00:00';
                                    }else if($rr[0] == '6-7am'){
                                      $meeting_start_time = $rr[1].' 6:00:00';
                                    }else if($rr[0] == '7-8am'){
                                      $meeting_start_time = $rr[1].' 7:00:00';
                                    }else if($rr[0] == '8-9am'){
                                      $meeting_start_time = $rr[1].' 8:00:00';
                                    }else if($rr[0] == '9-10am'){
                                      $meeting_start_time = $rr[1].' 9:00:00';
                                    }else if($rr[0] == '10-11am'){
                                      $meeting_start_time = $rr[1].' 10:00:00';
                                    }else if($rr[0] == '11-12pm'){
                                      $meeting_start_time = $rr[1].' 11:00:00';
                                    }else if($rr[0] == '12-1pm'){
                                      $meeting_start_time = $rr[1].' 12:00:00';
                                    }
                                    @endphp
                                    <!--@php $ide = Crypt::encrypt($booking->id); @endphp-->
                                    <td>
                                        <form action="{{route('coach-confirmed-availability' )}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                            <input type="hidden" name="status" value="Pending">
                                            <input type="hidden" name="meeting_date" value="{{ $rr[1] }}">
                                            <input type="hidden" name="meeting_time" value="{{ $rr[0] }}">
                                            <input type="hidden" name="meeting_start_time" value="{{ $meeting_start_time }}">
                                            <input type="hidden" name="meeting_session" value="{{ $ss[1] }}">
                                            <input type="hidden" name="meeting_price" value="{{ $ss[0] }}">
                                            <button type="submit" class="btn btn-primary btn-icon-text px-3 py-2">
                                            <i class="mdi mdi-eye btn-icon-prepend"></i> Available </button>
                                        </form>
                                    </td>
                    
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                                @endif
                    
                            </tbody>
                    
                           
                    
                        </table>
    				</div>
    			</div>
    		</div>
    	</div>
    	
    	<div class="col-md-6 mb-3 stretch-card pl-0">
    		<div class="card">
    			<div class="card-body">
    			   @if($message = Session::get('success_done'))
                   <div class="alert alert-success alert-dismissible fade show col-lg-12 mx-auto" role="alert">
                      <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   @endif
                   @if($message = Session::get('error_done'))
                   <div class="alert alert-danger alert-dismissible fade show col-lg-12 mx-auto" role="alert">
                      <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   @endif 
                   <form action="{{route('coach-booking-rejection' )}}"  method="post">
                      {{ csrf_field() }}
                      
                    <input type="hidden" value="{{ $booking->id }}" name="booking_id" >
                    <input type="hidden" name="status" value="Reject">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-2">
    						<h3 class="font-weight-bold text-white">Rejection</h3> 
    						<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-2">
    						<h5 class="text-white">Reason of Rejection with Availability Details</h5>
    					</div>
    					<div class="form-group col-lg-12">
    						<textarea class="form-control" name="rejection" id="rejection" placeholder="" rows="6">@if(!empty($booking->rejection)){{old('rejection', $booking->rejection)}}@else{{ old('rejection') }}@endif</textarea>
    						<div style="color:red">{{ $errors->first('rejection') }}</div>
    					</div>
    					<div class="form-group col-lg-12 mt-2 text-center">
                            <button  type="submit"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Submit</button>
                        </div>
    				</div>
    			   </form>
    				
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
    						<h3 class="font-weight-bold text-white">Wait for user Confirmation with payment</h3>
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h5 class="text-white">Thanks for confirm your availability</h5>
    					</div>
    					<div class="form-group col-lg-12 mb-1">
    						<h5 class="text-white">Meeting Date: {{ $booking->meeting_date }}</h5>
    						<h5 class="text-white">Meeting Slot: {{ $booking->meeting_time }}</h5>
    						<h5 class="text-white">Meeting Start Time: {{ $booking->meeting_start_time }}</h5>
    						<h5 class="text-white">Meeting Session: {{ $booking->meeting_session }} min</h5>
    						<h5 class="text-white">Meeting Price: ${{ $booking->meeting_price }}</h5>
    					</div>
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
    					<!--<div class="form-group col-lg-12 mb-5">-->
    					<!--	<h3 class="font-weight-bold text-white">Rejection</h3> -->
    					<!--	<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	-->
    					<!--</div>-->
    					<!--<div class="form-group col-lg-12 mb-3">-->
    					<!--	<h5 class="text-white">Reason of Rejection:</h5>-->
    					<!--</div>-->
    					<!--<div class="form-group col-lg-12 mb-3">-->
    					<!--	<p class="text-white">{{ $booking->rejection }}</p>-->
    					<!--</div>-->
    					
    					
    					<div class="form-group col-lg-12 mb-4">
    						<h3 class="font-weight-bold text-white mb-4">Your rejected this meeting for some reason</h3> 
    						<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					    <img src="{{ URL::asset('assets/media/meeting-reject-coach.png') }}" class="pay-gif mt-4">
				    	</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h4 class="text-main">The reason for the meeting rejection</h4>
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
    <div class="row">
    	<div class="col-md-12 mb-3 stretch-card pl-0">
    		<div class="card">
    			<div class="card-body">
    				<div class="row">
    					<div class="form-group col-lg-12 mb-5">
    						<h3 class="font-weight-bold text-white text-capitalize">Meeting With {{ $booking->user_details->name }}</h3>
    					    <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>	
    					</div>
    					<div class="form-group col-lg-12 mb-3">
    						<h5 class="text-white">Meeting Details</h5>
    					</div>
    					<div class="form-group col-lg-12 mb-1">
    					
    						<h5 class="text-white">Meeting Date: {{ $booking->meeting_date }}</h5>
    						<h5 class="text-white">Meeting Slot: {{ $booking->meeting_time }}</h5>
    						<h5 class="text-white">Meeting Start Time: {{ $booking->meeting_start_time }}</h5>
    						<h5 class="text-white">Meeting Session: {{ $booking->meeting_session }} min</h5>
    						<h5 class="text-white">Meeting Price: ${{ $booking->meeting_price }}</h5>
    						<h5 class="text-white">Meeting Link: {{ $booking->meeting_link }}</h5>
    					</div>
    					@php
    					
    					echo $current_date = date('Y-m-d H:i:s');
                        $meeting_start_time = $booking->meeting_start_time;
                        $session_time = $booking->meeting_session;
                        $meeting_date = $booking->meeting_date; 
                        
                        $ddate = $meeting_start_time;
                        $meeting_end_time = date('Y-m-d H:i:s', strtotime($ddate. ' +'.$session_time.' minutes'));
                        
                        if($current_date >= $meeting_start_time){
                            if($current_date <= $meeting_end_time){
                                @endphp
                                
                                <div class="form-group col-lg-12 mt-2 text-center">
                                    <a href="{{ $booking->meeting_link }}"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Click here to join</a>
                                </div>
                                @php
                               
                            }else{
                            @endphp
                        
                            <div class="form-group col-lg-12 mt-2 text-center">
                                <a href="#" data-toggle="modal" data-target="#meet_expire" class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Click here to join</a>
                            </div>
                                <!--return view('admin.meeting_expire');-->
                            @php
                                
                            }
                        }else{
                        @endphp
                        
                        <div class="form-group col-lg-12 mt-2 text-center">
                            <a href="#" data-toggle="modal" data-target="#meet_havetime" class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Click here to join</a>
                        </div>
                            <!--return view('admin.meeting_notstart');-->
                        @php
                        }
    					@endphp
    					
                        
    					<div class="form-group col-lg-12 mb-5">
    					    <p class="font-weight-bold text-white mt-5">You can extend meeting in between by paying for required session of time. </p>
    					     
    						<p class="font-weight-bold text-white">Please join on sheduled time otherwise it will expire and zentia is not responsible for this.</p>
    					     
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
<!-- content-wrapper ends -->
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

@extends('user.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   @if($message = Session::get('success_done'))
   <div class="alert alert-dismissible fade show col-lg-8 mx-auto success-message-wrap" role="alert">
      <div class="d-flex align-items-center">
         <p class="success-tag d-none d-sm-block"><i class="ti-check-box menu-icon mr-2"></i>Success</p>
         <div class="d-flex flex-column">
            <h4 class="message-heading text-success mb-1">Saved!</h4>
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
         <p class="danger-tag d-none d-sm-block"><i class="ti-close menu-icon mr-2"></i>Error</p>
         <div class="d-flex flex-column">
            <h4 class="message-heading text-danger mb-1">Not Updated!</h4>
            <span>{{ $message }} </span>
         </div> 
      </div>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      </button>
   </div>
   @endif 
   <form action="{{route('user-update-profile' )}}"  enctype="multipart/form-data" id="editform2" method="post">
      {{ csrf_field() }}
      <div class="row">
         <div class="col-md-4 grid-margin w-100 bg-img">
            <div class="img-overlay"></div>
            <div class="">
               <div class="">
                  <div class="form-group upload">
                     <!-- <label class="">Upload Profile Images</label> -->
                     <div class="profile-img mt-4">
                        <input name="profile_image_old" value="@if(!empty($user->profile_photo)){{old('profile_photo', $user->profile_photo)}}@endif" id="img1_old" type="hidden" class="form-control" >
                        <input type="file"  id="img1" name="profile_image" accept="image/*" style="opacity: 0" onchange="loadFile1i(event)" >
                        <center><img id="output1i" style="width: 130px; height: 130px; display: none;"></center>
                        <center><span id="att11i" style="color: #626262;">
                           @if(!empty($user->profile_photo))
                           <img class="" style="width: 130px; height: 130px; border-radius: 50%; border:2px solid #fff;" src="{{ URL::asset('/'.$user->profile_photo) }}">
                           @else
                           <img class="" style="width: 130px; height: 130px; border-radius:50% border:2px solid #fff;" src="{{ URL::asset('theme/images/browse.png') }}">
                           @endif
                           </span>
                        </center>
                        <center><span id="att1s1i" onclick="hideatt1i()" style="color: red; display: none;">Remove File</span></center>
                     </div>
                  </div>
               </div>
            </div>
            <br><br><br>
            <center>
               <h3 class="text-white text-center">Upload Profile Images</h3>
            </center>
         </div>
         <div class="col-md-8 grid-margin stretch-card card-padding">
            <div class="card">
               <div class="card-body row">
                  <div class="form-group col-lg-6">
                     <label>First & Last Name</label>
                     <input type="text" class="form-control form-control-lg" name="name" value="@if(!empty($user->name)){{old('name', $user->name)}}@endif" id="name" placeholder="First Name" maxlength="50">
                     <div  style="color:red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="form-group col-lg-6">
                     <label>E-mail</label>
                     <input type="email" name="email" value="@if(!empty($user->email)){{old('email', $user->email)}}@endif" class="form-control form-control-lg" id="email" placeholder="abc@gmail.com" maxlength="100" style="background-color: transparent !important;" readonly>
                  </div>
                  <div class="form-group col-lg-6">
                     <label>Phone Number</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <select name="country_code" class="js-example-basic-single w-100 h-50 custom-border">
                           @if(count($countries) > 0)
                           @foreach($countries as $country)
                           <option value="{{$country->phonecode}}" {{ $user->country_code == $country->phonecode ? 'selected' : '' }} ><span id="tt"> {{ $country->iso }}</span> +{{ $country->phonecode }}</option>
                           @endforeach
                           @endif
                           </select>
                        </div>
                        <!-- <input type="text" class="form-control" aria-label="Text input with dropdown button"> -->
                        <input type="text" name="phone" aria-label="Text input with dropdown button" value="@if(!empty($user->phone)){{old('phone', $user->phone)}}@endif"  class="form-control" id="phone" placeholder="+93-xxxxxxxx" maxlength="10" style="height: 101%; border-radius: 4px;">
                        <div  style="color:red">{{ $errors->first('phone') }}</div>
                     </div>
                  </div>
                  
                  <div class="form-group col-lg-6">
                     <label>Company</label>
                     <input type="text" name="company" value="@if(!empty($user->company)){{old('company', $user->company)}}@else{{ old('company') }}@endif"  class="form-control" id="company" placeholder="" maxlength="50">
                     <div  style="color:red">{{ $errors->first('company') }}</div>
                  </div>

                  <div class="form-group col-lg-6">
                     <label>Country</label>
                     <select name="country" class="js-example-basic-single w-100 h-50">
                        @if(count($countries) > 0)
                        @foreach($countries as $country)
                        @if ($user->country == $country->id || $user->country_code == $country->phonecode)
                        <option value="{{ $country->id }}" selected>{{ $country->nicename }}</option>
                        @else
                        <option value="{{$country->id}}" {{ (old('country') == $country->id ? "selected":"") }}>{{$country->nicename}}</option>
                        @endif
                        @endforeach
                        @endif
                     </select>
                     <!-- <small class="text-danger">Field is required</small> -->
                  </div>
                  <div class="form-group col-lg-6">
                     <label>City</label>
                     <input type="text" class="form-control form-control-lg" name="city" value="@if(!empty($user->city)){{old('city', $user->city)}}@endif" id="city" placeholder="City" maxlength="50">
                     <div  style="color:red">{{ $errors->first('city') }}</div>
                  </div>
                  <span class="text-white pl-3 pr-3">( Please enter your city, for us to adjust your time zone 100% accordingly, when you’re making bookings. )</span>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mb-3 stretch-card px-0">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     @php  
                     $sen_array = $user->seniority; 
                     $arr_sen = explode(",",$sen_array); 
                     @endphp
                     <div class="form-group col-lg-6">
                        <label>Seniority</label>
                        <select class="seniority w-100" name="seniority[]" multiple="multiple">
                           @if(count($seniorities) > 0)
                           @foreach($seniorities as $seniority)
                           @if($arr_sen)
                           @if(old('seniority'))
                           @if(in_array("$seniority->id", old('seniority')))
                           <option value="{{ $seniority->id }}" selected>{{ $seniority->name }}</option>
                           @else
                           <option value="{{ $seniority->id }}">{{ $seniority->name }}</option>
                           @endif
                           @else
                           @if(in_array("$seniority->id", $arr_sen))
                           <option value="{{$seniority->id}}" selected >{{$seniority->name}}</option>
                           @else
                           <option value="{{$seniority->id}}" >{{$seniority->name}}</option>
                           @endif
                           @endif
                           @else
                           @if(old('seniority'))
                           @if(in_array("$seniority->id", old('seniority')))
                           <option value="{{$seniority->id}}" selected>{{$seniority->name}}</option>
                           @else
                           <option value="{{$seniority->id}}" >{{$seniority->name}}</option>
                           @endif
                           @else
                           <option value="{{$seniority->id}}" >{{$seniority->name}}</option>
                           @endif
                           @endif
                           @endforeach
                           @endif
                        </select>
                        <div  style="color:red">{{ $errors->first('seniority') }}</div>
                     </div>
                     @php  
                     $ind_array = $user->industry; 
                     $arr_ind = explode(",",$ind_array); 
                     @endphp
                     <div class="form-group col-lg-6">
                        <label>Industry</label>
                        <select class="industry w-100" name="industry[]" multiple="multiple">
                           @if(count($industries) > 0)
                           @foreach($industries as $industry)
                           @if($arr_ind)
                           @if(old('industry'))
                           @if(in_array("$industry->id", old('industry')))
                           <option value="{{ $industry->id }}" selected>{{ $industry->name }}</option>
                           @else
                           <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                           @endif
                           @else
                           @if(in_array("$industry->id", $arr_ind))
                           <option value="{{$industry->id}}" selected>{{$industry->name}}</option>
                           @else
                           <option value="{{$industry->id}}" >{{$industry->name}}</option>
                           @endif
                           @endif
                           @else
                           @if(old('industry'))
                           @if(in_array("$industry->id", old('industry')))
                           <option value="{{ $industry->id }}" selected>{{ $industry->name }}</option>
                           @else
                           <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                           @endif
                           @else
                           <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                           @endif
                           @endif
                           @endforeach
                           @endif
                        </select>
                        <div  style="color:red">{{ $errors->first('industry') }}</div>
                     </div>
                     @php  
                     $b_array = $user->business_model; 
                     $arr_b = explode(",",$b_array); 
                     @endphp
                     <div class="form-group col-lg-6">
                        <label>Business Model</label>
                        <select class="business-model w-100" name="business_model[]" multiple="multiple">
                           @if(count($business_models) > 0)
                           @foreach($business_models as $business_model)
                           @if($arr_b)
                           @if(old('business_model'))
                           @if(in_array("$business_model->id", old('business_model')))
                           <option value="{{$business_model->id}}" selected>{{$business_model->name}}</option>
                           @else
                           <option value="{{$business_model->id}}" >{{$business_model->name}}</option>
                           @endif
                           @else
                           @if(in_array("$business_model->id", $arr_b))
                           <option value="{{$business_model->id}}" selected>{{$business_model->name}}</option>
                           @else
                           <option value="{{$business_model->id}}" >{{$business_model->name}}</option>
                           @endif
                           @endif
                           @else
                           @if(old('business_model'))
                           @if(in_array("$business_model->id", old('business_model')))
                           <option value="{{$business_model->id}}" selected>{{$business_model->name}}</option>
                           @else
                           <option value="{{$business_model->id}}" >{{$business_model->name}}</option>
                           @endif
                           @else
                           <option value="{{$business_model->id}}" >{{$business_model->name}}</option>
                           @endif
                           @endif
                           @endforeach
                           @endif
                        </select>
                        <div  style="color:red">{{ $errors->first('business_model') }}</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mb-3 stretch-card px-0">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-lg-12 mb-2">
                        <h5 class="text-white">Headline</h5>
                     </div>
                     <div class="form-group col-lg-12">
                        <textarea class="form-control" name="biography" id="biography" placeholder="Tell us a bit about yourself, your career milestones and some of your proudest achievements. What areas you can offer advice within?" rows="6">@if(!empty($user->biography)){{old('biography', $user->biography)}}@else{{ old('biography') }}@endif</textarea>
                        <div  style="color:red">{{ $errors->first('biography') }}</div>
                     </div>
                     <div class="form-group col-lg-12 mb-2">
                        <h5 class="text-white">About Me </h5>
                     </div>
                     <div class="form-group col-lg-12">
                        <textarea class="form-control" name="about_me" id="about_me" placeholder="In the Field you can tell people a bit about yourself, your skills, your key expertise and some bullets about what matters you would like to advice within." rows="10">@if(!empty($user->about_me)){{old('about_me', $user->about_me)}}@else{{ old('about_me') }}@endif</textarea>
                        <div  style="color:red">{{ $errors->first('about_me') }}</div>
                        <!-- <textarea id="about-me"></textarea>-->
                     </div>
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
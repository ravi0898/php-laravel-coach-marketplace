@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <!-- alert  -->
   <div class="row mx-3">
      @if (\Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
         <strong> <i class="mdi mdi-alert-octagon"></i> </strong> {!! \Session::get('success') !!}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
      @if (\Session::has('error'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
         <strong> <i class="mdi mdi-thumb-up-outline"></i> </strong> {!! \Session::get('success') !!}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
   </div>
   <!-- alert  -->
   <div class="row">
      <div class="col-md-4 grid-margin w-100 bg-img">
         <div class="img-overlay"></div>
         <div class="">
            <div class="">
               <div class="form-group upload">
                  <div class="profile-img mt-4">
                     <center><span id="att11i" style="color: #626262;">
                        @if(!empty($profile->profile_photo))
                        <img class="" style="width: 130px; height: 130px; border-radius: 50%; border:2px solid #fff;" src="{{ URL::asset('/'.$profile->profile_photo) }}">
                        @else
                        <img class="" style="width: 130px; height: 130px; border-radius:50% border:2px solid #fff;" src="{{ URL::asset('theme/images/browse.png') }}">
                        @endif
                        </span>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <br><br><br>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
         <div class="card">
            <div class="card-body row">
               <div class="form-group col-lg-6">
                  <h4 class="text-main mb-3">First Name</h4>
                  <label class="admin-profile-label">{{ $profile->name }}</label>
               </div>
               <div class="form-group col-lg-6">
                  <h4 class="text-main mb-3">Email</h4>
                  <label class="admin-profile-label">{{ $profile->email }}</label>
               </div>
               <div class="form-group col-lg-6">
                  <h4 class="text-main mb-3">Country Code</h4>
                  <label class="admin-profile-label">+{{ $profile->country_code }}</label>
               </div>
               <div class="form-group col-lg-6">
               <h4 class="text-main mb-3">Phone Number</h4>
                  <label class="admin-profile-label">{{ $profile->phone }}</label>
               </div>
               <div class="form-group col-lg-6">
                  <h4 class="text-main mb-3">Company</h4>
                  <label class="admin-profile-label">{{ $profile->company }}</label>
               </div>
               <div class="form-group col-lg-6">
                  <h4 class="text-main mb-3">Country</h4>
                  @if(count($country) > 0)
                  @foreach($country as $countries)
                  @if ($profile->country == $countries->id || $profile->country_code == $countries->phonecode)
                  <label class="admin-profile-label">{{ $countries->nicename }}</label>
                  @endif
                  @endforeach
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               @if(($profile->expertise !='') && ($profile->available_slots !=''))
               <div class="row">
                  <div class="form-group col-lg-12">
                     <h4 class="text-main mb-3" for="exampleTextarea1">Bio</h4>
                     <p class="text-white">{{ $profile->biography }}</p>
                  </div>
                  <div class="form-group col-lg-6">
                     <h4 class="text-main mb-3">Expertise</h4>
                     @php
                     $expid = explode(",",$profile->expertise);
                     @endphp
                     @foreach ($expid as $expertise_id)
                     @php
                     $exper_id = $expertise_id ; 
                     $get_exper = DB::table('master_catdata')->where('id', $exper_id)->orderBy('id','DESC')->get();
                     @endphp
                     @foreach ($get_exper as $expertise_data)
                     <span class="badge badge-primary admin-profile-label mb-2">{{ $expertise_data->name }}</span>
                     @endforeach
                     @endforeach
                  </div>
                  <div class="form-group col-lg-6">
                     <h4 class="text-main mb-3">Seniority</h4>
                     @php
                     $seniority = explode(",",$profile->seniority);
                     @endphp
                     @foreach ($seniority as $seniority_id)
                     @php
                     $seniority_id = $seniority_id ; 
                     $get_seniority = DB::table('master_catdata')->where('id', $seniority_id)->orderBy('id','DESC')->get();
                     @endphp
                     @foreach ($get_seniority as $seniority_data)
                     <span class="badge badge-primary admin-profile-label mb-2">{{ $seniority_data->name }}</span>
                     @endforeach
                     @endforeach
                  </div>
                  <div class="form-group col-lg-6">
                     <h4 class="text-main mb-3">Industry</h4>
                     @php
                     $industry = explode(",",$profile->industry);
                     @endphp
                     @foreach ($industry as $industry_id)
                     @php
                     $indus_id = $industry_id ; 
                     $get_indus = DB::table('master_catdata')->where('id', $indus_id)->orderBy('id','DESC')->get();
                     @endphp
                     @foreach ($get_indus as $indus_data)
                     <span class="badge badge-primary admin-profile-label mb-2">{{ $indus_data->name }}</span>
                     @endforeach
                     @endforeach
                  </div>
                  <div class="form-group col-lg-6">
                     <h4 class="text-main mb-3">Business Model</h4>
                     @php
                     $business_model = explode(",",$profile->business_model);
                     @endphp
                     @foreach ($business_model as $busin_id)
                     @php
                     $business_id = $busin_id ; 
                     $get_business = DB::table('master_catdata')->where('id', $business_id)->orderBy('id','DESC')->get();
                     @endphp
                     @foreach ($get_business as $businesdata)
                     <span class="badge badge-primary admin-profile-label mb-2">{{ $businesdata->name }}</span>
                     @endforeach
                     @endforeach
                  </div>
                  <div class="form-group col-lg-12">
                     <h4 class="text-main mb-3">Define pricing</h4>
                  </div>
                  <div class="form-group col-lg-4">
                     <label>Pricing 20 min.</label><br>
                     <label>{{ $profile->price_20 }}</label>
                  </div>
                  <div class="form-group col-lg-4">
                     <label>Pricing 40 min.</label><br>
                     <label>{{ $profile->price_40 }}</label>
                  </div>
                  <div class="form-group col-lg-4">
                     <label>Pricing 60 min.</label><br>
                     <label>{{ $profile->price_60 }}</label>
                  </div>
                  <div class="form-group col-lg-12">
                     <h4 class="text-main mb-3">Add availability</h4>
                     @php
                     $slots = explode(",",$profile->available_slots);
                     @endphp
                     @foreach($slots as $availble_slots)
                     <div class="time-select check-cl">
                        <label>
                        <input type="checkbox" name="availability[]" value="6-7am" checked><span>{{ $availble_slots }}</span>
                        </label>
                     </div>
                     @endforeach
                  </div>
                  <div class="form-group col-lg-12">
                     <h4 class="text-main mb-3">About Me</h4>
                     
                     <p class="text-white admin-profile-label"> {{ $profile->about_me }} </p>
                  </div>
                  @php
                  $uid = $profile->id
                  @endphp
                  @if($profile->status =='1')
                  <div class="form-group col-lg-6">
                     <a href="javascript:(void)" class="btn btn-danger px-3 py-2 btn-icon-text" data-href="{{ route('admin-coach-approval',[$uid,0]) }}" data-toggle="modal" data-target="#confirm-deny">
                     <i class="mdi mdi-marker-check"></i> Reject </a>
                  </div>
                  <div class="form-group col-lg-6">
                     <a href="javascript:(void)" class="btn btn-success px-3 py-2 btn-icon-text" data-href="{{ route('admin-coach-approval',[$uid,1]) }}" data-toggle="modal" data-target="#confirm-deny">
                     <i class="mdi mdi-marker-check"></i> Approve </a>
                  </div>
                  @endif
               </div>
               @else
               @if($profile->status =='0')
               <div class="form-group col-lg-6">
                  <label for="exampleTextarea1">Expertise</label>
                  <p class="text-white">{{ $profile->expertise_reg }}</p>
               </div>
               <div class="form-group col-lg-6">
                  <label for="exampleTextarea1">Why Advisor</label>
                  <p class="text-white">{{ $profile->why_advisor }}</p>
               </div>
               @endif
               <center>
                  <h2 class="text-white">No Data Found</h2>
               </center>
               @endif
            </div>
         </div>
      </div>
   </div>
   </form>
</div>
<!-- content-wrapper ends -->
<!-- Modal -1 -->
<div class="modal fade" id="confirm-deny">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <p>Are you sure?</p>
            <!-- <p class="debug-url"></p> -->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <a class="btn btn-success btn-ok">Ok</a>
         </div>
      </div>
   </div>
</div>
<!-- Modal 1-->
@endsection
@section('scripts')   
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>
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
   document.getElementById("output1i").style.display = "none";
   
   document.getElementById("att1s1i").style.display = "none";
   
   
   
   var loadFile1i = function(event) {
   
   document.getElementById("att11i").style.display = "none";
   
   document.getElementById("att1s1i").style.display = "block";
   
   document.getElementById("output1i").style.display = "block";
   
   document.getElementById("img_error").style.display = "none";
   
   
   
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
   
</script>
<script>
   $('#confirm-deny').on('show.bs.modal', function(e) {
   $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
   });
</script>
@endsection
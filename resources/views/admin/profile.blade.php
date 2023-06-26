@extends('admin.layouts.header')

@section('styles') 

    

@endsection

@section('content')

        <div class="content-wrapper">



          <div class="row mx-3">



            



            @if (\Session::has('success'))



            <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">

            <strong> <i class="mdi mdi-thumb-up-outline"></i> </strong> {!! \Session::get('success') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

            </div>

            @endif







            @if (\Session::has('error'))

            

            <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">

            <strong> <i class="mdi mdi-alert-octagon"></i> </strong> {!! \Session::get('success') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

            </div>

            @endif





          </div>  

           



           



         <form method="POST" action="{{route('admin-update-profile')}}" enctype="multipart/form-data" >

          {{ csrf_field() }}

          <div class="row">



            <div class="col-md-4 grid-margin w-100 bg-img">

              <div class="img-overlay"></div>

              <div class="">

                <div class="">

                <div class="form-group upload">

                <div class="profile-img mt-4">

                <input type="file"  id="img1" name="profile_img" accept="image/*" style="opacity: 0" onchange="loadFile1i(event)">

                <input type="hidden" name="profile_img_old" value="{{ $profile->profile_photo }}">



                <center><img id="output1i" style="width: 130px; height: 130px; display: none;"></center>

                <center><span id="att11i" style="color: #626262;">





                @if($profile->profile_photo !='')

                

                <img class="" src="{{url('').'/'.$profile->profile_photo }}">



                @else



                <img class="" src="{{ url('theme/images/browse.png') }}">



                @endif



                </span></center>

                <center><span id="att1s1i" onclick="hideatt1i()" style="color: red; display: none;">Remove File</span></center>

                </div>

                </div>

              </div>

             </div><br><br><br>

             <center><h3 class="text-white text-center">Upload Profile<br>Images</h3></center>

          </div>

               

            <!-- <div class="col-md-4 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">



                <div class="form-group">

                <label class="">Upload Profile Images</label>

                <div class="profile-img">

                <input type="file"  id="img1" name="profile_img" accept="image/*" style="opacity: 0" onchange="loadFile1i(event)" >



                <input type="hidden" name="profile_img_old" value="{{ $profile->profile_photo }}">



                <center><img id="output1i" style="width: 100px; height: 100px; display: none;"></center>

                <center><span id="att11i" style="color: #626262;">



                @if($profile->profile_photo !='null')

                

                <img class="" src="{{url('').'/'.$profile->profile_photo }}">



                @else



                <img class="" src="{{ url('theme/images/browse.png') }}">



                @endif

                

                </span></center>

                <center><span id="att1s1i" onclick="hideatt1i()" style="color: red; display: none;">Remove File</span></center>

                </div>

                </div>

              </div>

             </div>

          </div> -->



            <div class="col-md-8 grid-margin stretch-card">

              <div class="card">

                <div class="card-body row">

                   <div class="form-group col-lg-6">

                   <label>First Name</label>



                   <input type="text" name="name" value="{{ $profile->name }}" class="form-control form-control-lg" id="" placeholder="First Name">



                   <div id="name_error" style="color:red">{{ $errors->first('name') }}</div>



                   </div>



                  <div class="form-group col-lg-6">

                  <label>Last Name</label>

                  <input type="text" name="last_name" value="{{ $profile->last_name }}" class="form-control form-control-lg" id="" placeholder="Last Name">

                   <div id="lname_error" style="color:red">{{ $errors->first('last_name') }}</div>



                  </div>



                   <div class="form-group col-lg-6">

                   <label>E-mail</label>

                   <input type="email" name="email" value="{{ $profile->email }}" class="form-control form-control-lg" id="" placeholder="Email" readonly>

                   <div id="email_error" style="color:red">{{ $errors->first('email') }}</div>



                   </div>



                  <div class="form-group col-lg-6">

                  <label>Password</label>

                  <input type="password" name="password" value="" class="form-control form-control-lg"  id="" placeholder="Password">

                  </div>

                   <div class="form-group col-lg-12 text-center">

                    <input type="hidden" name="hidden_pass" id="hidden_pass" class="hidden_pass" value="{{ $profile->password }}">

                    <input type="hidden" name="user_id" id="user_id" class="user_id" value="{{ $profile->id }}">



                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-rounded custom-padding">Update</button>

                   </div>

                

                </div>

              </div>

            </div>

         

          </div>

       

         </form>

          

        </div>

        <!-- content-wrapper ends -->

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

@endsection


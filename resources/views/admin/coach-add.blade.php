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

       
          <form method="POST" action="{{ route('coach-profile-add') }}" enctype="multipart/form-data"> 
          @csrf 
          <div class="row">

            <div class="col-md-4 grid-margin w-100 bg-img">
              <div class="img-overlay"></div>
              <div class="">
                <div class="">
                <div class="form-group upload">
                <div class="profile-img mt-4">
                <input type="file"  id="img1" name="profile_img" accept="image/*" style="opacity: 0" onchange="loadFile1i(event)">

                <center><img id="output1i" style="width: 130px; height: 130px; display: none;"></center>
                <center><span id="att11i" style="color: #626262;">


                <img class="" src="{{ url('theme/images/browse.png') }}">


                </span></center>
                <center><span id="att1s1i" onclick="hideatt1i()" style="color: red; display: none;">Remove File</span></center>
                </div>
                </div>
              </div>
             </div><br><br><br>
             <center><h3 class="text-white text-center">Upload Profile<br>Images</h3></center>
             <center>
                   <div id="img_error" style="color:red">{{ $errors->first('profile_img') }}</div>
                </center>
          </div>
          
            <!-- <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                <div class="form-group">
                <label class="">Upload Profile Images</label>
                <div class="profile-img">
                <input type="file"  id="img1" name="profile_img" accept="image/*" style="opacity: 0" onchange="loadFile1i(event)">


                <center><img id="output1i" style="width: 100px; height: 100px; display: none;"></center>
                <center><span id="att11i" style="color: #626262;">

                <img class="" src="{{ url('theme/images/browse.png') }}">

                </span></center>

                <center><span id="att1s1i" onclick="hideatt1i()" style="color: red; display: none;">Remove File</span></center>
                <center>
                   <div id="img_error" style="color:red">{{ $errors->first('profile_img') }}</div>
                </center>
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
                   <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" id="" placeholder="First Name">
                   <div id="input_error" style="color:red">{{ $errors->first('name') }}</div>

                   </div>

                  <div class="form-group col-lg-6">
                  <label>Last Name</label>
                  <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control form-control-lg" id="" placeholder="Last Name">
                  <div id="input_error" style="color:red">{{ $errors->first('last_name') }}</div>

                  </div>

                   <div class="form-group col-lg-6">
                   <label>E-mail</label>
                   <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" id="" placeholder="Email">
                   <div id="input_error" style="color:red">{{ $errors->first('email') }}</div>
                   </div>


                   <div class="form-group col-lg-6">
                   <label>Password</label>
                   <input type="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg" id="" placeholder="Password">
                   <div id="input_error" style="color:red">{{ $errors->first('password') }}</div>
                   </div>

                  <div class="form-group col-lg-6">
                  <label>Company</label>
                  <input type="text" name="company" value="{{ old('company') }}" class="form-control form-control-lg" id="" placeholder="Company">

                  <div id="input_error" style="color:red">{{ $errors->first('company') }}</div>

                  </div>
                  

                   <div class="form-group col-lg-6">
                    <label>Country</label>
                    <select name="country" id="country" class="js-example-basic-single w-100 h-50">
                     
                      @foreach ($country as $country_list)
                      <option value="{{ $country_list->nicename }}"  {{ ( old('country') == $country_list->nicename) ? 'selected' : '' }}>{{ $country_list->nicename }}</option>
                      @endforeach
                      
                    </select>
                  <div id="input_error" style="color:red">{{ $errors->first('country') }}</div>
                  </div>

                  <div class="form-group col-lg-6">
                  <label>Phone Number</label>
                  <input type="number" name="phone" value="{{ old('phone') }}" class="form-control form-control-lg"  id="" placeholder="Phone number">
                  <div id="input_error" style="color:red">{{ $errors->first('phone') }}</div>
                  </div>

                 

                
                
                
                </div>
              </div>
            </div>
         
          </div>
       
    
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">

                    <div class="form-group col-lg-12">
                      <label for="exampleTextarea1">Bio</label>
                      <textarea class="form-control" name="bio" placeholder="Tell us a bit about yourself, your career milestones and some of your proudest achievements. What areas you can offer advice within?" rows="4">{{ old('bio') }}</textarea>
                     <div id="input_error" style="color:red">{{ $errors->first('bio') }}</div>

                    </div>

                  <div class="form-group col-lg-6">
                  <label>Expertise</label>
                     
                      <select name="expertise[]" class="expertise w-100" multiple="multiple">

                      @foreach ($master_catdat as $expertise)
                      @if($expertise->type_id =='1')
                      
                      <option value="{{ $expertise->id }}" {{ old('expertise') == $expertise->id ? 'selected' : ''}}>{{ $expertise->name }}</option>
                      
                      @endif 
                      @endforeach
                      
                      
                    </select>



                   <div id="input_error" style="color:red">{{ $errors->first('expertise') }}</div>

                   </div>  

                   <div class="form-group col-lg-6">
                     <label>Seniority</label>
                      <select name="seniority[]" class="seniority w-100" multiple="multiple">
                      
                      @foreach ($master_catdat as $seniorities)
                      @if($seniorities->type_id =='2')
                      
                      <option value="{{ $seniorities->id }}" {{ old('seniority') == $seniorities->id ? 'selected' : ''}}>{{ $seniorities->name }}</option>
                      
                      @endif 
                      @endforeach

                    </select>

                   <div id="input_error" style="color:red">{{ $errors->first('seniority') }}</div>

                   </div> 

                   <div class="form-group col-lg-6">
                    <label>Industry</label>
                    <select name="industry[]" class="industry w-100" multiple="multiple">
                     

                      @foreach ($master_catdat as $industries)
                      @if($industries->type_id =='3')
                      
                      <option value="{{ $industries->id }}" {{ old('industry') == $industries->id ? 'selected' : ''}}>{{ $industries->name }}</option>
                      
                      @endif 
                      @endforeach


                    </select>

                   <div id="input_error" style="color:red">{{ $errors->first('industry') }}</div>

                   </div>


                   <div class="form-group col-lg-6">
                     <label>Business Model</label>
                      <select name="business_model[]" class="business-model w-100" multiple="multiple">
                      
                      @foreach ($master_catdat as $bmodel)
                      @if($bmodel->type_id =='4')
                      
                      <option value="{{ $bmodel->id }}" {{ old('business_model') == $bmodel->id ? 'selected' : ''}}>{{ $bmodel->name }}</option>
                      
                      @endif 
                      @endforeach

                      </select>

                   <div id="input_error" style="color:red">{{ $errors->first('business_model') }}</div>

                    </div>

                    <div class="form-group col-lg-12">
                    <h5>Define pricing</h5>
                   </div> 

                  <div class="form-group col-lg-4">
                  <label>Pricing 20 min.</label>
                  <input type="text" name="price_20" value="{{ old('price_20') }}" class="form-control form-control-lg" id="" placeholder="$">
                  
                  <div id="input_error" style="color:red">{{ $errors->first('price_20') }}</div>

                  </div>

                  <div class="form-group col-lg-4">
                  <label>Pricing 40 min.</label>
                  <input type="text" name="price_40" value="{{ old('price_40') }}" class="form-control form-control-lg" id="" placeholder="$">
                  <div id="input_error" style="color:red">{{ $errors->first('price_40') }}</div>

                  </div>

                  <div class="form-group col-lg-4">
                  <label>Pricing 60 min.</label>
                  <input type="text" name="price_60" value="{{ old('price_60') }}" class="form-control form-control-lg" id="" placeholder="$">
                  <div id="input_error" style="color:red">{{ $errors->first('price_60') }}</div>

                  </div>

                  
                    <div class="form-group col-lg-12">
                      <div class=""> <label>Add availability</label></div>
                      <div id="input_error" style="color:red">{{ $errors->first('availability') }}</div>

                       <div class="time-select check-cl">
                        <label>
                           <input type="checkbox" name="availability[]" value="6-7am"><span>6-7 Am</span>
                        </label>
                     </div>

                  <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="7-8am"><span>7-8 Am</span>
                     </label>
                  </div>

                  <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="8-9am"><span>8-9 Am</span>
                     </label>
                  </div>

                  <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="9-10am"><span>9-10 Am</span>
                     </label>
                  </div>

                  <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="10-11am"><span>10-11 Am</span>
                     </label>
                  </div>

                  <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="11-12am"><span>11-12 Am</span>
                     </label>
                  </div>

                    <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="12-1pm"><span>12-1 Pm</span>
                     </label>
                  </div>

                    <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="1-2pm"><span>1-2 Pm</span>
                     </label>
                     </div>

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="2-3pm"><span>2-3 Pm</span>
                     </label>
                     </div>

                      <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="3-4pm"><span>3-4 Pm</span>
                     </label>
                     </div>

                      <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="4-5pm"><span>4-5 Pm</span>
                     </label>
                     </div>

                      <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="5-6pm"><span>5-6 Pm</span>
                     </label>
                     </div>

                      <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="6-7pm"><span>6-7 Pm</span>
                     </label>
                     </div>

                      <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="7-8pm"><span>7-8 Pm</span>
                     </label>
                     </div>

                      <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="8-9pm"><span>8-9 Pm</span>
                     </label>
                     </div>

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="9-10pm"><span>9-10 Pm</span>
                     </label>
                     </div>

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="10-11pm"><span>10-11 Pm</span>
                     </label>
                     </div>

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="11-12pm"><span>11-12 Pm</span>
                     </label>
                     </div> 


                        <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="12-1am"><span>12-1 Am</span>
                     </label>
                     </div>     

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="1-2am"><span>1-2 Am</span>
                     </label>
                     </div>    

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="2-3am"><span>2-3 Am</span>
                     </label>
                     </div>   

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="3-4am"><span>3-4 Am</span>
                     </label>
                     </div>

                     <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="4-5am"><span>4-5 Am</span>
                     </label>
                     </div>    

                        <div class="time-select check-cl">
                     <label>
                        <input type="checkbox" name="availability[]" value="5-6am"><span>5-6 Am</span>
                     </label>
                     </div>     
                    </div>  

                    <div class="form-group col-lg-12">
                     <label>About Me</label>
                     <textarea name="about_me" id="about-me">{{ old('about_me') }}</textarea>
                     <div id="input_error" style="color:red">{{ $errors->first('about_me') }}</div>

                   </div>


                    <div class="form-group col-lg-12 text-center">

                     
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-rounded custom-padding">Add</a>
                   </div>




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
@endsection

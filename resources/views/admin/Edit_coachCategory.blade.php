@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
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
   <form method="POST" action="{{route('admin-update-coachCat')}}" enctype="multipart/form-data" >
      {{ csrf_field() }}
      <div class="row">
         <div class="col-md-4 grid-margin w-100 bg-img">
            <div class="img-overlay"></div>
            <div class="">
               <div class="">
                  <div class="form-group upload">
                     <div class="profile-img mt-4">
                        <input type="file"  id="img1" name="cat_img" accept="image/*" style="opacity: 0" onchange="loadFile1i(event)">
                        <input type="hidden" name="cat_img_old" value="{{ $Category->cat_img }}">
                        <input type="hidden" name="cat_id" value="{{ $Category->id }}">
                        <center><img id="output1i" style="width: 130px; height: 130px; display: none;"></center>
                        <center><span id="att11i" style="color: #626262;">
                           @if($Category->cat_img !='null')
                           <img class="" src="{{url('').'/'.$Category->cat_img }}">
                           @else
                           <img class="" src="{{ url('theme/images/browse.png') }}">
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
               <h3 class="text-white text-center">Upload Profile<br>Images</h3>
            </center>
            <center>
               <div id="img_error" style="color:red">{{ $errors->first('cat_img') }}</div>
            </center>
         </div>
         <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
               <div class="card-body row justify-content-center align-items-center">
                  <div>
                      <div class="search-btn-wrap">
                          <input type="text" name="categoryName" value="{{ $Category->categoryName }}" class="roboto discover-search-input" placeholder="Category Name">
                          <button type="submit" name="submit" class="search_coach button-primary roboto text-white px-5 discover-search-btn text-black" value="Add">Add</button>
                      </div>
                      <div id="name_error" class="text-center mt-3" style="color:red">{{ $errors->first('categoryName') }}</div>
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
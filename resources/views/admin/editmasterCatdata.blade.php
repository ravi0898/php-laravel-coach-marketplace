@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin">
         <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold text-white">Edit Master Category Data</h3>
         </div>
      </div>
      <div class="col-md-12 grid-margin w-100">
         @if (\Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
            <strong> <i class="mdi mdi-alert-octagon"></i> </strong> {!! \Session::get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         @endif
         <div class="card">
            <form method="POST" action="{{ route('updmaster-categorydata')}}">
               @csrf
               <div class="card-body row">
                  <div class="form-group col-lg-4 mb-sm-0">
                     <input type="text" name="name" class="form-control form-control-lg" id="" placeholder="Enter Name" value="{{ $mdata->name }}" >
                     <div id="name_error" style="color:red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="form-group col-lg-4 mb-sm-0">
                     <select name="type" class="form-control form-control-lg">
                        <option value="" class="text-dark">Select Type</option>
                        @foreach ($masterCat as $masterCategory)
                        @php 
                        $catnamid = $masterCategory->name .",". $masterCategory->id;
                        @endphp
                        <option class="text-dark" value="{{ $catnamid }}" {{ $mdata->type_id == $masterCategory->id ? 'selected' : ''}} >{{ $masterCategory->name }}</option>
                        @endforeach
                     </select>
                     <div id="name_error" style="color:red">{{ $errors->first('type') }}</div>
                  </div>
                  <div class="form-group col-lg-4 mb-sm-0">
                     <input type="hidden" name="id" value="{{ $mdata->id }}">
                     <input type="submit" name="submit" class="font-weight-bold w-100 btn btn-primary py-3" value="Update">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('scripts')   
@endsection
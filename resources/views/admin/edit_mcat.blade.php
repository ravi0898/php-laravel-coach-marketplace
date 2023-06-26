@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
       
        <div class="content-wrapper">
    
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="col-12 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold text-white">Edit Master Category</h3>
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
                <form method="POST" action="{{ route('update-master-cat') }}">
                  @csrf
                <div class="card-body row">
                   <div class="form-group col-lg-6">
                   <input type="text" name="name" value="{{ $mcat->name }}" class="form-control form-control-lg" id="" placeholder="Enter Name">

                   <div id="name_error" style="color:red">{{ $errors->first('name') }}</div>

                   </div>

                <div class="form-group col-lg-6">
                  <input type="hidden" name="id" value="{{ $mcat->id }}">
                  <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
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

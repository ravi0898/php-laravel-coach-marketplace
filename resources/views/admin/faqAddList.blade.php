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
            
            <div class="alert alert-danger alert-dismissible fade show col-lg-8 mx-auto" role="alert">
            <strong> <i class="mdi mdi-alert-octagon"></i> </strong> {!! \Session::get('error') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif


          </div>  
           

           

         <form method="POST" action="{{route('admin-insert-faq')}}">
          {{ csrf_field() }}
          
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body row">
                   
                   <div class="form-group col-lg-6">
                   <input type="text" name="title" value="{{old('title')}}" class="form-control form-control-lg" id="" placeholder="Enter Title">
                   <div id="name_error" style="color:red">{{ $errors->first('title') }}</div>
                   </div>
                   
                   
                    <div class="form-group col-lg-6">
                    
                    
                    <select name="type" class="form-control form-control-lg">
                      <option value="" class="text-dark">Select Type</option>
                      <option value="user" {{ old('type') == 'user' ? "selected" : "" }} class="text-dark">User</option>
                      <option value="coach" {{ old('type') == 'coach' ? "selected" : "" }} class="text-dark">Coach</option>
                    </select>
                                          
                    
                   <div id="name_error" style="color:red">{{ $errors->first('type') }}</div>
                   
                   </div>
                   
                   
                   
                    <div class="form-group col-lg-12">
                    <textarea name="descp" class="form-control form-control-lg" placeholder="Enter Description">{{old('descp')}}</textarea>
                 
                    <div id="name_error" style="color:red">{{ $errors->first('descp') }}</div>
                   </div>

                  

                   
                   <div class="form-group col-lg-6 ">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-rounded custom-padding">Add</button>
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
@endsection

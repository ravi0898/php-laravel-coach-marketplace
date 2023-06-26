@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin">
         <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold text-white">Master Category Data</h3>
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
         <div class="card mb-4">
            <form method="POST" action="{{ route('addmaster-categorydata')}}">
               @csrf
               <div class="card-body row align-items-center py-sm-3">
                  <div class="form-group col-lg-4 mb-sm-0">
                     <input type="text" name="name" class="form-control form-control-lg" id="" placeholder="Enter Name" value="{{ old('name')  }}" >
                     <div id="name_error" style="color:red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="form-group col-lg-4 mb-sm-0">
                     <select name="type" class="form-control form-control-lg">
                        <option value="" class="text-dark">Select Type</option>
                        @foreach ($masterCat as $masterCategory)
                        @php 
                        $catnamid = $masterCategory->name .",". $masterCategory->id;
                        @endphp
                        <option value="{{ $catnamid }}" {{ old('type') == $catnamid ? 'selected' : ''}} class="text-dark">{{ $masterCategory->name }}</option>
                        @endforeach
                     </select>
                     <div id="name_error" style="color:red">{{ $errors->first('type') }}</div>
                  </div>
                  <div class="form-group col-lg-4 mb-sm-0">
                     <input type="submit" name="submit" class="font-weight-bold w-100 btn btn-primary py-3" value="Add">
                  </div>
               </div>
            </form>
         </div>
         <br>
         <div class="">
            <div class="">
               <div class="row">
                  <div class="form-group col-lg-12 table-responsive">
                     <table id="transaction-table" class="table" style="width:100%">
                        <thead>
                           <tr class="text-white">
                              <th>Sr.No.</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                           $sno = 1;
                           @endphp
                           @foreach ($masterCatdata as $masterCatdataval)
                           <tr>
                              <td>{{ $sno }}</td>
                              <td>{{ $masterCatdataval->name }}</td>
                              <td>{{ $masterCatdataval->type }}</td>
                              <td>
                                 <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                                       @php $ide = $masterCatdataval->id; @endphp
                                       <a class="dropdown-item" href="{{ route('admin-catdata-edit',$ide) }}">Edit </a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @php
                           $sno++;
                           @endphp
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('scripts')   
<script type="text/javascript">
   $(document).ready(function () {
   $('#transaction-table').DataTable();
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
     $("#example").DataTable({
       aaSorting: [],
       responsive: true,
   
       columnDefs: [
         {
           responsivePriority: 1,
           targets: 0
         },
         {
           responsivePriority: 2,
           targets: -1
         }
       ]
     });
   
     $(".dataTables_filter input")
       .attr("placeholder", "Search here...")
       .css({
         width: "300px",
         display: "inline-block"
       });
   
     $('[data-toggle="tooltip"]').tooltip();
   });
   
</script>
@endsection
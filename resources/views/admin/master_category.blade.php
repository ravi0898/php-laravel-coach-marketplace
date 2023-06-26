@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin">
         <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold text-white">Master Category</h3>
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
            <form method="POST" action="{{ route('add-master-cat') }}">
               @csrf
               <div class="card-body row justify-content-center">
                  <div>
                     <div class="search-btn-wrap">
                        <input type="text" name="name" class="roboto discover-search-input" placeholder="Enter name...">
                        <button type="submit" name="submit" class="search_coach button-primary roboto text-white px-5 discover-search-btn text-black" value="Add">Add</button>
                     </div>
                     <div id="name_error" class="text-center mt-3" style="color:red;">{{ $errors->first('name') }}</div>
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
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                           $sno = 1;
                           @endphp
                           @foreach ($masterCat as $masterCategory)
                           <tr>
                              <td>{{ $sno }}</td>
                              <td>{{ $masterCategory->name }}</td>
                              <td>
                                 <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                                       @php $ide = $masterCategory->id; @endphp
                                       <a class="dropdown-item" href="{{ route('admin-mcategory-edit',$ide) }}">Edit </a>
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
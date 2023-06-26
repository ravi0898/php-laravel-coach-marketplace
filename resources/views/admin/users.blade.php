@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin">
         <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold text-white">User List</h3>
         </div>
      </div>
      <div class="col-md-12 grid-margin w-100">
         <div class="">
            <div class="">
               <div class="row">
                  @if (\Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
                     <strong> <i class="mdi mdi-thumb-up-outline"></i> </strong> {!! \Session::get('success') !!}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif
                  <div class="form-group col-lg-12 table-responsive">
                     <table id="transaction-table" class="table" style="width:100%">
                        <thead>
                           <tr class="text-white">
                              <th>Sr.No.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Profile</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                           $sno = 1;
                           @endphp
                           @foreach ($users as $user)
                           <tr>
                              <td>{{ $sno }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->phone }}</td>
                              @if($user->profile_photo == '') 
                              <td><img src="{{ url('/upload/default.png') }}"></td>
                              @else 
                              <td><img src="{{url('').'/'.$user->profile_photo }}"></td>
                              @endif
                              <td>
                                 @if($user->status =='0')    
                                 <button type="button" class="btn btn-warning px-3 py-2 btn-icon-text">
                                 <i class="mdi mdi-marker-check"></i> Pending </button> 
                                 @else
                                 <button type="button" class="btn btn-success px-3 py-2 btn-icon-text">
                                 <i class="mdi mdi-marker-check"></i> Active </button>
                                 @endif    
                                 <!-- <button type="button" class="btn btn-info px-3 py-2 btn-icon-text"> -->
                                 <!-- <i class="mdi mdi-marker-check"></i> Pending </button> -->
                              </td>
                              <td>
                                 <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                                       <!-- <a class="dropdown-item" href="#">Edit </a> -->
                                       @php $ide = $user->id; @endphp
                                       <a class="dropdown-item" href="{{ route('admin-user-view',$ide) }}">View </a>
                                       <a href="javascript:(void)" class="dropdown-item" data-href="{{route('admin-user-delete',$ide)}}" data-toggle="modal" data-target="#confirm-deny">Delete </a>
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
<!-- Modal -1 -->
<div class="modal fade" id="confirm-deny">
   <!-- <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <p>Are you sure, you want to delete this user?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <a class="btn btn-success btn-ok">Ok</a>
         </div>
      </div>
   </div> -->
   <div class="modal-dialog modal-dialog-centered mt-0" role="document">
    <div class="modal-content">
      <div class="p-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body pt-0 text-center"> 
          <img src="https://zentia.io/assets/media/delete.jpg" class="modal-img">
          <h4 class="text-main mt-2">Delete User</h4>
          <p class="mt-4 px-2 px-sm-5">Are you sure, you want to delete this user?</p>
         
         <div class="d-flex justify-content-center align-items-center ">
            <button type="button" class="btn btn-primary btn-sm btn-rounded custom-padding mt-3 cancel-btn" data-dismiss="modal">Cancel</button>
            <a href="" type="button" class="btn btn-primary btn-sm btn-rounded custom-padding mt-3 btn-ok">Delete</a>
         </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal 1-->
@endsection
@section('scripts')   
<script>
   $('#confirm-deny').on('show.bs.modal', function(e) {
   $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
   });
</script>
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
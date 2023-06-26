@extends('admin.layouts.header')

@section('styles') 

@endsection

@section('content')

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin">

              <div class="col-12 mb-4 mb-xl-0">

                  <h3 class="font-weight-bold text-white">Coach List</h3>


                  <!-- <a href="{{ route('admin-coach-add') }}" class="btn btn-primary">Add</a> -->

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
                
                <th>Slider</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @php

            $sno = 1;

            @endphp

            @foreach ($users as $user)

            @php $ide = $user->id; @endphp

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

                  <a href="javascript:(void)" class="btn btn-warning px-3 py-2 btn-icon-text" data-href="{{ route('admin-coach-active',$ide) }}" data-toggle="modal" data-target="#confirm-deny">
                  <i class="mdi mdi-marker-check"></i> Inactive </a> 

                  @elseif($user->status =='1')

                  <button type="button" class="btn btn-primary px-3 py-2 btn-icon-text">
                  <i class="mdi mdi-marker-check"></i> Active </button>


                  @else
                  
                  <button type="button" class="btn btn-success px-3 py-2 btn-icon-text">
                  <i class="mdi mdi-marker-check"></i> Approved </button>


                  @endif    

                  
                  
                  
                </td>
                
                <td>
                    
                    @if($user->status =='2')
                    <select name="SliderMenu" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                      <option value="{{ route('admin-slider-select',[$ide,0]) }}">Default</option>
                      <option value="{{ route('admin-slider-select',[$ide,1]) }}" {{old('SliderMenu',$user->slider)=="1"? 'selected':''}}>1</option>
                      <option value="{{ route('admin-slider-select',[$ide,2]) }}" {{old('SliderMenu',$user->slider)=="2"? 'selected':''}}>2</option>   
                      <option value="{{ route('admin-slider-select',[$ide,3]) }}" {{old('SliderMenu',$user->slider)=="3"? 'selected':''}}>3</option>
                    </select>
                    
                    @else
                    -
                    @endif
                    
                </td>


                <td>

                  <div class="dropdown">

                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="mdi mdi-dots-vertical"></i>

                          </button>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                           

                          

                            <a class="dropdown-item" href="{{ route('admin-coach-view',$ide) }}">View </a>
                           
                            <a class="dropdown-item" href="{{route('admin-coach-edit',$ide)}}">Edit </a> 

                            <a href="javascript:(void)" class="dropdown-item" data-href="{{route('admin-coach-delete',$ide)}}" data-toggle="modal" data-target="#confirm-delCoach">Delete </a>

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

  <div class="modal-dialog">

     <div class="modal-content">

        <!-- Modal Header -->

        <div class="modal-header">

           <h4 class="modal-title">Active Coach</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

           <p>Are you sure, you want to active this coach?</p>

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
<!-- Modal -2 -->

<div class="modal fade" id="confirm-delCoach">

  <div class="modal-dialog">

     <div class="modal-content">

        <!-- Modal Header -->

        <div class="modal-header">

           <h4 class="modal-title">Confirmation</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

           <p>Are you sure, you want to delete this coach?</p>

           <!-- <p class="debug-url"></p> -->

        </div>

        <div class="modal-footer">

           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

           <a class="btn btn-success btn-ok">Ok</a>

        </div>

     </div>

  </div>

</div>

<!-- Modal 2-->





@endsection

@section('scripts')   

<script type="text/javascript">

  $(document).ready(function () {

  $('#transaction-table').DataTable();

});</script>


<script>
$('#confirm-deny').on('show.bs.modal', function(e) {
$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});


$('#confirm-delCoach').on('show.bs.modal', function(e) {
$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>



@endsection


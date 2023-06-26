@extends('admin.layouts.header')

@section('styles') 

    

@endsection

@section('content')

        <div class="content-wrapper">

    

          <div class="row">

            <div class="col-md-12 grid-margin">

              <div class="col-12 mb-4 mb-xl-0">

                  <h3 class="font-weight-bold text-white">Booking List</h3>

                  <!-- <h6 class="font-weight-normal mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6> -->

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

                <th>Date</th>

                <th>Order Id</th>

                <th>Meeting Date</th>
                <th>user</th>
                <th>Advisor</th>

                <th>Status</th>

                <th>View</th>

            </tr>


        </thead>

        <tbody>
            
            @if(count($bookingList) > 0)
            @php $i = 1; @endphp
            @foreach($bookingList as $booking)

            <tr>

                <td>{{ $i }}</td>

                <td>{{ $booking->created_at }}</td>

                <td>{{ $booking->order_id }}</td>

                <td>@if(!empty($booking->meeting_date)){{ $booking->meeting_date }}@else Not Decided @endif</td>
               
                <td>@if(!empty($booking->user_details->name)){{ $booking->user_details->name }}@endif</td>
                <td>@if(!empty($booking->coach_details->name)){{ $booking->coach_details->name }}@endif</td>
                                
                

                <td><button type="button" class="btn btn-info px-3 py-2 btn-icon-text">

                     <i class="mdi mdi-marker-check"></i> {{ $booking->status }} </button></td>
                        @php $ide = Crypt::encrypt($booking->id); @endphp
                <td><a href="{{ route('admin-booking-view', $ide) }}" class="btn btn-primary btn-icon-text px-3 py-2">

                    <i class="mdi mdi-eye btn-icon-prepend"></i> View </a>

                </td>

            </tr>
            @php $i++; @endphp
            @endforeach
            @endif
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

           <h4 class="modal-title">Confirmation</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

           <p>Are you sure, you want to delete this user?</p>

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

});</script>



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


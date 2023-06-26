@extends('coach.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-12 mb-3 mb-xl-0">
        <h3 class="font-weight-bold text-white">Order</h3>
      </div>
      <div class="col-md-12 grid-margin w-100">
         <div class="row">
            <div class="form-group col-lg-12  table-responsive">
               <table id="order-table" class="table" style="width:100%">
                  <thead class="table-bg">
                     <tr class="text-white">
                        <th>Date (Your Local Time)</th>
                        <th>Meeting Date</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>View</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if(count($bookings) > 0)
                     @php $i = 1; @endphp
                     @foreach($bookings as $booking)
                     <tr>
                      @php
                      $user_timezone = Auth::user()->timezone;
                      $datetime = new DateTime($booking->created_at);
                      $la_time = new DateTimeZone($user_timezone);
                      $datetime->setTimezone($la_time);
                      $ttn_user =  $datetime->format('Y-m-d H:i:s');
                      @endphp
                     
                        <td>{{ $ttn_user }}</td>
                        <td style="display:none">{{ $i }}</td>
                        <td>@if(!empty($booking->meeting_date)){{ $booking->meeting_date }}@else Not Decided @endif</td>
                        <td>@if(!empty($booking->user_details->name)){{ ucfirst($booking->user_details->name) }}@endif</td>
                        <td><button type="button" class="btn btn-info px-3 py-2 btn-icon-text">
                           <i class="mdi mdi-marker-check"></i> {{ $booking->status }} </button>
                        </td>
                        @php $ide = Crypt::encrypt($booking->id); @endphp
                        <td><a href="{{ route('coach-booking-view', $ide) }}" class="btn btn-primary btn-icon-text px-3 py-2">
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
<!-- content-wrapper ends -->
@endsection
@section('scripts')  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
   
   $('#order-table').DataTable();
   
   });
   
</script>
<script>
   $(document).ready(function(){
   
     $('[data-toggle="tooltip"]').tooltip();   
   
   });
   
</script>
@endsection
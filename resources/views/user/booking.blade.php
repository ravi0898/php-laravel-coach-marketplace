@extends('user.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12">
         <div class="col-12 mb-0 mb-sm-4 mb-xl-0">
            <h3 class="font-weight-bold text-white mb-4">Bookings</h3>
         </div>
      </div>
      <div class="col-md-12 grid-margin w-100">
        <div class="row d-none d-md-block">
          <div class="form-group col-lg-12  table-responsive">
              <table id="order-table" class="table" style="width:100%">
                <thead class="table-bg">
                    <tr class="text-white">
                      <th>Booking Date (Your Local Time)</th>
                      <th>Meeting Date</th>
                      <th>Advisor</th>
                      <th>Status</th>
                      <th>View</th>
                      @if(count($bookings) > 0)
                      @foreach($bookings as $booking)
                      @if($booking->status == 'Pending')
                      <th>Pay</th>
                      @endif
                      @endforeach
                      @endif
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
                      <td>@if(!empty($booking->meeting_date)){{ $booking->meeting_date }}@else Not Decided @endif</td>
                      <td>@if(!empty($booking->coach_details->name)){{ ucfirst($booking->coach_details->name) }}@endif</td>
                      <td><button type="button" class="btn btn-info px-3 py-2 btn-icon-text">
                          <i class="mdi mdi-marker-check"></i> {{ $booking->status }} </button>
                      </td>
                      @php $ide = Crypt::encrypt($booking->id); @endphp
                      
                      <td><a href="{{ route('user-booking-view', $ide) }}" class="btn btn-primary btn-icon-text px-3 py-2">
                          <i class="mdi mdi-eye btn-icon-prepend"></i> View </a>
                      </td>
                      @if($booking->status == 'Pending')
                      <td><a href="{{ route('stripe-pay', $ide) }}" class="btn btn-primary btn-icon-text px-3 py-2">
                          Pay to schedule meeting </a>
                      </td>
                      @endif
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @endif
                </tbody>
              </table>
          </div>
        </div>
        <div class="row d-block d-md-none">
          <div class="form-group col-lg-12  table-responsive">
              <table id="order-table" class="table" style="width:100%">
                <thead class="table-bg text-white">
                    <!-- <tr class="text-white"> -->
                      <th>View</th>
                      @if(count($bookings) > 0)
                      @foreach($bookings as $booking)
                      @if($booking->status == 'Pending')
                      <th>Pay</th>
                      @endif
                      @endforeach
                      @endif      
                    <!-- </tr> -->
                      <th>Status</th>
                      <th>Advisor</th>
                      <th>Date</th>
                      <th>Meeting Date</th>
                </thead>
                <tbody>
                    @if(count($bookings) > 0)
                    @php $i = 1; @endphp
                    @foreach($bookings as $booking)
                    <tr>
                      
                      <td><a href="{{ route('user-booking-view', $ide) }}" class="btn btn-primary btn-icon-text px-3 py-2">
                          <i class="mdi mdi-eye btn-icon-prepend"></i> View </a>
                      </td>
                      
                      @if($booking->status == 'Pending')
                      <td><a href="{{ route('stripe-pay', $ide) }}" class="btn btn-primary btn-icon-text px-3 py-2">
                          Pay to schedule meeting </a>
                      </td>
                      @endif

                      <td><button type="button" class="btn btn-info px-3 py-2 btn-icon-text">
                          <i class="mdi mdi-marker-check"></i> {{ $booking->status }} </button>
                      </td>

                      <td>@if(!empty($booking->coach_details->name)){{ ucfirst($booking->coach_details->name) }}@endif</td>
                      
                      @php $ide = Crypt::encrypt($booking->id); @endphp
                      
                      <td>{{ $booking->created_at }}</td>

                      <td>@if(!empty($booking->meeting_date)){{ $booking->meeting_date }}@else Not Decided @endif</td>

                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @endif
                </tbody>
              </table>
          </div>
        </div
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
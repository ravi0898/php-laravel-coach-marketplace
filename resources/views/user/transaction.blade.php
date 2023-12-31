@extends('user.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12">
         <div class="col-12 mb-xl-0">
            <h3 class="font-weight-bold text-white mb-0 mb-sm-4">Transactions</h3>
         </div>
      </div>
      <!-- <div class="alert alert-dismissible fade show col-lg-12 mx-auto" role="alert" style="background:#222222">
         <div class="row align-items-center">
            <div class="col-md-4">  <img class="img-fluid p-4" src="{{ URL::asset('assets/media/donation.png') }}"> </div>
            <div class="col-md-8">
               <h3 class="font-weight-bold pt-3 text-white">Transactions & Donations</h3>
               <p class="pt-2 text-white"> This is an overview of your transactions generated based on bookings. You can choose whether you want to pay out the money to yourself or  donate it to a charity in the right side of the transaction bar below. Please notice: You can not a payout of less than US $100, so please make sure your account holds more than US $100 when requesting to make a payout.
               Zentia will execute payouts and donations via PauPal or Stripe within 7 business days.</p>
            </div>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
      </div> -->
      <div class="col-md-12 grid-margin w-100">
         <div class="row">
            <div class="form-group col-lg-12 table-responsive">
               <table id="transaction-table" class="table" style="width:100%">
                  <thead>
                     <tr class="text-white">
                        <th>Sr.No.</th>
                        <th>Date (Your Local Time)</th>
                        <th>Transaction Id</th>
                        <th>Advisor</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if(count($transaction) > 0)
                     @php $i = 1;  @endphp
                     @foreach($transaction as $transactionList)
                     @php
                     $price        = $transactionList->paid_amount;
                     $token_trans  = $transactionList->tran_token;
                     $ide  = $transactionList->id;
                     $implodes =  explode(',', $price);
                     $token_one =  explode(',', $token_trans);
                     @endphp
                     @if($transactionList->status == 'Scheduled' || $transactionList->status == 'Done')
                     <tr>
                        <td>{{ $i }}</td>
                        @php
                         $user_timezone = Auth::user()->timezone;
                         $datetime = new DateTime($transactionList->created_at);
                         $la_time = new DateTimeZone($user_timezone);
                         $datetime->setTimezone($la_time);
                         $ttn_user =  $datetime->format('Y-m-d H:i:s');
                        @endphp
                        <td>{{ $ttn_user }}</td>
                        <td>{{ $transactionList->order_id }}</td>
                        <td>@if(!empty($transactionList->coach_details->name)){{ ucfirst($transactionList->coach_details->name) }}@endif
                        </td>
                        <td>{{ array_sum($implodes) }} {{ $transactionList->paid_currency }}</td>
                        <td>
                           @if($transactionList->status == 'Scheduled' || $transactionList->status == 'Done')  
                           <button type="button" class="btn btn-success px-3 py-2 btn-icon-text">
                           <i class="mdi mdi-marker-check"></i> Paid </button>
                           @else
                           <button type="button" class="btn btn-info px-3 py-2 btn-icon-text">
                           <i class="mdi mdi-marker-check"></i> {{ $transactionList->status }} </button>
                           @endif
                        </td>
                        <td>
                           <div class="dropdown">
                              <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                                 @php $id = Crypt::encrypt($ide); @endphp
                                 <a class="dropdown-item" href="{{ route('user-transactionView', $id) }}">View </a>
                                 <a class="dropdown-item" href="{{ route('user-invoice', $id) }}">invoice </a>
                              </div>
                           </div>
                        </td>
                     </tr>
                     @php $i++; @endphp
                     @endif
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
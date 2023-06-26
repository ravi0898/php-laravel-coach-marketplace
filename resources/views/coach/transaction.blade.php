@extends('coach.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 mb-0 mb-sm-4">
         <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold text-white">Transaction</h3>
         </div>
      </div>
      <div class="alert alert-dismissible fade show col-lg-12 mx-auto" role="alert" style="background:#222222">
         <div class="row align-items-center">
            <div class="col-md-3 text-center text-sm-left">  <img class="img-fluid p-4 coach-transaction-img d-none d-sm-block" src="{{ URL::asset('assets/media/donation.png') }}"> </div> 
            <div class="col-md-9">
               <h3 class="font-weight-bold pt-5 pt-sm-3 text-white">Transactions & Donations</h3>
               <p class="pt-2 text-white">This is an overview of your transactions generated based on bookings. You can choose whether you want to pay out the money or donate it to charity in the right side of each transaction bar below.
               Please notice: You can not request a payout of less than US $100, so please make sure your account holds more than US $100 before making a request. Zentia will execute payouts via PayPal or Stripe, within 7 business days.</p>
            </div>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
      </div>
      <div class="col-md-12 grid-margin w-100">
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
                      <th>Date (Your Local Time)</th>
                      <th>Transaction Id</th>
                      <th>User</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Check</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($transactions) > 0)
                    @php $i = 1;  @endphp
                    @foreach($transactions as $transactionList)
                    @php
                    $price        = $transactionList->paid_amount;
                    $token_trans  = $transactionList->tran_token;
                    $ide  = $transactionList->id;
                    $implodes    =  explode(',', $price);
                    $totalAmount =  array_sum($implodes);
                    $token_one   =  explode(',', $token_trans);
                    @endphp
                    @if($transactionList->status == 'Done')
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
                      <td>@if(!empty($transactionList->user_details->name)){{ ucfirst($transactionList->user_details->name) }}@endif
                      </td>
                      <td>{{ $totalAmount }} {{ $transactionList->paid_currency }}</td>
                      <td>
                          @if($transactionList->status == 'Done' && $transactionList->pay_status == '0')  
                          <a href="#" class="btn btn-warning px-3 py-2 btn-icon-text">
                          <i class="mdi mdi-marker-check"></i>Pending </a>
                          @else
                          @if($transactionList->status == 'Done' && $transactionList->pay_status == 'Reject')  
                          <a href="#" class="btn btn-danger px-3 py-2 btn-icon-text">
                          <i class="mdi mdi-marker-check"></i>
                            {{ $transactionList->pay_status }}</a>
                          @else
                          <a href="#" class="btn btn-success px-3 py-2 btn-icon-text">
                          <i class="mdi mdi-marker-check"></i>@if($transactionList->pay_status == 'Donet') Donate @else {{ $transactionList->pay_status }} @endif</a>
                          @endif
                          @endif
                      </td>
                      <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                                @php $id = Crypt::encrypt($ide); @endphp
                                <a class="dropdown-item" href="{{ route('coach-transactionView', $id) }}">View </a>
                                <a class="dropdown-item" href="{{ route('coach-invoice', $id) }}">Invoice </a>
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
<script type="text/javascript">
   $(document).ready(function () {
   
   $('#transaction-table').DataTable();
   
   });
</script>
@endsection
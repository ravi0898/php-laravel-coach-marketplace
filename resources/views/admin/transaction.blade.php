@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">

      <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="col-12 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold text-white">Transaction</h3>
                  <h6 class="font-weight-normal mb-0 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
                </div>
             </div>

            

                <div class="alert alert-dismissible fade show col-lg-12 mx-auto" role="alert" style="background:#222222">

                  <div class="row">

                   <div class="col-md-4 grid-margin">  <img class="img-fluid" src="{{ URL::asset('theme/images/donation.png') }}"> </div>
                   <div class="col-md-8 grid-margin">
                   
                   <h3 class="font-weight-bold pt-3 text-white">Donation</h3>
               
                   <p class="pt-2 text-white"> <strong>Lorem Ipsum</strong> has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining <strong>essentially</strong> unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                   
                  </div>  
          
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                </div>
                
              

    


            <div class="col-md-12 grid-margin w-100">
              <div class="">
                <div class="">
                  <div class="row">

                    <div class="form-group col-lg-12 table-responsive">

                      <table id="transaction-table" class="table" style="width:100%">
                        <thead>
                             <tr class="text-white">
                                <th>Sr.No.</th>
                                <th>Date</th>
                                <th>Transaction Id</th>
                                <th>User</th>
                                <th>Advisor</th>
                                <th>Amount</th>
                                <th>User Payment Status</th>
                                <th>Coach Payment Status</th>
                                
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
                            $ide          = $transactionList->id;
                            
                          
                            
                            $implodes =  explode(',', $price);
                            $token_one =  explode(',', $token_trans);
                            @endphp
                            
                            @if($transactionList->status == 'Scheduled' || $transactionList->status == 'Done')
            
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $transactionList->created_at }}</td>
                                <td>{{ $transactionList->order_id }}</td>
                                <td>@if(!empty($transactionList->user_details->name)){{ $transactionList->user_details->name }}@endif</td>
                                <td>@if(!empty($transactionList->coach_details->name)){{ $transactionList->coach_details->name }}@endif</td>
                                
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
                                
                                @if($transactionList->status == 'Done' && $transactionList->pay_status == 'Request')
                                
                                <button type="button" class="btn btn-info px-3 py-2 btn-icon-text">
                                     <i class="mdi mdi-marker-check"></i> {{ $transactionList->pay_status }} </button>
                                     
                                     
                                @elseif($transactionList->status == 'Done' && $transactionList->pay_status == 'Donet')
                                
                                <button type="button" class="btn btn-danger px-3 py-2 btn-icon-text">
                                     <i class="mdi mdi-marker-check"></i> {{ $transactionList->pay_status }} </button>
                                     
                                     
                                 @elseif($transactionList->status == 'Done' && $transactionList->pay_status == 'Approved')
                                
                                <button type="button" class="btn btn-success px-3 py-2 btn-icon-text">
                                     <i class="mdi mdi-marker-check"></i> {{ $transactionList->pay_status }} </button>
                                     
                                     
                                 @elseif($transactionList->status == 'Done' && $transactionList->pay_status == 'Reject')
                                
                                <button type="button" class="btn btn-danger px-3 py-2 btn-icon-text">
                                     <i class="mdi mdi-marker-check"></i> {{ $transactionList->pay_status }} </button>
                                     
                                  
                                 @else
                                
                                <button type="button" class="btn btn-warning px-3 py-2 btn-icon-text">
                                     <i class="mdi mdi-marker-check"></i> Pending </button>
                                 @endif
                                
                                </td>
                               
                               
                
                                <td>
                                  <div class="dropdown">
                                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                                            @php $id = Crypt::encrypt($ide); @endphp

                                           <a class="dropdown-item" href="{{ route('admin-transactionView', $id) }}">View </a>
                                           <a class="dropdown-item" href="{{ route('admin-invoice', $id) }}">Invoice </a>
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

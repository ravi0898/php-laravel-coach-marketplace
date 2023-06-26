@extends('admin.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">

@if (Session::has('success'))

    <div class="alert alert-success text-center">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

        <p>{{ Session::get('success') }}</p>

    </div>

@endif
                    
@php $price = explode(",",$transationView->paid_amount); @endphp

@php $min = explode("/",$transationView->price); @endphp


<div class="mb-4">

    <h4 class="font-weight-bold session-heading">Your session details are given below</h4>
    <div class="session-detail-wrap">
        <p>Amount of session: <span> ${{ array_sum($price) }}</span></p>
        <p>Date/Time of session: <span> {{  $transationView->meeting_date }} / {{  $transationView->meeting_time }}</span></p>  
    </div>
   </div>
   
   
   <div class="mb-4">

    <h4 class="font-weight-bold session-heading">Account Information</h4>
    <div class="row">
    <div class="col-md-3">
        <p class="text-white">Bank Holder Name</p>
        <p class="text-white"> {{ $coach->bank_holder_name  }}</p> 
        
    </div>
    
    <div class="col-md-3">
        <p class="text-white">IBAN</p>
        <p class="text-white">{{ $coach->iban_number  }}</p> 
        
    </div>
    
    
    <div class="col-md-3">
        <p class="text-white">Swift code</p>
        <p class="text-white">{{ $coach->swift_code  }}</p> 
        
    </div>
    
    <div class="col-md-3">
        <p class="text-white">Country</p>
        <p class="text-white">{{ $coach->bank_country  }}</p> 
        
    </div>
         
    </div>
   </div>
   
   
 
 @if($transationView->status == 'Done' && $transationView->pay_status == 'Request')
 
 <div class="mb-4">

    <h4 class="font-weight-bold session-heading">Withdrawal Request</h4>
    <form method="POST" action="{{ route('admin-req-approval') }}">
    @csrf
        
    
    <div class="row">
   
    <div class="col-md-6">
       <spam class="text-white">Enter Note</spam>
       <textarea name="note" class="form-control form-control-lg text-white" placeholder="Enter Note">{{ old('note') }}</textarea>
       <div id="name_error" style="color:red">{{ $errors->first('note') }}</div>

    </div>
    
                   
    <div class="col-md-6">
        <spam class="text-white">Select Status</spam>
        <select name="status" class="form-control form-control-lg text-white">
            <option class="text-dark" value="">Select</option>
            <option class="text-dark" value="Approved" {{ old('status') == 'Approved' ? "selected" : "" }}>Approved</option>
            <option class="text-dark" value="Reject" {{ old('status') == 'Reject' ? "selected" : "" }}>Reject</option>
        </select>
        <div id="name_error" style="color:red">{{ $errors->first('status') }}</div>

        

    </div>
    
    <div class="col-md-6">
        <input type="hidden" name="ide" value="{{ $transationView->id }}"> 
        <button type="submit" class="btn btn-success px-3 py-2 btn-icon-text">Submit </button>

    </div>
    </div>
    
    </form>
    
    
   </div>
   
  @endif
   
   
                                   



<div class="col-md-12 grid-margin w-100">
              <div class="">
                <div class="">
                  <div class="row">

                    <div class="form-group col-lg-12 table-responsive">

                      <table id="transaction-table" class="table" style="width:100%">
                        <thead>
                             <tr class="text-white">
                               
                                <th>Transation Id</th>
                                <th>Price</th>
                             </tr>
                        </thead>
                        <tbody>
                     
                            @php
                            $price        = $transationView->paid_amount;
                            $token_trans  = $transationView->paid_session;
                            
                            
                            $implodes  =  explode(',', $price);
                            $token_one =  explode(',', $token_trans);
                            
                            @endphp
                            
                            
                            @foreach($implodes as $key => $value)
            
                            <tr>
                                
                                <td>{{ $token_one[$key] }} Minutes</td>
                                <td>${{ $value }}</td>
                                
                            </tr>
                            
                            @endforeach
                            
                           
                            

           
                        </tbody>
                       
                    </table>
                                      
                    </div>
                    </div>
                  </div>
                </div>

                
              </div>

 




@endsection
@section('scripts')  
@endsection

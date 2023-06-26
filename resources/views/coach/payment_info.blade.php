@extends('coach.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">
 
   @if($message = Session::get('success_done'))
   <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
      <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   @if($message = Session::get('error_done'))
   <div class="alert alert-danger alert-dismissible fade show col-lg-8 mx-auto" role="alert">
      <strong> <i class="mdi mdi-thumb-up-outline"></i> {{ $message }}</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif 

   <div class="row">
      <div class="col-md-12 grid-margin">
         <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold text-white">Payment Info</h3>
            <p class="font-weight-normal mb-0 text-white">Please enter your bank account details, for the account you wish to receive your earnings in.</p>
         </div>
      </div>
   </div>

   <form action="{{route('coach-update-payment-info' )}}" id="editform2" method="post">
      {{ csrf_field() }}

      <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-12 pt-3">
                        <h3 class="text-white mb-4 text-main">Billing Details</h3>
                     </div>
                     <div class="form-group col-lg-6">
                        <label>Bank Holder Name</label>
                        <input type="text" class="form-control form-control-lg" name="bank_holder_name" value="@if(!empty($user->bank_holder_name)){{old('bank_holder_name', $user->bank_holder_name)}}@else{{ old('bank_holder_name') }}@endif" id="bank_holder_name" placeholder="" maxlength="30" >
                     <div  style="color:red">{{ $errors->first('bank_holder_name') }}</div>
                     </div>
                     <div class="form-group col-lg-6">
                        <label>IBAN</label>
                        <input type="text" class="form-control form-control-lg" name="iban_number" value="@if(!empty($user->iban_number)){{old('iban_number', $user->iban_number)}}@else{{ old('iban_number') }}@endif" id="iban_number" placeholder="" maxlength="30" >
                        <div  style="color:red">{{ $errors->first('iban_number') }}</div>
                     </div>
                   
                     <div class="form-group col-lg-6">
                        <label>Swift code</label>
                        <input type="text" class="form-control form-control-lg" name="swift_code" value="@if(!empty($user->swift_code)){{old('swift_code', $user->swift_code)}}@else{{ old('swift_code') }}@endif" id="swift_code" placeholder="" maxlength="30" >
                        <div  style="color:red">{{ $errors->first('swift_code') }}</div>
                     </div>
                     <div class="form-group col-lg-6">
                        <label>Country</label>
                        <input type="text" class="form-control form-control-lg" name="bank_country" value="@if(!empty($user->bank_country)){{old('bank_country', $user->bank_country)}}@else{{ old('bank_country') }}@endif" id="bank_country" placeholder="" maxlength="50" >
                     <div  style="color:red">{{ $errors->first('bank_country') }}</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="form-group col-lg-12 mt-2 text-center">

         <button  type="submit"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Save Changes</button>

      </div>

   </form>
</div>
<!-- content-wrapper ends -->
@endsection
@section('scripts')  
   
@endsection

@extends('user.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper user-padding">

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
        @php
         $user_timezone = Auth::user()->timezone;
         $datetime = new DateTime($transationView->meeting_start_time);
         $la_time = new DateTimeZone($user_timezone);
         $datetime->setTimezone($la_time);
         $ttn_user =  $datetime->format('Y-m-d H:i:s');
        @endphp
        <p>Your Local Date/Time of session: <span> {{  $ttn_user }}</span></p>  
    </div>
</div>
<div class="col-md-12 grid-margin w-100">
    <div class="row">
      <div class="form-group col-lg-9 m-auto transaction-table-wrapper table-responsive">
        <table id="transaction-table" class="table" style="width:100%">
          <thead class="table-bg">
                <tr class="text-white">
                  
                  <th>Session</th>
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
                  
                  <td style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">{{ $token_one[$key] }} Minutes</td>
                  <td>${{ $value }}</td>
                  
              </tr>
              
              @endforeach
              
          </tbody>
        </table>       
      </div>
    </div>
</div>
@endsection
@section('scripts')  
       <!--=======Js========-->



        <!-----Tiny Editer----->

        <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>

          <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>

          <script src="{{ URL::asset('theme/js/intlTelInput.js') }}"></script>

          <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>

        <!-----Tiny Editer----->

@endsection

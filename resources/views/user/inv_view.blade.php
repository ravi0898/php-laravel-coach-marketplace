@extends('user.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper card-padding">

@if (Session::has('success'))

    <div class="alert alert-success text-center">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

        <p>{{ Session::get('success') }}</p>

    </div>

@endif
                    

    <div class="container">
        <div class="invoice-wrap my-5">
            <img src="{{ asset('assets/media/wave1.png') }}" alt="" class="invoice-bg-img">
            <div class="invoice-content">
                <h1 class="text-black invoice-logo mb-4">ZENTIA</h1>
                <div class="row mb-4 mb-sm-5">
                    <div class="col-md-6 mt-4">
                        <div class="invoice-coach-detail">
                            <h5 class="text-main roboto text-capitalize mb-3">
                                <span class="invoice-title">Name -</span>
                                <span class="text-dark">{{ $coach->name }}</span>
                            </h5>
                            
                             <h5 class="text-main roboto text-capitalize mb-3">
                                <span class="invoice-title">Email - </span>
                                <span class="text-dark">{{ $coach->email }}</span>
                            </h5>
                            
                            <h5 class="text-main roboto text-capitalize mb-3">
                                <span class="invoice-title">Contact - </span>
                                <span class="text-dark">+{{ $coach->country_code }} {{ $coach->phone }}</span>
                            </h5>
                            
                            <h5 class="text-main roboto text-capitalize mb-0">
                                <span class="invoice-title">Country -</span> 
                                 
                                 @if(count($country) > 0)
                                 @foreach($country as $countries)
                                 @if ($coach->country == $countries->id)
                                 <label class="text-dark">{{ $countries->nicename }}</label>
                                 
                                 @endif
                                 @endforeach
                                 @endif
                     
                                
                            </h5>
                           
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-zentia mb-4 mb-sm-5">
                            <h3 class="coach-name roboto text-main mb-3">About Zentia</h3>
                            <p class="roboto text-white">Receive advice from the #1 most accomplished and experienced entrepreneurs and executives.</p>
                            <p class="roboto text-white">Zentia Inc.<br>
                            8 The Green, Ste R,<br>
                            Dover County of Kent, 19901<br>
                            Delaware</p>
                        </div>
                        <div class="invoice-id">
                            <h3 class="text-dark roboto fw-700 mb-0">Invoice ID -</h3>
                            <span class="roboto fs-20"> {{ $transationView->order_id }}</span>
                        </div>
                        @php
                        $dateinv = explode(' ' , $transationView->created_at) ;
                        @endphp
                        <div class="invoice-id">
                            <h3 class="text-dark roboto fw-700 mb-0">Invoice Date -</h3>
                            <span class="roboto fs-20"> {{ $dateinv[0] }}</span>
                        </div>
                    </div>
                </div>
                <div class="invoice-table-wrap table-responsive mb-5">
                    <table class="table roboto mb-0">
                        <thead class="invoice-table-head">
                            <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Meeting With</th>
                            <th scope="col">Time & Date</th>
                            <th scope="col">Session</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="invoice-table-body">
                           
                            @php
                           
                            $price        = $transationView->paid_amount;
                            $token_trans  = $transationView->tran_token;
                            
                            
                            $meeting_min  = $transationView->price;
                            $ide          = $transationView->id;
                            
                            $implodes  =  explode(',', $price);
                            $token_one =  explode(',', $token_trans);
                           
                            $paid_session = $transationView->paid_session;
                            $time_session =  explode(',', $paid_session);
                            
                            $mintime  =  explode('/', $meeting_min);
                            $miting_time_minute = $mintime[1];
                            
                            
                            $i = 1;
                            @endphp
                            @foreach($implodes as $key => $value)
                            
                            <tr>
                                <td scope="row">{{ $i }}</td>
                                <td>@if(!empty($transationView->coach_details->name)){{ ucfirst($transationView->coach_details->name) }}@endif</td>
                                <td>{{ $transationView->meeting_time }} - {{ $transationView->meeting_date }}</td>
                                <td>{{ $time_session[$key] }} Min.</td>
                                <td>{{ $token_one[$key] }}</td>
                                <td>${{ $value }} </td>
                            </tr>
                           @php $i++; @endphp
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="total-amount">
                    <h5 class="roboto mb-0 total-btn">Total Amount</h5>
                    <h5 class="roboto mb-0">${{ array_sum($implodes) }}</h5>
                </div>
            </div>
            <img src="{{ asset('assets/media/wave-bottom.png') }}" alt="" class="invoice-bg-img invoice-bottom-bg">
        </div>
    </div>




@endsection
@section('scripts')  
@endsection

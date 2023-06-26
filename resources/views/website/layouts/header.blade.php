<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Zentia</title>
      <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('assets/css/swiper-bundle.min.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('assets/css/style.min.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.min.css') }}">
   </head>
   <body>
      <!-- Header Start -->
      <header class="bg-blcak">
         <div class="container-fluid">
            <div class="header-wrap">
               <div class="logo-wrap">
                  <a href="{{url('/')}}"><img src="{{ URL::asset('assets/media/zentia-logo1.png') }}" alt=""></a>
               </div>
               <nav class="head-nav exo">
                  <ul class="nav-ul">
                     <li class="nav-li">
                        <a href="{{ route('discover') }}" class="nav-items {{Route::currentRouteNamed('discover') ? 'active' : ''}}"> Discover Advisors</a>
                     </li>
                     <li class="nav-li">
                        <a href="{{ route('about') }}" class="nav-items {{Route::currentRouteNamed('about') ? 'active' : ''}}">About</a>
                     </li>
                     <li class="nav-li">
                        <a href="{{ route('for-business') }}" class="nav-items {{Route::currentRouteNamed('for-business') ? 'active' : ''}}">For Business</a>
                     </li>
                     @php
                     if(Auth::check()){
                     $role = Auth::user()->role; 
                     if($role == 'coach'){
                     }else{
                     @endphp
                     <li class="nav-li">
                        <a href="{{ route('become-an-advisor') }}" class="nav-items  {{Route::currentRouteNamed('become-an-advisor') ? 'active' : ''}}">Become an Advisor</a>
                     </li>
                     @php
                     }
                     }else{
                     @endphp
                     <li class="nav-li">
                        <a href="{{ route('become-an-advisor') }}" class="nav-items {{Route::currentRouteNamed('become-an-advisor') ? 'active' : ''}}">Become an Advisor</a>
                     </li>
                     @php
                     }
                     @endphp 
                     <li class="nav-li">
                        <div class="header-signup-dropmenu">
                           <div class="dropdown">
                              @if (Route::has('login'))
                              @auth
                              @php
                              if(Auth::check()){
                              $role = Auth::user()->role; 
                              if($role == 'admin'){
                              @endphp
                              <a href="{{ route('admin-dashboard') }}" class="text-capitalize d-block button-primary border-0">
                              <span><i class="fa fa-user-o me-2" aria-hidden="true"></i>Dashboard</span>
                              </a>
                              @php
                              }else if($role == 'coach'){
                              @endphp
                              <a href="{{ route('coach-dashboard') }}" class="text-capitalize d-block button-primary border-0 fs-14">
                              <span><i class="fa fa-user-o me-2" aria-hidden="true"></i>Dashboard</span>
                              </a>
                              @php
                              }else{
                              @endphp
                              <a href="{{ route('user-dashboard') }}" class="text-capitalize d-block button-primary border-0 fs-14 signup-mobile-btn text-center">
                              <span><i class="fa fa-user-o me-2" aria-hidden="true"></i>Dashboard</span>
                              </a>
                              @php        
                              }}
                              @endphp
                              @else
                              <!--<a href="{{ route('login') }}" style="color:#ff9a7a">Login</a>-->
                              <!--<a href="{{ route('user-register') }}" style="color:#ff9a7a">Register As User</a>-->
                              @if (Route::has('register'))
                              <button type="button" class="text-capitalize button-primary signup-mobile-btn border-0 fs-14" data-bs-toggle="dropdown">
                              <span><i class="fa fa-user-o me-2" aria-hidden="true"></i>sign up/login</span>
                              </button>
                              <ul class="dropdown-menu p-0 bg-transparent signup-drop-menu">
                                 <li>
                                    <a class="dropdown-item dropmenu-item" href="{{ route('user-register') }}">Sign Up as User /Login</a>
                                 </li>
                                 <li class="border-top-main">
                                    <a class="dropdown-item dropmenu-item" href="{{ route('register') }}">Become Advisor/Login</a>
                                 </li>
                              </ul>
                              @endif
                              @endauth
                              @endif
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
               <div class="hamburger">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
               </div>
            </div>
         </div>
      </header>
      <!-- Header End -->
      <!--begin::Content-->
      @yield('content')
      <!--end::Content-->
      <!--=======nev========-->
      <!--begin::Footer-->
      @include('website.layouts.footer')
      <!--=======nev========-->
      <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ URL::asset('assets/js/swiper-bundle.min.js') }}"></script>
      <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ URL::asset('assets/js/ui.min.js') }}"></script>
      <!--=======Js========-->
      <script>
         // function convertTZ(date, tzString) {
         //     return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
         // }
                     
         $('.countdownpp').each(function(){  
             // alert($(this).attr('value'));
             
                 let link = $(this).data("link"); 
                 let timer = $(this).data("timer"); //50min
                 // let curr_time = $(this).data("curr_time"); //50min
                 let id = $(this).data("id"); // 2
                 
             // Set the date we're counting down to
                 var countDownDate = new Date(timer).getTime();
                 
                 // Update the count down every 1 second
                 var x = setInterval(function() {
                 
                   // Get today's date and time
                   var nowd = new Date();
                   var now = new Date((typeof date === "string" ? new Date(nowd) : nowd).toLocaleString("en-US", {timeZone: 'Europe/Brussels'})).getTime();
                     
                     
                     // usage: Asia/Jakarta is GMT+7
                    
                     // alert(now);
                   // Find the distance between now and the count down date
                   var distance = countDownDate - now;
               
                   // Time calculations for days, hours, minutes and seconds
                   var days = Math.floor(distance / (1000 * 60 * 60 * 24))+1;
                   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                 
                 function padLeadingZeros(num, size) {
                     var s = num+"";
                     while (s.length < size) s = "0" + s;
                     return s;
                 }
                 
                   // Display the result in the element with id="demo"
                   document.getElementById(id).innerHTML = '<a href="#"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;"><span class="countdowns text-white bg-danger justify-content-center align-items-center fs-18">'+padLeadingZeros(hours, 2)+':</span><span class="countdowns text-white bg-danger  justify-content-center align-items-center fs-18">'+padLeadingZeros(minutes, 2)+':</span><span class="countdowns text-white bg-danger  justify-content-center align-items-center fs-18">'+padLeadingZeros(seconds, 2)+'</span></a>';
         
                   if (distance < 0) {
                     // clearInterval(x);
                     document.getElementById(id).innerHTML = '<a href="'+link+'" class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;">Join Meeting</a>';
                   }else if(distance > 86400000){
                       document.getElementById(id).innerHTML = '<a href="#"  class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder" id="save-chage" style="border-radius: 5px;"><span class="countdown text-white bg-danger d-flex justify-content-center align-items-center fs-18 mx-0">'+days+' Days</span></a>';
                   }
                   
               
                 }, 1000);
         
         });
         
         
      </script>
      @yield('scripts')
   </body>
</html>
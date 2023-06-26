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
    
    <!-- Header End -->
   
       
        <!--begin::Content-->
        @yield('content')
        <!--end::Content-->


        <!--=======nev========-->
        <!--begin::Footer-->
       
        <!--=======nev========-->

        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/ui.min.js') }}"></script>
        
              <!--=======Js========-->
        
        <script>
   
    </script>
        @yield('scripts')
        
    </body>
</html>

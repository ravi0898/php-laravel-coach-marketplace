<!DOCTYPE html>
<html lang="en">

<head>
  <!--=======Head========-->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zentia</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::asset('theme/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <!-- Custom css -->
  <link rel="stylesheet" href="{{ URL::asset('theme/css/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme/vendors/peity/peity.css') }}">
  <link rel="shortcut icon" href="{{ URL::asset('theme/images/favicon.png') }}" />
  <!--=======Head========-->
</head>


<body class="sidebar-dark bg-black">
  <div class="nev-color px-2 py-2">
    <ul class="nav navbar-nav d-block pt-1">
      <li><a href="{{ route('discover') }}">Discover Advisore</a></li>
    
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('for-business') }}">For Business</a></li>
    </ul>
    <div class="navbar-header ">
      <a class="navbar-brand log-logo" href="{{url('/')}}"><img src="{{ URL::asset('theme/images/zentia-logo1.png') }}"></a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 text-center m-auto d-none d-sm-block">
      <div class="mx-auto my-auto"> <img src="{{ URL::asset('theme/images/zentia-logo1.png') }}" alt="logo"> </div>
    </div>
    <div class="col-lg-6 px-0 custom-color1" style="height: 100vh">
      <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h3 class="font-weight-bold">Change Password</h3>

                <h6 class="">Please Create new Password</h6>
                    
                    <form class="pt-5 mt-5 row" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="col-lg-10 mx-auto">
        
                          <div class="form-group">
        
                          <label>{{ __('E-Mail Address') }}</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          
                            </div>
                            
                            <div class="form-group">
        
                          <label>{{ __('Password') }}</label>
                          <input id="password" type="password" class="form-control pass @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="input-group-append toggle-password">
                                 <span class="input-group-text mdi mdi-eye-outline"></span>
                            </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <div class="form-group">
        
                          <label>{{ __('Confirm Password') }}</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                            </div>
                          
                          
                          
                            </div>
                            
                            <div class="mt-3">
                                <button  class="btn btn-block btn-primary custom-color2 btn-lg font-weight-medium auth-form-btn" type="submit">{{ __('Reset Password') }}</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
    </div>
  </div>
  </div>
  <!-- container-scroller -->
  <!--=======Js========-->
  <script src="{{ URL::asset('theme/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ URL::asset('theme/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ URL::asset('theme/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ URL::asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ URL::asset('theme/js/dataTables.select.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ URL::asset('theme/js/off-canvas.js') }}"></script>
  <script src="{{ URL::asset('theme/js/hoverable-collapse.js') }}"></script>
  <script src="{{ URL::asset('theme/js/template.js') }}"></script>
  <script src="{{ URL::asset('theme/s/settings.js') }}j"></script>
  <script src="{{ URL::asset('theme/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ URL::asset('theme/s/dashboard.js') }}j"></script>
  <script src="{{ URL::asset('theme/js/Chart.roundedBarCharts.js') }}"></script>
  <script src="{{ URL::asset('theme/vendors/select2/select2.min.js') }}"></script>
  <script type="{{ URL::asset('theme/vendors/peity/peity.min.js') }}"></script>
  <script src="{{ URL::asset('theme/js/chart.js') }}"></script>
  <!--=======Js========-->
</body>

</html>
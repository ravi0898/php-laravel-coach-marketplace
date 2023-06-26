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

  <link rel="stylesheet" href="{{ URL::asset('theme/vendors/css/vendor.bundle.base.css') }}">

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

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">

  <link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.min.css') }}">

 <!--=======Head========-->

</head>





<body class="sidebar-dark">

  <div class="container-scroller">

    

    <!--=======nev========-->

      <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-dark">

      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-5" href="{{url('/')}}"><img class="" src="{{ URL::asset('theme/images/zentia-logo3.png') }}" class="mr-2" alt="logo"/></a>

        <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img class="" src="{{ URL::asset('theme/images/zentia-logo3.png') }}" alt="logo"/></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

          <span class="icon-menu"></span>

        </button>

       <!--  <ul class="navbar-nav mr-lg-2">

          <li class="nav-item nav-search d-none d-lg-block">

            <div class="input-group">

              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                <span class="input-group-text" id="search">

                  <i class="icon-search"></i>

                </span>

              </div>

              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">

            </div>

          </li>

        </ul> -->

        @php 
			$notification = DB::table('notification')->orderBy('id','DESC')->limit(50)->get();
			$notification_new = DB::table('notification')->where('admin_status', 'unseen' )->orderBy('id','DESC')->get();
			$notification_old = DB::table('notification')->where('admin_status', 'seen' )->orderBy('id','DESC')->get();
		@endphp
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a  class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              @if(count($notification_new) > 0)
              <span class="count"></span>
              @endif
            </a>
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" style="overflow-y: auto;height: 300px; ">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              
              @foreach($notification as $note)
              @php $id = $note->id; @endphp
              @if($note->admin_status == 'seen')
              <a href="{{ route('change-notification-status-admin', $id) }}" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">{{ $note->notification_msg }}</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    {{ $note->created_at }}
                  </p>
                </div>
              </a>
              @else
              <a href="{{ route('change-notification-status-admin', $id) }}" class="dropdown-item preview-item" style="background-color: #eaeaf1;">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">{{ $note->notification_msg }}</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    {{ $note->created_at }}
                  </p>
                </div>
              </a>
              @endif
              @endforeach
              
            </div>
          </li>

          <li class="nav-item nav-profile dropdown">

            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              @php 

              use App\User;



              $authId = Auth::id();

              $adminProfile = User::where('id',$authId)->first();



              @endphp

              <img src="{{url('').'/'.$adminProfile->profile_photo }}" alt="profile"/>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <a href="{{ route('admin-profile') }}" class="dropdown-item">

                <i class="ti-settings text-primary"></i>

                Profile

              </a>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();

                document.getElementById('logout-form').submit();">

                <i class="ti-power-off text-primary"></i>

                Logout

              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                @csrf

            </form>

            </div>

          </li>

          <!-- <li class="nav-item nav-settings d-none d-lg-flex">

            <a class="nav-link" href="#">

              <i class="icon-ellipsis"></i>

            </a>

          </li> -->

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

          <span class="icon-menu"></span>

        </button>

      </div>

    </nav>

    <!-- partial -->

     <!--=======nev========-->

   

    <div class="container-fluid page-body-wrapper">

      

     <!--=======nev========-->

       <!--begin::Sidebar-->

      @include('admin.layouts.sidebar')

     <!--=======nev========-->



      <div class="main-panel">

        

        <!-- content-wrapper ends -->

       

        <!--begin::Content-->

        @yield('content')

        <!--end::Content-->





        <!--=======nev========-->

        <!--begin::Footer-->

        @include('admin.layouts.footer')

        <!--=======nev========-->



      </div>

      <!-- main-panel ends -->

    </div>   

    <!-- page-body-wrapper ends -->

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

      <script src="{{ URL::asset('theme/js/settings.js') }}"></script>

      <script src="{{ URL::asset('theme/js/todolist.js') }}"></script>

      <!-- endinject -->

      <!-- Custom js for this page-->

      <script src="{{ URL::asset('theme/js/dashboard.js') }}"></script>

      <script src="{{ URL::asset('theme/js/Chart.roundedBarCharts.js') }}"></script>

      <script src="{{ URL::asset('theme/vendors/select2/select2.min.js') }}"></script>

      <script type="{{ URL::asset('theme/vendors/peity/peity.min.js') }}"></script>

      <script src="{{ URL::asset('theme/js/chart.js') }}"></script>

      @yield('scripts')



        <!--=======Js========-->

</body>



</html>




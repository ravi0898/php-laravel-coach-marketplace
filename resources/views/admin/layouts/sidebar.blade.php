  <!-- partial:partials/_sidebar.html -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar">

        <ul class="nav">

          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-dashboard') }}">

              <i class="ti-bar-chart menu-icon"></i>

              <span class="menu-title">Dashboard</span>

            </a>

          </li>


          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-coach-category') }}">

              <i class="icon-head menu-icon"></i>

              <span class="menu-title">Category</span>

            </a>

          </li>



          <li class="nav-item">

            <a class="nav-link collapsed" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">

              <i class="icon-columns menu-icon"></i>

              <span class="menu-title">Master</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="form-elements" style="">

              <ul class="nav flex-column sub-menu">

                <li class="nav-item"><a class="nav-link" href="{{ route('admin-master-category') }}">Master Category</a></li>

                <li class="nav-item"><a class="nav-link" href="{{ route('admin/master-catData') }}">Master Category Data </a></li>

              </ul>

            </div>

          </li>




        @php 
			$notificationu = DB::table('notification')->where('admin_status', 'unseen' )->where('page', 'user' )->orderBy('id','DESC')->get();
		@endphp
          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-users') }}">

              <i class="icon-head menu-icon"></i>

              <span class="menu-title">Users</span>
              @if(count($notificationu) > 0)
               <span class="badge badge-info">@php echo count($notificationu); @endphp</span>
              @endif
            </a>

          </li>

        @php 
			$notificationc = DB::table('notification')->where('admin_status', 'unseen' )->where('page', 'coach' )->orderBy('id','DESC')->get();
		@endphp
          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-coach-list') }}">

              <i class="ti-credit-card menu-icon"></i>

              <span class="menu-title">Coach</span>
             @if(count($notificationc) > 0)
               <span class="badge badge-info">@php echo count($notificationc); @endphp</span>
              @endif
            </a>

          </li>
          
          
          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-faq') }}">

              <i class="ti-credit-card menu-icon"></i>

              <span class="menu-title">FAQ</span>

            </a>

          </li>
          
        @php 
			$notificationb = DB::table('notification')->where('admin_status', 'unseen' )->where('page', 'booking' )->orderBy('id','DESC')->get();
		@endphp
          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-show-booking') }}">

              <i class="ti-credit-card menu-icon"></i>

              <span class="menu-title">Bookings</span>
              @if(count($notificationb) > 0)
               <span class="badge badge-info">@php echo count($notificationb); @endphp</span>
              @endif
            </a>

          </li>
          
          @php 
			$notificationt = DB::table('notification')->where('admin_status', 'unseen' )->where('page', 'transaction' )->orderBy('id','DESC')->get();
		  @endphp 
          <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-transaction') }}">

              <i class="ti-credit-card menu-icon"></i>

              <span class="menu-title">Transaction</span>
               @if(count($notificationt) > 0)
                 <span class="badge badge-info">@php echo count($notificationt); @endphp</span>
               @endif
            </a>

          </li>
          
          
          
        
           <!-- <li class="nav-item">

            <a class="nav-link" href="{{ route('admin-profile') }}">

              <i class="icon-head menu-icon"></i>

              <span class="menu-title">Profile</span>

            </a>

          </li> -->



          



           <!-- <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"

             onclick="event.preventDefault();

                           document.getElementById('logout-form').submit();">

              <i class="mdi mdi-logout menu-icon"></i>

              <span class="menu-title">Sign Out</span>

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                @csrf

            </form>



          </li> -->



          <!--  -->






          <!-- <li class="nav-item">

            <a class="nav-link" href="order.php">

              <i class="mdi mdi-wallet-giftcard menu-icon"></i>

              <span class="menu-title">Booking</span> <span class="badge badge-info">5</span>

            </a>

          </li>



          <li class="nav-item">

            <a class="nav-link" href="transaction.php">

              <i class="ti-heart menu-icon"></i>

              <span class="menu-title">Transaction</span> <span class="badge badge-info">2</span>

            </a>

          </li>



            <li class="nav-item">

            <a class="nav-link" href="profile.php">

              <i class="icon-head menu-icon"></i>

              <span class="menu-title">Profile</span>

            </a>

          </li>





            <li class="nav-item">

            <a class="nav-link" href="calendar.php">

              <i class="ti-calendar menu-icon"></i>

              <span class="menu-title">Calendar</span>

            </a>

          </li>



          <li class="nav-item">

            <a class="nav-link" href="payment-info.php">

              <i class="ti-credit-card menu-icon"></i>

              <span class="menu-title">Payment Info</span>

            </a>

          </li>





            <li class="nav-item">

            <a class="nav-link" href="faq.php">

              <i class="ti-comment-alt menu-icon"></i>

              <span class="menu-title">Faq</span>

            </a>

          </li> -->


        </ul>

      </nav>

      <!-- partial -->
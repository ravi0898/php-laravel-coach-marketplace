      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user-dashboard') }}">
              <i class="ti-bar-chart menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="{{ route('user-profile') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
           
          @php 
			$notificationt = DB::table('notification')->where('user_id', Auth::user()->id )->where('status', 'unseen' )->where('page', 'transaction' )->orderBy('id','DESC')->get();
		  @endphp 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user-transaction') }}">
              <i class="ti-heart menu-icon"></i>
              <span class="menu-title">Transaction</span> 
               @if(count($notificationt) > 0)
                 <span class="badge badge-info">@php echo count($notificationt); @endphp</span>
               @endif
            </a>
          </li>
          
           @php 
				$notificationb = DB::table('notification')->where('user_id', Auth::user()->id )->where('status', 'unseen' )->where('page', 'booking' )->orderBy('id','DESC')->get();
			@endphp
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user-booking') }}">
              <i class="ti-heart menu-icon"></i>
              <span class="menu-title">Booking</span> 
              @if(count($notificationb) > 0)
               <span class="badge badge-info">@php echo count($notificationb); @endphp</span>
              @endif
            </a>
          </li>

           
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user-faq') }}">
              <i class="ti-comment-alt menu-icon"></i>
              <span class="menu-title">Faq</span>
            </a>
          </li>

          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="{{ route('logout') }}"-->
          <!--                             onclick="event.preventDefault();-->
          <!--                                           document.getElementById('logout-form').submit();">-->
          <!--    <i class="mdi mdi-logout menu-icon"></i>-->
          <!--    <span class="menu-title">Sign Out</span>-->
          <!--  </a>-->
          <!--  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">-->
          <!--      @csrf-->
          <!--  </form>-->

          <!--</li>-->
        </ul>
      </nav>
      <!-- partial -->
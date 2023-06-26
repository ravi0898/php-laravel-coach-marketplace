        @php 
			$status = DB::table('users')->where('id', Auth::user()->id )->where('status','2')->first();
			$user = DB::table('users')->where('id', Auth::user()->id )->first();
		@endphp
     
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
         
         @if(!empty($status))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('coach-dashboard') }}">
              <i class="ti-bar-chart menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @else
          <li class="disable-link">
             <div class="d-flex align-items-center">
                 <i class="ti-heart menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </div>
                 <i class="ti-lock menu-icon mr-0"></i>
                
            </li>
          @endif
          
           <li class="nav-item">
            <a class="nav-link" href="{{ route('coach-profile') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profile</span>
              @if($user->status == '1' &&  empty($user->price_20) && empty($user->expertise) && empty($user->about_me))
              <span class="badge badge-info">-</span>
              @endif
            </a>
          </li>
            
            <li class="nav-item">
            <a class="nav-link" href="{{ route('coach-calender') }}">
              <i class="ti-calendar menu-icon"></i>
              <span class="menu-title">Calendar</span>
              @if($user->status == '1' && empty($user->available_slots))
              <span class="badge badge-info">-</span>
              @endif
            </a>
          </li>

          
			@if(!empty($status))
			
			<li class="nav-item">
                <a class="nav-link" href="{{ route('coach-payment-info') }}">
                  <i class="ti-credit-card menu-icon"></i>
                  <span class="menu-title">Bank Info</span>
                </a>
            </li>
            @php 
				$notificationt = DB::table('notification')->where('user_id', Auth::user()->id )->where('status', 'unseen' )->where('page', 'transaction' )->orderBy('id','DESC')->get();
			@endphp
			<li class="nav-item">
                <a class="nav-link" href="{{ route('coach-transaction') }}">
                  <i class="ti-heart menu-icon"></i>
                  <span class="menu-title">Transactions</span> 
                  @if(count($notificationt) > 0)
                  <span class="badge badge-info">@php echo count($notificationt); @endphp</span>
                  @endif
                </a>
            </li>
            
            @php 
				$notificationb = DB::table('notification')->where('user_id', Auth::user()->id )->where('status', 'unseen' )->where('page', 'booking' )->orderBy('id','DESC')->get();
			@endphp
			<li class="nav-item">
                <a class="nav-link" href="{{ route('coach-booking') }}">
                  <i class="ti-heart menu-icon"></i>
                  <span class="menu-title">Bookings</span>
                   @if(count($notificationb) > 0)
                   <span class="badge badge-info">@php echo count($notificationb); @endphp</span>
                  @endif
                </a>
            </li>
			@else
			
			<li class="disable-link">
             <div class="d-flex align-items-center">
                 <i class="ti-heart menu-icon"></i>
                     <span class="menu-title">Payment Info</span>
                 </div>
                 <i class="ti-lock menu-icon mr-0"></i>
                
            </li>
            
			<li class="disable-link">
             <div class="d-flex align-items-center">
                 <i class="ti-heart menu-icon"></i>
                     <span class="menu-title">Transaction</span>
                 </div>
                 <i class="ti-lock menu-icon mr-0"></i>
                
            </li>
            
            <li class="disable-link">
             <div class="d-flex align-items-center">
                 <i class="ti-heart menu-icon"></i>
                     <span class="menu-title">Booking</span>
                 </div>
                 <i class="ti-lock menu-icon mr-0"></i>
                
            </li>
          
			@endif
          
            <li class="nav-item">
            <a class="nav-link" href="{{ route('coach-faq') }}">
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
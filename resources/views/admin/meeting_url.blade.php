<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meeting</title>
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
    <!-- endinject -->
    <!-- Custom css -->
    <!--== css include ==-->
    <!-- Favicon -->
    <link rel="icon" href="">
    <!-- Google Fonts -->
    <!--== css include ==-->
    <style>
        .animation-bg {
            background: linear-gradient(-45deg, #ee7752, orange, #e73c7e, #23a6d5, #23d5ab);
        	background-size: 400% 400%;
        	animation: gradient 7s ease infinite;
        	width: 78px;
            height: 78px;
            font-size: 18px;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .timer-heading{
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .meeting-iframe{
            width:100%;
            height:600px;
        }
        @media(max-width: 576px){
          
          .meeting-time-title{
              font-size: 16px;
          }
          .timer-heading{
              justify-content: space-between;
          }
          .meeting-iframe{
            height: 450px;
          }
          .animation-bg{
            width: 58px;
            height: 58px;
            font-size: 14px;
          }
        }
    </style>
  </head>
  <body id="chat-pag">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 mb-3 mb-sm-4">
          <div class="d-sm-flex justify-content-between align-items-center">
                <div>
                    <h3 class="font-weight-bold text-white">Zentia Meeting Room</h3>
                </div>
                <div class="timer-heading">
                    <h4 class="text-white meeting-time-title">Your meeting will expire at</h4>
                    <div class="animation-bg">
                        <input type="hidden" value="{{$session_time}}"  id="tt">
                        <span class="count-digit text minute text-white">{{$session_time}}</span>
                        <span class="count-digit text minute text-white mr-1">0</span>
                        <span class="separator">:</span>
                        <span class="count-digit text minute text-white ml-1">0</span>
                        <span class="count-digit text minute text-white">0</span>
                    </div>
                </div>
          </div>
        </div>
        <div class="col-md-9 grid-margin w-100 p-0 px-sm-2">
          <div class="card">
            <div class="card-body text-center">
              <div class="mx-0 px-0">
                <audio id="alarm_audio"></audio>
                <iframe src="https://zentia.whereby.com/zentia0ccfb293-dfaf-4b26-a125-2a34ac5dca5c" allow="camera; microphone; fullscreen; speaker; display-capture" class="meeting-iframe"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row px-2">
                <h3 class="font-weight-bold text-white mb-2">Extend Meeting </h3>
                <p class="font-weight-normal mb-4 text-white">You can extend the current meeting by purchasing additional time. The additional time will be added to the meeting.</p>
                <form action="{{route('user-extend-meeting' )}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="order_id" value="{{ $callback_id }}">
                  <div class="form-group ml-2 w-100">
                    <div class="form-check d-flex align-items-center">
                      <label class="form-check-label"><input type="radio" class="form-check-input text-white" name="preferred_session" value="{{ $coach->price_20 }}/20"> 20 Minutes </label>
                      <span class="meeting-price-tag d-inline-block ml-3">${{ $coach->price_20 }}</span>
                    </div>
                    <div class="form-check  d-flex align-items-center">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input text-white" name="preferred_session" value="{{ $coach->price_40 }}/40"> 40 Minutes </label>
                        <span class="meeting-price-tag d-inline-block ml-3">${{ $coach->price_40 }}</span>
                    </div>
                    <div class="form-check d-flex align-items-center">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input text-white" name="preferred_session" value="{{ $coach->price_60 }}/60"> 60 Minutes </label>
                        <span class="meeting-price-tag d-inline-block ml-3">${{ $coach->price_60 }}</span>
                    </div>
                    <div class="form-group mt-4">
                      <button type="submit" class="btn-icon-text btn btn-primary btn-sm btn-rounded booking-status-value px-4 hover-brder btn-blue d-flex align-items-center" >
                        <i class="ti-video-camera btn-icon-prepend"></i> <span> Extend Meeting</span>
                      </button>
                    </div>
                  </div>
                </form>

                <div style=" padding: 70px 0px 0px;">
                  <h3 class="font-weight-bold text-white">End Meeting </h3>
                  <p class="font-weight-normal mb-3 text-white">You can leave the meeting room here</p>
                  <div style="">
                    <a style="padding: 20px 30px; border-radius: 30px;" href="{{route('expire-link', $callback_id )}}" class="btn btn-primary btn-sm btn-rounded custom-padding hover-brder">Leave meeting</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--<h1>CountDown Timer</h1>-->
       <!--<div>-->
       <!--  <input type="hidden" value="{{$session_time}}"  id="tt">-->
       <!--  <span class="count-digit">{{$session_time}}</span>-->
       <!--  <span class="count-digit">0</span>-->
       <!--  <span class="separator">:</span>-->
       <!--  <span class="count-digit">0</span>-->
       <!--  <span class="count-digit">0</span>-->
       <!--</div>-->
       <div class="options" style="display:none">
         <button id="stop-timer">
           <img src="https://img.icons8.com/ios-glyphs/30/000000/pause--v1.png" />
         </button>
         <button id="start-timer">
           <img src="https://img.icons8.com/ios-glyphs/30/000000/play--v1.png" />
         </button>
         <button id="reset-timer">
           <img src="https://img.icons8.com/ios-glyphs/30/000000/stop.png" />
         </button>
       </div>
    <!--    <audio id="alarm_audio"></audio>-->
    <!--<iframe src="https://zentia.whereby.com/zentia0ccfb293-dfaf-4b26-a125-2a34ac5dca5c" allow="camera; microphone; fullscreen; speaker; display-capture" style="width:100%;height:700px;"></iframe>-->
    <!--<iframe src="https://zentia.whereby.com/demo-366b3707-4242-4dee-bff9-ddf065af79d0" allow="camera; microphone; fullscreen; speaker; display-capture" style="width:100%;height:700px;"></iframe>-->
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
    <script>
      // Select Every Count Container
      const countContainer = document.querySelectorAll(".count-digit");
      // Select option buttons
      const startAction = document.getElementById("start-timer");
      const stopAction = document.getElementById("stop-timer");
      const resetAction = document.getElementById("reset-timer");
      // Select HTML5 Audio element
      const timeoutAudio = document.getElementById("alarm_audio");
      const tt = document.querySelector('#tt').value;
      // Default inital value of timer
      const defaultValue = tt * 60;
      // variable to the time
      var countDownTime = defaultValue;
      // variable to store time interval
      var timerID;
      // Variable to track whether timer is running or not
      var isStopped = true;
      // Function calculate time string
      const findTimeString = () => {
        var minutes = String(Math.trunc(countDownTime / 60));
        var seconds = String(countDownTime % 60);
        if (minutes.length === 1) {
          minutes = "0" + minutes;
        }
        if (seconds.length === 1) {
          seconds = "0" + seconds;
        }
        return minutes + seconds;
      };
      // Function to start Countdown
      const startTimer = () => {
        if (isStopped) {
          isStopped = false;
          timerID = setInterval(runCountDown, 1000);
        }
      };
      // Function to stop Countdown
      const stopTimer = () => {
        isStopped = true;
        if (timerID) {
          clearInterval(timerID);
        }
      };
      // Function to reset Countdown
      const resetTimer = () => {
        stopTimer();
        countDownTime = defaultValue;
        renderTime();
      };
      // Initialize alarm sound
      timeoutAudio.src = "http://soundbible.com/grab.php?id=1252&type=mp3";
      timeoutAudio.load();
      // Attach onclick event to buttons
      startAction.onclick = startTimer;
      resetAction.onclick = resetTimer;
      stopAction.onclick = stopTimer;
      // Function to display coundown on screen
      const renderTime = () => {
        const time = findTimeString();
        countContainer.forEach((count, index) => {
          count.innerHTML = time.charAt(index);
        });
      };
      // function to execute timer
      const runCountDown = () => {
        // decement time
        countDownTime -= 1;
        //Display updated time
        renderTime();
        // timeout on zero
        if (countDownTime === 0) {
          stopTimer();
          // Play alarm on timeout
          timeoutAudio.play();
          countDownTime = defaultValue;
          window.location = "../expire-link/{{ $callback_id }}";
        }
      };
      if (isStopped) {
        isStopped = false;
        timerID = setInterval(runCountDown, 1000);
      }
    </script>
  </body>
</html>
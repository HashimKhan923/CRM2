<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRM</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .timer {
      font-size: 8rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container-fluid min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="row w-100">
      <div class="col-12 text-center">
        <h1>{{$break->type}} Break</h1>
      </div>
    </div>
    <div class="row w-100">
      <div class="col-12 text-center">
        <div class="timer" id="timer"><span id="timer_h">{{$currentBreakTime->h}}</span>:<span id="timer_i">{{$currentBreakTime->i}}</span>:<span id="timer_s">{{$currentBreakTime->s}}</span></div>
        <a href="{{route('user.break_out',$break->id)}}" class="btn btn-dark btn-lg">End Break</a>
      </div>
    </div>
  </div>
      <!-- Bootstrap JS and dependencies -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
        function formatTime(unit) {
            return unit < 10 ? '0' + unit : unit;
        }

            let hoursElement = document.getElementById('timer_h');
            let minutesElement = document.getElementById('timer_i');
            let secondsElement = document.getElementById('timer_s');

            let hours = parseInt(hoursElement.textContent) || 0;
            let minutes = parseInt(minutesElement.textContent) || 0;
            let seconds = parseInt(secondsElement.textContent) || 0;


                function updateTimer() {
                    seconds++;
                    if (seconds === 60) {
                        seconds = 0;
                        minutes++;
                        if (minutes === 60) {
                            minutes = 0;
                            hours++;
                        }
                    }

                    // Update the timer display
                    hoursElement.textContent = formatTime(hours);
                    minutesElement.textContent = formatTime(minutes);
                    secondsElement.textContent = formatTime(seconds);
                }
                setInterval(updateTimer, 1000);

    });

</script>
</body>
</html>
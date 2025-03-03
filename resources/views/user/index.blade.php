@extends('layouts.master')

@section('content')
<div class="container-fluid relative animatedParent animateOnce my-3">
@if (session('success'))
    <div class="toast"
        data-title="Hi, there!"
        data-message="{{session('success')}}"
        data-type="error">
    </div>
    @endif
    @if ($message != null)
    <div class="toast"
        data-title="Hi, there!"
        data-message="{{$message}}"
        data-type="danger">
    </div>
    @endif  
<div class="row text-white bg-primary py-3 rounded align-items-center text-center">

<div class="col-md-4">
    @if($currentTotalTime != null)
    <h2>Total Time <span id="timer_h">{{$currentTotalTime->h}}</span>:<span id="timer_i">{{$currentTotalTime->i}}</span>:<span id="timer_s">{{$currentTotalTime->s}}</span> </h2>
    @else
    <h2>Total Time 00:00:00</h2>
    @endif
</div>

<div class="col-md-4">
    @if($remainingTime != '')
    <h2>Remaining Time <span id="C_timer_h">{{$remainingTime->h}}</span>:<span id="C_timer_i">{{$remainingTime->i}}</span>:<span id="C_timer_s">{{$remainingTime->s}}</span> </h2>
    @else
    <h2>Remaining Time 00:00:00</h2>
    @endif
</div>

<div class="col-md-2">
    @if($currentTotalTime != null)
    <div class="d-flex justify-content-center">
        <a href="{{route('user.time_out',auth()->user()->id)}}" class="btn btn-danger mr-2">End Shift</a>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Break
            </button>
            <div class="dropdown-menu text-dark" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('user.break_in', ['user_id' => auth()->user()->id, 'time_id' => $Time->id, 'break_type' => 'Prayer']) }}">Prayer</a>
                <a class="dropdown-item" href="{{route('user.break_in',['user_id' => auth()->user()->id, 'time_id' => $Time->id, 'break_type' => 'Lunch'])}}">Lunch</a>
                <a class="dropdown-item" href="{{route('user.break_in',['user_id' => auth()->user()->id, 'time_id' => $Time->id, 'break_type' => 'Tea'])}}">Tea</a>
                <a class="dropdown-item" href="{{route('user.break_in',['user_id' => auth()->user()->id, 'time_id' => $Time->id, 'break_type' => 'Others'])}}">Others</a>
            </div>
        </div>
    </div>
    @else
    <form  method="post" id="attendence-form" action="{{route('user.time_in')}}">     
        @csrf   
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">        
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <button type="button" onclick="getLocation()" href="" class="btn btn-primary">Start Shift</button>
    </form>
    @endif
</div>

    <div class="col-md-2">
        <h5>Shift: @if(isset($ShiftN)) {{$ShiftN->name}} @endif</h5>
        <hr class="bg-white">
        <p>{{$ShiftN->time_from}} - {{$ShiftN->time_to}}</p>
        <hr class="bg-white">
        <h5>Total Time: @if(isset($totalShiftHours)){{$totalShiftHours}} Hrs @endif</h5>
    </div>
</div>
        <div class="row row-eq-height my-3 mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3 bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-package s-18"></i></div>
                                    <div><span class="text-success">40+35</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter"><i class="icon-chrome"></i></div>
                                    Chrome
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-timer s-18"></i></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">5</div>
                                    Today's Attendence
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-users s-18"></i></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">19</div>
                                    All Users
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-user-times s-18"></i></div>
                                    <div><span class="text-danger">50</span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">95</div>
                                    Returning Users
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card no-b p-2">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="height-300">
                                <canvas
                                        data-chart="chartJs"
                                        data-chart-type="doughnut"
                                        data-dataset="[
                                                        [75, 25,25],

                                                    ]"
                                        data-labels="[['Disk'],['Database'],['Disk2'],['Database2']]"
                                        data-dataset-options="[
                                                    {
                                                        label: 'Disk',
                                                        backgroundColor: [
                                                            '#03a9f4',
                                                            '#8f5caf',
                                                            '#3f51b5'
                                                        ],

                                                    },


                                                    ]"
                                        data-options="{legend: {display: !0,position: 'bottom',labels: {fontColor: '#7F8FA4',usePointStyle: !0}},
                                }"
                                >
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card no-b my-3">
            <div class="card-body">
                <div class="my-2 height-300">
                    <canvas
                            data-chart="bar"
                            data-dataset="[
                                        [21, 90, 55, 0, 59, 77, 12,21, 90, 55, 0, 59, 77, 12,21, 90, 55, 0, 59, 77, 12],
                                        [12, 40, 16, 17, 89, 0, 12,12, 0, 55, 60, 79, 99, 12,12, 0, 55, 60, 79, 99, 12],
                                        [12, 40, 16, 17, 89, 0,12, 40, 16, 17, 89, 0, 12,12, 40, 16, 17, 89, 0, 12],
                                        ]"
                            data-labels="['Blue','Yellow','Green','Purple','Orange','Red','Indigo','Blue','Yellow','Green','Purple','Orange','Red','Indigo','Blue','Yellow','Green','Purple','Orange','Red','Indigo']"
                            data-dataset-options="[
                                    {
                                        label: 'HTML',
                                        backgroundColor: '#7986cb',
                                        borderWidth: 0,

                                    },
                                    {
                                         label: 'Wordpress',
                                         backgroundColor: '#88e2ff',
                                         borderWidth: 0,

                                     },
                                    {
                                          label: 'Laravel',
                                          backgroundColor: '#e2e8f0',
                                          borderWidth: 0,

                                      }
                                    ]"
                            data-options="{
                                      legend: { display: true,},
                                      scales: {
                                        xAxes: [{
                                            stacked: true,
                                             barThickness:5,
                                             gridLines: {
                                                zeroLineColor: 'rgba(255,255,255,0.1)',
                                                 color: 'rgba(255,255,255,0.1)',
                                                 display: false,},
                                             }],
                                        yAxes: [{
                                                stacked: true,
                                                     gridLines: {
                                                        zeroLineColor: 'rgba(255,255,255,0.1)',
                                                        color: 'rgba(255,255,255,0.1)',
                                                    }
                                       }]

                                      }
                                }"
                    >
                    </canvas>
                </div>
            </div>
            <div class="card-body">
                <div class="row my-3 no-gutters">
                    <div class="col-md-3">
                        <h1>Tasks</h1>
                        Currently assigned tasks to team.
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mb-3">
                                        <h6>New Layout</h6>
                                        <small>75% Completed</small>
                                    </div>
                                    <figure class="avatar">
                                        <img src="{{asset('assets/img/dummy/u12.png')}}" alt=""></figure>
                                </div>
                                <div class="progress progress-xs mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mb-3">
                                        <h6>New Layout</h6>
                                        <small>75% Completed</small>
                                    </div>
                                    <figure class="avatar">
                                        <img src="{{asset('assets/img/dummy/u2.png')}}" alt=""></figure>
                                </div>
                                <div class="progress progress-xs mb-3">
                                    <div class="progress-bar bg-indigo" role="progressbar" style="width: 75%;"
                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mb-3">
                                        <h6>New Layout</h6>
                                        <small>75% Completed</small>
                                    </div>
                                    <div class="avatar-group">
                                        <figure class="avatar">
                                            <img src="{{asset('assets/img/dummy/u4.png')}}" alt=""></figure>
                                        <figure class="avatar">
                                            <img src="{{asset('assets/img/dummy/u11.png')}}" alt=""></figure>
                                        <figure class="avatar">
                                            <img src="{{asset('assets/img/dummy/u1.png')}}" alt=""></figure>
                                    </div>
                                </div>
                                <div class="progress progress-xs mb-3">
                                    <div class="progress-bar yellow" role="progressbar" style="width: 75%;"
                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mb-3">
                                        <h6>New Layout</h6>
                                        <small>75% Completed</small>
                                    </div>
                                    <figure class="avatar">
                                        <img src="{{asset('assets/img/dummy/u5.png')}}" alt=""></figure>
                                </div>
                                <div class="progress progress-xs mb-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;"
                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" row my-3">
            <div class="col-md-6">
                <div class=" card b-0">
                    <div class="card-body p-5">
                        <canvas id="gradientChart" width="600" height="340"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class=" card no-b">
                    <div class="card-body">
                        <table class="table table-hover earning-box">
                            <tbody>
                            <tr class="no-b">
                                <td class="w-10">
                                    <a href="panel-page-profile.html" class="avatar avatar-lg">
                                        <img src="{{asset('assets/img/dummy/u6.png')}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h6>Sara Kamzoon</h6>
                                    <small class="text-muted">Marketing Manager</small>
                                </td>
                                <td>25</td>
                                <td>$250</td>
                            </tr>
                            <tr>
                                <td class="w-10">
                                    <a href="panel-page-profile.html" class="avatar avatar-lg">
                                        <img src="{{asset('assets/img/dummy/u9.png')}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h6>Sara Kamzoon</h6>
                                    <small class="text-muted">Marketing Manager</small>
                                </td>
                                <td>25</td>
                                <td>$250</td>
                            </tr>
                            <tr>
                                <td class="w-10">
                                    <a href="panel-page-profile.html" class="avatar avatar-lg">
                                        <img src="{{asset('assets/img/dummy/u11.png')}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h6>Sara Kamzoon</h6>
                                    <small class="text-muted">Marketing Manager</small>
                                </td>
                                <td>25</td>
                                <td>$250</td>
                            </tr>
                            <tr>
                                <td class="w-10">
                                    <a href="panel-page-profile.html" class="avatar avatar-lg">
                                        <img src="{{asset('assets/img/dummy/u12.png')}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h6>Sara Kamzoon</h6>
                                    <small class="text-muted">Marketing Manager</small>
                                </td>
                                <td>25</td>
                                <td>$250</td>
                            </tr>
                            <tr>
                                <td class="w-10">
                                    <a href="panel-page-profile.html" class="avatar avatar-lg">
                                        <img src="{{asset('assets/img/dummy/u5.png')}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h6>Sara Kamzoon</h6>
                                    <small class="text-muted">Marketing Manager</small>
                                </td>
                                <td>25</td>
                                <td>$250</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function formatTime(unit) {
            return unit < 10 ? '0' + unit : unit;
        }
            let checkTime = document.getElementById('timer_h');
            if(checkTime)
            {
            let hoursElement = checkTime;
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
        }


/////////////////////////////////////////////////////////////////////////////
        let checkBreak = document.getElementById('B_timer_h');
        if(checkBreak != null)
        {
        let B_hoursElement = checkBreak
        let B_minutesElement = document.getElementById('B_timer_i');
        let B_secondsElement = document.getElementById('B_timer_s');

        let B_hours = parseInt(B_hoursElement.textContent) || 0;
        let B_minutes = parseInt(B_minutesElement.textContent) || 0;
        let B_seconds = parseInt(B_secondsElement.textContent) || 0;


        function updateBTimer() {
            B_seconds++;
            if (B_seconds === 60) {
                B_seconds = 0;
                B_minutes++;
                if (B_minutes === 60) {
                    B_minutes = 0;
                    B_hours++;
                }
            }

            // Update the timer display
            B_hoursElement.textContent = formatTime(B_hours);
            B_minutesElement.textContent = formatTime(B_minutes);
            B_secondsElement.textContent = formatTime(B_seconds);
        }

        setInterval(updateBTimer, 1000);

        }
        


/////////////////////////////////////////////////////////////////////////////

        let C_hoursElement = document.getElementById('C_timer_h');
        let C_minutesElement = document.getElementById('C_timer_i');
        let C_secondsElement = document.getElementById('C_timer_s');

        let C_hours = parseInt(C_hoursElement.textContent) || 0;
        let C_minutes = parseInt(C_minutesElement.textContent) || 0;
        let C_seconds = parseInt(C_secondsElement.textContent) || 0;



        function updateCTimer() {
            if (C_hours === 0 && C_minutes === 0 && C_seconds === 0) {
                clearInterval(timerInterval); // Stop the timer when it reaches zero
                return;
            }
            C_seconds--;
            if (C_seconds < 0) {
                C_seconds = 59;
                C_minutes--;
                if (C_minutes < 0) {
                    C_minutes = 59;
                    C_hours--;
                }
            }

            // Update the timer display
            C_hoursElement.textContent = formatTime(C_hours);
            C_minutesElement.textContent = formatTime(C_minutes);
            C_secondsElement.textContent = formatTime(C_seconds);
        }

        // Start the timer
        setInterval(updateTimer, 1000);
        if(C_hours >= 0)
        {
            setInterval(updateCTimer, 1000);
        }
        
    });


    ////////////////////////////////////  Geo Location  \\\\\\\\\\\\\\\\\\\\\\\\\\

    function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError,  {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
        });
                
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {

        // alert(position.coords.latitude+','+position.coords.longitude)
            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;
            document.getElementById('attendence-form').submit();
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
</script>


                    @endsection('content')
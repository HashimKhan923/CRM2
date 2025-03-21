@extends('layouts.master')

@section('content')
<div class="container-fluid relative animatedParent animateOnce my-3">
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
                                    <div class="s-48 my-3 font-weight-lighter">{{$TodayAttendenceCount}}</div>
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
                                    <div class="s-48 my-3 font-weight-lighter">{{$UserCount}}</div>
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

                    @endsection('content')
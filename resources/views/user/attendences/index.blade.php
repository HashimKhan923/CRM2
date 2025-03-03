@extends('layouts.master')

@section('content')
<div class="container-fluid animatedParent animateOnce">
    <br>
<h1>Attendence</h1>
        <div class="tab-content my-3" id="v-pills-tabContent">
        <div class="">
                                <form action="{{route('user.attendence.search')}}" method="post" class="row g-3 ">
                                
                                        @csrf
                                    <div class="col-md-3">
                                        <label for="inputName" class="form-label">From Date:</label>
                                        <input type="date" name="from_date" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail" class="form-label">To Date:</label>
                                        <input type="date" name="to_date" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary"><i class="icon-search"></i> Search</button>
                                    </div>
                                </form>
                            </div>
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">

                    <div class="col-md-12">

                        <div class="card r-0 shadow">
                            <div class="table-responsive">

                                
                            <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <!-- <th style="width: 30px">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label
                                                        class="custom-control-label" for="checkedAll"></label>
                                                </div>
                                            </th> -->
                                            <th>#ID</th>
                                            <th> <div class="d-none d-lg-block">NAME</div></th>
                                            <th> <div class="d-none d-lg-block">EMAIL</div></th>
                                            <th> <div class="d-none d-lg-block">TIME IN</div></th>
                                            <th> <div class="d-none d-lg-block">TIME OUT</div></th>
                                            <th> <div class="d-none d-lg-block">TOTAL TIME</div></th>
                                            <th> <div class="d-none d-lg-block">STATUS</div></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                         @if($attendences)   
                                        @foreach($attendences as $attendance)
                                        <tr>
                                            <!-- <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_32" required><label
                                                        class="custom-control-label" for="user_id_1"></label>
                                                </div>
                                            </td> -->
                                            <td>
                                              <div class="d-flex">
                                                  <!-- <div class="avatar avatar-md mr-3 mb-2 mt-1">
                                                      <span class="avatar-letter avatar-letter-d  avatar-md circle"></span>
                                                  </div> -->
                                                  <div>
                                                      <div>
                                                          <strong>{{ $attendance->user->id}}</strong>
                                                      </div>
                                                      <!-- <small> alexander@paper.com</small> -->
                                                  </div>
                                              </div>
                                            </td>
                                            <td> <div class="d-none d-lg-block">{{ $attendance->personalInfo->first_name . ' ' . $attendance->personalInfo->last_name }}</div></td>

                                            <td> <div class="d-none d-lg-block">{{$attendance->user->email}}</div></td>
                                            <td> <div class="d-none d-lg-block">{{ \Carbon\Carbon::parse($attendance->time_in)->format('M d, Y h:i A') }}</div></td>

                                            <td> <div class="d-none d-lg-block">@if($attendance->time_out){{\Carbon\Carbon::parse($attendance->time_out)->format('M d, Y h:i A')}}@endif</div></td>
                                            <td> <div class="d-none d-lg-block">    
                                            @if($attendance->time_out)
                                                {{$attendance->net_worked_hours}}   
                                                @endif
                                                   <!-- @php
                                                    $timeIn = Carbon\Carbon::parse($attendance->time_in);
                                                    $timeOut = Carbon\Carbon::parse($attendance->time_out);
                                                    $difference = $timeIn->diff($timeOut);
                                                @endphp
                                                @if($attendance->time_out)
                                                {{ $difference->format('%H:%I:%S') }}
                                                @endif -->
                                                </div></td>
                                                <td> <div class="d-none d-lg-block">@if($attendance->late_status == 1) <span class="badge badge-danger">Late</span>  @else <span class="badge badge-success">On Time</span> @endif {{$attendance->status}}</div></td>
                                            <td>
                                                <a href=""></a>
                                                <a href="{{route('user.break.show',$attendance->id)}}" class="btn btn-primary"> See Breaks <i class="icon-eye mr-3 text->info"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach    
                                        @endif 

                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="v-pills-buyers" role="tabpanel" aria-labelledby="v-pills-buyers-tab">
                <div class="row">
                    <div class="col-md-3 my-3">
                        <div class="card no-b">
                            <div class="card-body text-center p-5">
                                <div class="avatar avatar-xl mb-3">
                                    <img  src="assets/img/dummy/u1.png" alt="User Image">
                                </div>
                                <div>
                                    <h6 class="p-t-10">Alexander Pierce</h6>
                                    alexander@paper.com
                                </div>
                                <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="v-pills-sellers" role="tabpanel" aria-labelledby="v-pills-sellers-tab">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card no-b p-3">
                            <div>
                                <div class="image mr-3 avatar-lg float-left">
                                    <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                </div>
                                <div class="mt-1">
                                    <div>
                                        <strong>Alexander Pierce</strong>
                                    </div>
                                    <small> alexander@paper.com</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card no-b p-3">
                            <div>
                                <div class="image mr-3 avatar-lg float-left">
                                    <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                </div>
                                <div class="mt-1">
                                    <div>
                                        <strong>Clexander Pierce</strong>
                                    </div>
                                    <small>clexander@paper.com</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



  </div>
</div>


                    @endsection('content')



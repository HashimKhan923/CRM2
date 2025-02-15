@extends('layouts.master')

@section('content')
<div class="container-fluid animatedParent animateOnce">
    <br>
<h1>Attendence</h1>
        <div class="tab-content my-3" id="v-pills-tabContent">
        <div class="">
                                <form action="{{route('admin.attendence.search')}}" method="post" class="row g-3 ">
                                <div class="col-md-3">
                                        @csrf
                                        <label for="inputName" class="form-label">User:</label>
                                        <select name="user_id" class="form-control" id="">
                                            <option value="">--Select User--</option>
                                            @php
                                            $Users = App\Models\User::with('personalInfo')->where('role_id',2)->get();
                                            @endphp
                                            @if ($Users)
                                            @foreach ($Users as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->personalInfo->first_name.' '.$item->personalInfo->last_name.' ('. $item->email .')' }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
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
                                            <th style="width: 30px">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label
                                                        class="custom-control-label" for="checkedAll"></label>
                                                </div>
                                            </th>
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
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_32" required><label
                                                        class="custom-control-label" for="user_id_1"></label>
                                                </div>
                                            </td>
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
                                                <a href=""><i class="icon-eye mr-3 text->info"></i></a>
                                                <a onclick="openAttendanceModal('edit',{{ json_encode($attendance) }})" ><i class="icon-pencil text-primary mr-3"></i></a>
                                                <a href=""><i class="icon-trash text-danger"></i> </a>
                                                <a href="{{route('admin.break.show',$attendance->id)}}"> See Breaks</a>

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
    <!--Add New Message Fab Button-->
    <button onclick="openAttendanceModal('create')" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
            class="icon-add"></i></button>

            <!-- Modal -->
<div id="attendanceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Mark Attendance</h4>
    </div>
    <form id="attendanceForm"  action="{{ route('admin.attendence.create') }}" method="post">
        @csrf
        <input type="hidden" name="attendance_id" id="attendance_id"> <!-- Hidden field for Edit -->

        <div class="modal-body">
            <label class="form-label">User:</label>
            <select name="user_id" required class="form-control" id="user_id">
                <option value="">--Select User--</option>
                @if ($Users)
                    @foreach ($Users as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->personalInfo->first_name.' '.$item->personalInfo->last_name.' ('. $item->email .')' }}
                        </option>
                    @endforeach
                @endif
            </select>
            <br>

            <label class="form-label">Time in:</label>
            <input type="datetime-local" required name="time_in" class="form-control" id="time_in">
            <br>

            <label class="form-label">Time out:</label>
            <input type="datetime-local" name="time_out" class="form-control" id="time_out">
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="submit-btn">Create</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>


  </div>
</div>
<script>

function openAttendanceModal(mode, attendance = null) {
    const form = document.getElementById('attendanceForm');
    const title = document.getElementById('modal-title');
    const submitBtn = document.getElementById('submit-btn');

    if (mode === 'edit' && attendance) {
        // Update modal for edit
        title.textContent = "Edit Attendance";
        form.action = `/admin/attendence/update`; // Update URL for editing
        submitBtn.textContent = "Update";
        
        // Populate fields with existing data
        document.getElementById('attendance_id').value = attendance.id;
        document.getElementById('user_id').value = attendance.user_id;
        document.getElementById('time_in').value = attendance.time_in;
        document.getElementById('time_out').value = attendance.time_out;

    } else {
        // Reset modal for create
        title.textContent = "Mark Attendance";
        form.action = "{{ route('admin.attendence.create') }}"; // Create URL
        submitBtn.textContent = "Create";
        
        // Clear fields
        document.getElementById('attendance_id').value = "";
        document.getElementById('user_id').value = "";
        document.getElementById('time_in').value = "";
        document.getElementById('time_out').value = "";
    }

    // Show modal
    $('#attendanceModal').modal('show');
}

        
    </script>

                    @endsection('content')



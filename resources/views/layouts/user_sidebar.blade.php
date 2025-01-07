<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{route('user.dashboard',auth()->user()->id)}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               User Dashboard
                            </a>

                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a  class="nav-link" href="{{route('admin.users.show')}}">Users</a>
                                    <a class="nav-link" href="{{route('admin.department.show')}}">Departments</a>
                                    <a class="nav-link" href="{{route('admin.shift.show')}}">Shifts</a> -->
                                    <a class="nav-link" href="{{route('user.attendence.show',auth()->user()->id)}}">Attendences</a>
                                    <a class="nav-link" href="{{route('user.break.show',auth()->user()->id)}}">Breaks</a>
                                    <!-- <a class="nav-link" href="{{route('admin.role.show')}}">Roles</a> -->


                                </nav>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
</div>
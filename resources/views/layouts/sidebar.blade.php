<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('admin.dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                                <nav class="sb-sidenav-menu-nested nav">
                                    <a  class="nav-link" href="{{route('admin.users.show')}}">Users</a>
                                    <a  class="nav-link" href="{{route('admin.project.show')}}">Projects</a>
                                    <a class="nav-link" href="{{route('admin.department.show')}}">Departments</a>
                                    <a class="nav-link" href="{{route('admin.shift.show')}}">Shifts</a>
                                    <a class="nav-link" href="{{route('admin.attendence.show')}}">Attendences</a>
                                    <a class="nav-link" href="{{route('admin.break.show')}}">Breaks</a>
                                    <a class="nav-link" href="{{route('admin.role.show')}}">Roles</a>


                                </nav>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
</div>
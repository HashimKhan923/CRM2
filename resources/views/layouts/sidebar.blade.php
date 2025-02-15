    <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('admin.dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userManagment" aria-expanded="false" aria-controls="userManagment">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Employee/Staff Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="userManagment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a  class="nav-link" href="{{route('admin.users.show')}}">Users</a>
                                <a class="nav-link" href="{{route('admin.department.show')}}">Departments</a>
                                <a class="nav-link" href="{{route('admin.role.show')}}">Roles & Permissions</a>
                                <a class="nav-link" href="">Resignation Requests</a>
                                <a class="nav-link" href="">HR Policies</a>

                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#attendenceManagment" aria-expanded="false" aria-controls="attendenceManagment">
                                <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                                Time & Attendance Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="attendenceManagment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#attendenceSubNav" aria-expanded="false" aria-controls="attendenceSubNav">
                                    Attendances
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="attendenceSubNav" aria-labelledby="headingEight" data-bs-parent="#taskManagement">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="">Today,s Attendance</a>
                                        <a class="nav-link" href="">Late Time Limit</a>
                                        <a class="nav-link" href="">Attendance Policy</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#milestoneSubNav" aria-expanded="false" aria-controls="milestoneSubNav">
                                    Breaks
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="milestoneSubNav" aria-labelledby="headingEight" data-bs-parent="#taskManagement">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="">Today,s Breaks</a>
                                        <a class="nav-link" href="">Types</a>
                                        <a class="nav-link" href="">Break Policy</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="{{route('admin.shift.show')}}">Shifts</a>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#overtimeSubNav" aria-expanded="false" aria-controls="overtimeSubNav">
                                    Overtime
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="overtimeSubNav" aria-labelledby="headingEight" data-bs-parent="#taskManagement">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="">Today,s Overtime</a>
                                        <a class="nav-link" href="">Overtime Limit</a>
                                        <a class="nav-link" href="">Overtime Policy</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="{{route('admin.shift.show')}}">Leave Requests</a>
                                <a class="nav-link" href="{{route('admin.shift.show')}}">Holiday Calendar</a>

                                </nav>
                            </div>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#taskManagment" aria-expanded="false" aria-controls="taskManagment">
                                <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                                Project & Task Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="taskManagment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a  class="nav-link" href="{{route('admin.project.show')}}">Projects</a>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
    </div>
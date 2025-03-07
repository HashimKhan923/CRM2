<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Paper</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">

</head>

<body class="light sidebar-mini sidebar-collapse">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
            <div class="sidebar">
                <div class="d-flex hv-100 align-items-stretch">
                    <div class="indigo text-white">
                        <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <!-- <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                                aria-controls="v-pills-home" aria-selected="true"><i class="icon-users"></i></a> -->

                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria-selected="false"><i
                                    class="icon-clock-o"></i></a>
                            <!-- 
                    <a class="nav-link blink skin_handle"  href="#"><i class="icon-lightbulb_outline"></i></a>
                    
                    <a class="nav-link" id="v-pills-messages-tab" href="#"><i class="icon-message"></i></a>
                    <a class="nav-link" id="v-pills-settings-tab" href="#"><i class="icon-settings"></i></a>
                    <a href="">
                        <figure class="avatar">
                            <img src="{{asset('assets/img/dummy/u3.png')}}" alt="">
                            <span class="avatar-badge online"></span>
                        </figure>
                    </a> -->
                        </div>
                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                        <!-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="relative brand-wrapper sticky b-b">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <div class="text-xs-center">
                                        <span class="font-weight-lighter s-18">Employee/Staff Management</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="sidebar-menu">
                                <li class="treeview">
                                    <a href="{{route('admin.dashboard')}}">
                                        <i class="icon icon-sailing-boat-water s-24"></i> <span>Dashboard</span>
                                    </a>
                                </li>
    
                                <li class="treeview"><a href="#"><i class="icon icon-account_box s-24"></i>Users<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.users.show')}}"><i
                                                    class="icon icon-circle-o"></i>All Users</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add User</a>
                                        </li>
                                        <li><a href="{{route('admin.role.create.form')}}"><i
                                                    class="icon icon-add"></i>Roles</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="treeview"><a href="#">
                                        <i class="icon-id-badge" style="font-size:large"></i>
                                        <i class=" icon-angle-left  pull-right"></i>
                                        <span>Roles & Permissions</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="inbox.html"><i class="icon icon-circle-o"></i>View All</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add New</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="icon icon-documents3 s-24"></i> <span>HR Policies</span>
                                        <i class=" icon-angle-left  pull-right"></i>
                                    </a>

                                </li>
                            </ul>
                        </div> -->
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="relative brand-wrapper sticky b-b">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <div class="text-xs-center">
                                        <span class="font-weight-lighter s-18">Time Managment</span>
                                    </div>
                                </div>
                            </div>
                            @if(auth()->user()->role_id == 1)

                             <!-- Admin Sidebar Start -->
                            <ul class="sidebar-menu">
                                <li class="treeview">
                                    <a href="{{route('admin.dashboard')}}">
                                        <i class="icon icon-sailing-boat-water s-24"></i> <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="treeview"><a href="#"><i class="icon icon-account_box s-24"></i>Users<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.users.show')}}"><i
                                                    class="icon icon-circle-o"></i>All Users</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add User</a>
                                        </li>
                                        <li><a href="{{route('admin.role.show')}}"><i
                                                    class="icon-id-badge s-22 "></i> Roles</a>
                                        </li>

                                    </ul>
                                </li>
    
                                <li class="treeview"><a href="#"><i class="icon-clock-o s-24"></i> Attendences<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.attendence.show')}}" ><i
                                                    class="icon icon-circle-o"></i>Today's Attendences</a>
                                        </li>
                                        <!-- <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>All Attendences</a>
                                        </li> -->
                                        <!-- <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Attendence</a>
                                        </li> -->

                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-documents3 s-18"></i> Attendence Policies</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="treeview"><a href="#">
                                        <i class="icon-home2" style="font-size:x-large"></i>
                                        <i class=" icon-angle-left  pull-right"></i>
                                        <span>Departments</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.department.show')}}"><i class="icon icon-circle-o"></i>All Departments</a>
                                        </li>
                                        <li><a href="{{route('admin.department.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Department</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="treeview"><a href="#">
                                        <i class="icon-id-badge" style="font-size:large"></i>
                                        <i class=" icon-angle-left  pull-right"></i>
                                        <span>Shifts</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.shift.show')}}"><i class="icon icon-circle-o"></i>All Shifts</a>
                                        </li>
                                        <li><a href="{{route('admin.shift.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Shift</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="treeview"><a href="#"><i class="icon-time-is-money-1 s-24"></i> Overtimes<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>Today's Overtimes</a>
                                        </li>
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>All Overtimes</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Overtime</a>
                                        </li>

                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-documents3 s-18"></i> Overtime Policies</a>
                                        </li>

                                    </ul>
                                </li>


                                
                                <li class="treeview"><a href="#"><i class="icon-time-is-money-1 s-24"></i> Leaves<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>Today's Leaves</a>
                                        </li>
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>All Leaves</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Leave</a>
                                        </li>

                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-documents3 s-18"></i> Leave Policies</a>
                                        </li>

                                    </ul>
                                </li>

 
                            </ul>
                            <!-- Admin Sidebar End -->
                            @else
                            <!-- User Sidebar Start -->
                            <ul class="sidebar-menu">
                                <li class="treeview">
                                    <a href="{{route('user.dashboard',auth()->user()->id)}}">
                                        <i class="icon icon-sailing-boat-water s-24"></i> <span>Dashboard</span>
                                    </a>
                                </li>

    
                                <li class="treeview"><a href="#"><i class="icon-clock-o s-24"></i> Attendences<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('user.attendence.show',auth()->user()->id)}}" ><i
                                                    class="icon icon-circle-o"></i>My Attendences</a>
                                        </li>
                                        <!-- <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>All Attendences</a>
                                        </li> -->
                                        <!-- <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Attendence</a>
                                        </li> -->

                                    </ul>
                                </li>



                                <li class="treeview"><a href="#"><i class="icon-time-is-money-1 s-24"></i> Overtimes<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>Today's Overtimes</a>
                                        </li>
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>All Overtimes</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Overtime</a>
                                        </li>

                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-documents3 s-18"></i> Overtime Policies</a>
                                        </li>

                                    </ul>
                                </li>


                                
                                <li class="treeview"><a href="#"><i class="icon-time-is-money-1 s-24"></i> Leaves<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>Today's Leaves</a>
                                        </li>
                                        <li><a href="{{route('admin.users.show')}}" ><i
                                                    class="icon icon-circle-o"></i>All Leaves</a>
                                        </li>
                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-add"></i>Add Leave</a>
                                        </li>

                                        <li><a href="{{route('admin.users.create.form')}}"><i
                                                    class="icon icon-documents3 s-18"></i> Leave Policies</a>
                                        </li>

                                    </ul>
                                </li>

 
                            </ul>
                            <!-- User Sidebar End -->
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <div class="has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50"
                                type="text" placeholder="start typing...">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation"
                            class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
            <i></i>
        </a>
        <div class="has-sidebar-left has-sidebar-tabs">
            <!--navbar-->
            <div class="sticky">
                <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
                    <div class="relative">
                        <div class="d-flex">
                            <div class="d-none d-md-block">
                                <h1 class="nav-title">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <!--Top Menu Start -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages-->
                            <li class="dropdown custom-dropdown messages-menu">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="icon-envelope-o"></i>
                                    <span class="badge badge-success badge-mini rounded-circle">4</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu pl-2 pr-2">
                                            <!-- start message -->
                                            <li>
                                                <a href="#">
                                                    <div class="avatar float-left">
                                                        <img src="{{asset('assets/img/dummy/u4.png')}}" alt="">
                                                        <span class="avatar-badge busy"></span>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <!-- start message -->
                                            <li>
                                                <a href="#">
                                                    <div class="avatar float-left">
                                                        <img src="{{asset('assets/img/dummy/u1.png')}}" alt="">
                                                        <span class="avatar-badge online"></span>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <!-- start message -->
                                            <li>
                                                <a href="#">
                                                    <div class="avatar float-left">
                                                        <img src="{{asset('assets/img/dummy/u2.png')}}" alt="">
                                                        <span class="avatar-badge idle"></span>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <!-- start message -->
                                            <li>
                                                <a href="#">
                                                    <div class="avatar float-left">
                                                        <img src="{{asset('assets/img/dummy/u3.png')}}" alt="">
                                                        <span class="avatar-badge busy"></span>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                        </ul>
                                    </li>
                                    <li class="footer s-12 p-2 text-center"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications -->
                            <li class="dropdown custom-dropdown notifications-menu">
                                <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon-notifications_none"></i>
                                    <span class="badge badge-danger badge-mini rounded-circle">4</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="icon icon-data_usage text-success"></i> 5 new members
                                                    joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon icon-data_usage text-danger"></i> 5 new members
                                                    joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon icon-data_usage text-yellow"></i> 5 new members
                                                    joined today
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer p-2 text-center"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-link " data-toggle="collapse" data-target="#navbarToggleExternalContent"
                                    aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <i class="icon-search3"></i>
                                </a>
                            </li>
                            <!-- Right Sidebar Toggle Button -->
                            <li>
                                <a class="nav-link ml-2" data-toggle="control-sidebar">
                                    <i class="icon-format_align_right"></i>
                                </a>
                            </li>
                            <!-- User Account-->
                            <li class="dropdown custom-dropdown user user-menu ">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <img src="{{asset('assets/img/dummy/u8.png')}}" class="user-image" alt="User Image">
                                    <i class="icon-more_vert "></i>
                                </a>
                                <div class="dropdown-menu p-4 dropdown-menu-right">
                                    <a href="{{route('logout')}}" class="btn btn-sm btn-danger">Logout</a>
                                    <hr>
                                    <div class="row box justify-content-between my-4">
                                        <div class="col">
                                            <a href="#">
                                                <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                                                <div class="pt-1">Apps</div>
                                            </a>
                                        </div>
                                        <div class="col"><a href="#">
                                                <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                                                <div class="pt-1">Profile</div>
                                            </a></div>
                                        <div class="col">
                                            <a href="#">
                                                <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                                                <div class="pt-1">Settings</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--#navbar-->
            @yield('content')

        </div>
        <!-- Right Sidebar -->
        <aside class="control-sidebar fixed white ">
            <div class="slimScroll">
                <div class="sidebar-header">
                    <h4>Activity List</h4>
                    <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
                </div>
                <div class="p-3">
                    <div>
                        <div class="my-3">
                            <small>25% Complete</small>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="my-3">
                            <small>45% Complete</small>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 45%;"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="my-3">
                            <small>60% Complete</small>
                            `
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="my-3">
                            <small>75% Complete</small>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="my-3">
                            <small>100% Complete</small>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 bg-primary text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="font-weight-normal s-14">Sodium</h5>
                            <span class="font-weight-lighter text-primary">Spark Bar</span>
                            <div> Oxygen
                                <span class="text-primary">
                                    <i class="icon icon-arrow_downward"></i> 67%</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <canvas width="100" height="70" data-chart="spark" data-chart-type="bar"
                                data-dataset="[[28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100]]"
                                data-labels="['a','b','c','d','e','f','g','h','i','j','k','l','m','n','a','b','c','d','e','f','g','h','i','j','k','l','m','n']">
                            </canvas>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">INV-281281</a>
                                </td>
                                <td>
                                    <span class="badge badge-success">Paid</span>
                                </td>
                                <td>$ 1228.28</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">INV-01112</a>
                                </td>
                                <td>
                                    <span class="badge badge-warning">Overdue</span>
                                </td>
                                <td>$ 5685.28</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">INV-281012</a>
                                </td>
                                <td>
                                    <span class="badge badge-success">Paid</span>
                                </td>
                                <td>$ 152.28</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">INV-01112</a>
                                </td>
                                <td>
                                    <span class="badge badge-warning">Overdue</span>
                                </td>
                                <td>$ 5685.28</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">INV-281012</a>
                                </td>
                                <td>
                                    <span class="badge badge-success">Paid</span>
                                </td>
                                <td>$ 152.28</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sidebar-header">
                    <h4>Activity</h4>
                    <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
                </div>
                <div class="p-4">
                    <div class="activity-item activity-primary">
                        <div class="activity-content">
                            <small class="text-muted">
                                <i class="icon icon-user position-left"></i> 5 mins ago
                            </small>
                            <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                        </div>
                    </div>
                    <div class="activity-item activity-danger">
                        <div class="activity-content">
                            <small class="text-muted">
                                <i class="icon icon-user position-left"></i> 8 mins ago
                            </small>
                            <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                        </div>
                    </div>
                    <div class="activity-item activity-success">
                        <div class="activity-content">
                            <small class="text-muted">
                                <i class="icon icon-user position-left"></i> 10 mins ago
                            </small>
                            <p>Lorem ipsum dolor sit amet cons the ecte tur and adip ascing elit users.</p>
                        </div>
                    </div>
                    <div class="activity-item activity-warning">
                        <div class="activity-content">
                            <small class="text-muted">
                                <i class="icon icon-user position-left"></i> 12 mins ago
                            </small>
                            <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- /.right-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg shadow white fixed"></div>
    </div>
    <!--/#app -->
    <script src="{{asset('assets/js/app.js')}}"></script>

</body>

</html>
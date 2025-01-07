@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <a href="{{route('admin.users.create.form')}}" class="btn btn-info text-white">Add New</a>
                        <br><br>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card mb-4">

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Department</th>
                                            <th>Shift</th>
                                            <th>Role</th>
                                            <th>Manager</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       
                                    @if($all_users)
                                        @foreach($all_users as $user)
                                        <tr>
    <td>{{ $user->id }}</td>
    <td>{{ optional($user->personalInfo)->first_name . ' ' . optional($user->personalInfo)->last_name ?? '' }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ optional($user->contactInfo)->personal_phone ?? 'N/A' }}</td>
    <td>{{ optional(optional($user->jobInfo)->department)->name ?? 'N/A' }}</td>
    <td>{{ optional($user->shift)->name ?? 'N/A' }}</td>
    <td>{{ optional($user->role)->name ?? 'N/A' }}</td>
    <td>{{ optional(optional($user->jobInfo)->manager)->first_name . ' ' . optional(optional($user->jobInfo)->manager)->last_name ?? '<i>N/A</i>' }}</td>
    <td>
        <a href="{{ route('admin.users.update.form', $user->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
    </td>
</tr>
                                        @endforeach    
                                    @endif    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @endsection('content')
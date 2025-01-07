@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Roles</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                        <a href="{{route('admin.role.create.form')}}" class="btn btn-info text-white">Add New</a>
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
                                            
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       
                                    @if($roles)
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{$role->name}}</td>
                                                <td><a href="{{route('admin.role.update.form',$role->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{route('admin.role.delete',$role->id)}}" class="btn btn-danger">Delete</a>
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
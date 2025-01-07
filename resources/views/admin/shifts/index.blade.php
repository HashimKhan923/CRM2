@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Shifts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Shifts</li>
                        </ol>
                        <a href="{{route('admin.shift.create.form')}}" class="btn btn-info text-white">Add New</a>
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
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       
                                    @if($shifts)
                                        @foreach($shifts as $shift)
                                            <tr>
                                                <td>{{$shift->name}}</td>
                                                <td>{{$shift->time_from}}</td>
                                                <td>{{$shift->time_to}}</td>
                                                <td><a href="{{route('admin.shift.update.form',$shift->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{route('admin.shift.delete',$shift->id)}}" class="btn btn-danger">Delete</a>
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
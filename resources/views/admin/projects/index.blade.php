@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Projects</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                        <a href="{{route('admin.project.create.form')}}" class="btn btn-info text-white">Add New</a>
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
                                            <th>Manager</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       
                                    @if($Projects)
                                        @foreach($Projects as $project)
                                            <tr>
                                                <td>{{$project->name}}</td>
                                                <td>{{$project->manager->personalInfo->first_name}}</td>
                                                <td>{{$project->start_date}}</td>
                                                <td>{{$project->end_date}}</td>
                                                <td><a href="{{route('admin.project.update.form',$project->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{route('admin.project.delete',$project->id)}}" class="btn btn-danger">Delete</a>
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
@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Add New Department</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New Department</li>
                        </ol>

                        <div class="card mb-4">

                            <div class="card-body">
                            <form method="post" action="{{route('admin.department.create')}}">
                                @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" id="" placeholder="Name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="">Deparment Location</label>
                                            <input type="text" class="form-control" name="latitude" id="" placeholder="latitude">
                                            @error('latitude')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <input type="text" class="form-control" name="longitude" id="" placeholder="longitude">
                                            @error('longitude')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <input type="text" class="form-control" name="radius" id="" placeholder="radius">
                                            @error('radius')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>

                    @endsection('content')
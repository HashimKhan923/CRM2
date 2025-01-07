@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Update Project</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Project</li>
                        </ol>

                        <div class="card mb-4">

                            <div class="card-body">
                            <form method="post" action="{{route('admin.project.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">

                                        <div class="form-row">

                                            <div class="form-group col-md-4">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$data->name}}" id="" placeholder="Name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="description" id="" placeholder="Description">{{$data->description}}</textarea>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Manager</label>
                                            <select id="manager_id" name="manager_id" class="form-control">
                                                <option value="">-- Select Manager --</option>
                                                @foreach ($managers as $item)
                                                    <option @if ($data->manager_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->personalInfo->first_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('manager_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="manager_id">Project Users</label>
                                                <select name="" id="" multiple>
                                                    <option value="" disable>-- Select Users --</option>
                                                </select>

                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Documantation File</label>
                                            <input type="file" class="form-control" name="documantation" id="" placeholder="">
                                            @error('documantation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Start Date</label>
                                            <input type="date" class="form-control" name="start_date" value="{{$data->start_date}}" id="" placeholder="">
                                            @error('start_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>


                                            <div class="form-group col-md-4">
                                            <label for="">End Date</label>
                                            <input type="date" class="form-control" name="end_date" id="" value="{{$data->end_date}}" placeholder="">
                                            @error('end_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                            </div>
                        </div>
                    </div>

                    @endsection('content')
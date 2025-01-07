@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Update User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update User</li>
                        </ol>

                        <div class="card mb-4">

                            <div class="card-body">
                            <form method="post" action="{{route('admin.role.update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" value="{{$data->name}}" name="name" id="" placeholder="Name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>

                    @endsection('content')
@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Update Shift</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Shift</li>
                        </ol>

                        <div class="card mb-4">

                            <div class="card-body">
                            <form method="post" action="{{route('admin.shift.update')}}">
                                @csrf
                                <input type="hidden" name="shift_id" value="{{$data->id}}">
                                        <div class="form-row">

                                            <div class="form-group col-md-4">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" value="{{$data->name}}" name="name" id="" placeholder="Name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        @php $data->time_from = \Carbon\Carbon::parse($data->time_from)->format('H:i');
                                        $data->time_to = \Carbon\Carbon::parse($data->time_to)->format('H:i'); @endphp

                                        <div class="form-group col-md-4">
                                            <label for="">From</label>
                                            <input type="time" class="form-control" name="time_from" value="{{$data->time_from}}" id="" placeholder="From">
                                            @error('time_from')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">To</label>
                                            <input type="time" class="form-control" name="time_to" value="{{$data->time_to}}" id="" placeholder="To">
                                            @error('time_to')
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
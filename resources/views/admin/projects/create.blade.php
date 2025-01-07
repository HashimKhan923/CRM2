@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Add New Project</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New Project</li>
                        </ol>

                        <div class="card mb-4">

                            <div class="card-body">
                            <form method="post" action="{{route('admin.project.create')}}" enctype="multipart/form-data">
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
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="description" id="" placeholder="Description"></textarea>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Manager</label>
                                            <select id="manager_id" name="manager_id" class="form-control">
                                                <option value="">-- Select Manager --</option>
                                                @foreach ($managers as $item)
                                                    <option value="{{ $item->id }}">{{ $item->personalInfo->first_name }} {{ $item->personalInfo->last_name }} ({{ $item->jobInfo->department->name }})</option>
                                                @endforeach
                                            </select>
                                            @error('manager_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="project_users">Project Users <i>(under this selected manager)</i></label>
                                                <select class="form-control" name="project_users[]" id="project_users" multiple>
                                                    <option value="">-- Select Users --</option>
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
                                            <input type="date" class="form-control" name="start_date" id="" placeholder="">
                                            @error('start_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>


                                            <div class="form-group col-md-4">
                                            <label for="">End Date</label>
                                            <input type="date" class="form-control" name="end_date" id="" placeholder="">
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

                    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#manager_id').change(function() {
                
                var managerId = $(this).val();
                if (managerId) {

                    $.ajax({
                        url: '/admin/project/get-users-by-manager/' + managerId,
                        type: 'GET',
                        success: function(data) {
                            $('#project_users').empty();
                            $('#project_users').append('<option value="">-- Select Users --</option>');
                            $.each(data, function(key, user) {
                                
                                
                                $('#project_users').append('<option  value="' + user.id + '">' + user.personal_info.first_name + ' ' + user.personal_info.last_name + ' <span style="background-color:blue">(' + user.job_info.position + ')</span></option>');
                                
                        });
                        }
                    });
                } else {
                    $('#project_users').empty();
                    $('#project_users').append('<option value="">-- Select Users --</option>');
                }
            });
        });
    </script>

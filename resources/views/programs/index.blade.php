@extends('layouts.main')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Programs</h1>
</div>
<div class="row mb-4">
    <div class="justify-content-center mx-auto">
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class=" container-fluid">
        <div class="card mx-auto">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <i class="fas fa-list-ol"></i>
                        &nbsp All Programs
                    </div>
                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                        <form method="GET" action="{{route('programs.index')}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search program" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form> &nbsp
                        <a href="{{route('programs.create')}}" class="btn btn-primary btn-sm mb-2">
                            <i class="fas fa-user-plus"></i>
                            &nbsp <span class="d-none d-lg-inline ">Add New program</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
            <table class="table table-hover table-stripped table-bordered" " id="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Program Name</th>
                <th scope="col">Program Code</th>
                <th scope="col">Department Name</th>
                <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr>
                    <th scope="row">{{$program->program_id}}</th>
                    <td>{{$program->program_name}}</td>
                    <td>{{$program->program_code}}</td>
                    <td>
                        @foreach($departments as $department)
                            @if($program->department_id == $department->department_id)
                            {{ $department->department_name }}
                            @endif
                        @endforeach
                    </td>
                    <td scope="col-2">
                        <a href="{{route('programs.edit', $program->program_id)}}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>&nbsp
                        <form method="POST" action="{{route('programs.destroy', $program->program_id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($programs->isEmpty())
                    <tr>
                        <td colspan="6"><div class="alert alert-danger">No Record Found</div></td>
                    </tr>
                @endif
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $programs->links('pagination::bootstrap-5') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
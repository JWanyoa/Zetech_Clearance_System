@extends('layouts.main')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User departments</h1>
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

    <div class=" container">
        <div class="card mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fas fa-building"></i>
                        &nbsp Schools/Departments
                    </div>
                    <div class="col-md-5">
                        <form method="GET" action="{{route('departments.index')}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search role" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('departments.create')}}" class="btn btn-primary btn-sm float-right">
                            <i class="fas fa-plus-square"></i>
                            &nbsp Create New department
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <th scope="row">{{$department->department_id}}</th>
                    <td>{{$department->department_name}}</td>
                    <td scope="col-2">
                        <a href="{{route('departments.edit', $department->department_id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>&nbsp Edit Details</a>&nbsp
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp Delete Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $departments->links('pagination::bootstrap-5') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
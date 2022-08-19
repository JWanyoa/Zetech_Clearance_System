@extends('layouts.main')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Roles</h1>
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
                        <i class="fas fa-graduation-cap"></i>
                        &nbsp System roles
                    </div>
                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                        <form method="GET" action="{{route('roles.index')}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search role" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form> &nbsp
                        <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm mb-2">
                            <i class="fas fa-plus"></i>
                            &nbsp <span class="d-none d-lg-inline ">Create New Role</span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="card-body table-responsive">
            <table class="table table-hover table-stripped table-bordered" " id="table">
            <thead>
                <tr>
                <th scope="col">Role ID</th>
                <th scope="col">Role Name</th>
                <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <th scope="row">{{$role->role_id}}</th>
                    <td>{{$role->role_name}}</td>
                    <td scope="col-2">
                        <div class="d-flex justify-contents-center">
                            <a href="{{route('roles.edit', $role->role_id)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                                &nbsp Edit role Details
                            </a> &nbsp
                            <form method="POST" action="{{route('roles.destroy', $role->role_id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp Delete role Details</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($roles->isEmpty())
                    <tr>
                        <td colspan="4"><div class="alert alert-danger">Records for User Roles Not Found</div></td>
                    </tr>
                @endif
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $roles->links('pagination::bootstrap-5') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
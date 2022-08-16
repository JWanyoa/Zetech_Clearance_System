@extends('layouts.main')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
</div>
<div class="row mb-4">
    <div class="m-2 justify-content-center">
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
    <div class="card mx-auto">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <i class="fas fa-users"></i>
                    &nbsp System Users
                </div>
                <div class="col-md-5">
                    <form method="GET" action="{{route('users.index')}}" class="form-inline">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="search" placeholder="Search User" name="search" class="form-control form-control-sm"/>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right">Create New User</a>
                </div>
            </div>
        </div>

        <div class="card-body">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">User ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role ID</th>
            <th scope="col">User Role</th>
            <th scope="col-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_id}}</td>
                <td>
                    @if($user->role_id == '1')
                    <div class="btn btn-primary btn-sm" role="alert">{{'Administrator'}}</div>
                    @elseif($user->role_id == '2')
                    <div class="btn btn-dark btn-sm" role="alert">{{'HOD'}}</div>
                    @elseif($user->role_id == '3')
                    <div class="btn btn-success btn-sm" role="alert">{{'Registrar'}}</div>
                    @elseif($user->role_id == '4')
                    <div class="btn btn-secondary btn-sm" role="alert">{{'Finance Officer'}}</div>
                    @elseif($user->role_id == '5')
                    <div class="btn btn-danger btn-sm" role="alert">{{'Records Officer'}}</div>
                    @elseif($user->role_id == '6')
                    <div class="btn btn-warning btn-sm" role="alert">{{'Librarian'}}</div>
                    @elseif($user->role_id == '7')
                    <div class="btn btn-info btn-sm" role="alert">{{'Student'}}</div>
                    @endif              
                </td>
                <td scope="col-2"><a href="{{route('users.edit', $user->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>&nbsp Edit User Details</a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
        </div>
    </div>
</div>
@endsection
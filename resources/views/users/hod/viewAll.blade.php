@extends('users.hod.app')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Students Names</h1>
</div>
<div class="row mb-4">
    <div class="justify-content-center mx-auto">
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mb-2" student="alert">
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
                    <div class="col-md-4">
                        <i class="fas fa-list-ol"></i>
                        &nbsp All Students
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form method="GET" action="{{route('users.hod.viewAll')}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search student by name" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-hover table-stripped table-bordered" " id="table">
            <thead>
                <tr>
                <th scope="col">Student ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">National ID</th>
                <th scope="col">Program</th>
                <th scope="col">Program Code</th>
                <th scope="col">Status of Graduation</th>
                <th scope="col">HOD Remarks</th>
                <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allStudents as $student)
                <tr>
                    <th scope="row">{{$student->student_id}}</th>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->middle_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->national_id }}</td>
                        @foreach($programs as $program)
                            @if($student->program_id == $program->program_id)
                            <td>
                                {{ $program->program_name }}
                            </td>
                            <td>
                                {{ $program->program_code }}
                            </td>
                            @endif
                        @endforeach
                    <td>{{$student->status_of_graduation }}</td>
                    <td>{{$student->HOD_remarks }}</td>
                    <td scope="col-2"> 
                        <div class="d-flex juustify-contents-center">
                            <a href="{{url('viewStudent', $student->student_id)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($allStudents->isEmpty())
                    <tr>
                        <td colspan="11"><div class="alert alert-danger">Student Records Not Found</div></td>
                    </tr>
                @endif
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $allStudents->links('pagination::bootstrap-5') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
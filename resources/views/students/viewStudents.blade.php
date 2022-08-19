@extends('layouts.main')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Students</h1>
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
                    <div class="col-md-7">
                        <i class="fas fa-graduation-cap"></i>
                        &nbsp All Candidate Students
                    </div>
                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                        <form method="GET" action="{{route('students.index')}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search student" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form> &nbsp
                        <a href="{{route('students.create')}}" class="btn btn-primary btn-sm mb-2">
                            <i class="fas fa-user-plus"></i>
                            &nbsp <span class="d-none d-lg-inline ">Add New Student</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                
            <table id="table" class="table table-sm table-hover table-stripped table-bordered" cellspacing="0">
            <thead>
                <tr>
                <th scope="col">Student ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">National ID</th>
                <th scope="col">Admission Number</th>
                <th scope="col">Program</th>
                <th scope="col">Program Code</th>
                <th scope="col">Status of Graduation</th>
                <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{$student->student_id}}</th>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->middle_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->national_id }}</td>
                    <td>{{$student->admissionNumber }}</td>
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
                    <td scope="col-2"> 
                        <div class="d-flex justify-contents-center">
                            <a href="{{route('students.edit', $student->student_id)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp
                                <form method="POST" action="{{route('students.destroy', $student->student_id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($students->isEmpty())
                    <tr>
                        <td colspan="12"><div class="alert alert-danger">No Students Added Yet</div></td>
                    </tr>
                @endif
            </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-center text-center">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>





@endsection
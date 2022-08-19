@extends('layouts.main')

@section('content')

<div class="container mb-4">
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <i class="fa fa-pencil-square"></i>
                            {{ __('Update student') }}
                        </div>
                    <div class="col-md-3 text-center">
                        @if($student->status_of_graduation == 'approved')
                            <div class="btn btn-success btn-sm">
                                <i class="fas fa-check"></i>
                                Approved for Graduation
                            </div>
                        @else
                        <form method="GET" action="{{ route('students.edit', $student->student_id) }}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3">
                                <input type="hidden" name="approval" value="approved"/>
                                <input type="hidden" name="student_id" value="{{ $student->student_id }}"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-thumbs-up"></i> &nbsp{{ __('Approve Student for Graduation') }}</button>
                        </form>
                    @endif
                    </div>
                    <div class="col-md-2">
                    <a href="{{url()->previous()}}" class="float-right btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.update', $student->student_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="first_name" class="col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $student->first_name) }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="middle_name" class=" col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}" required autocomplete="middle_name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="col-md-4 mb-3">
                            <label for="last_name" class="col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $student->last_name) }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="user_name" class=" col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name', $student->user_name) }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="national_id" class="col-form-label text-md-end">{{ __('National ID') }}</label>

                            <div class="">
                                <input id="national_id" type="text" maxlength="8" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', $student->national_id) }}" required autocomplete="national_id" autofocus>

                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        



                        <div class="col-md-4 mb-3">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $student->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4  mb-3">
                            <label for="phone" class="col-form-label text-md-end">{{ __('Student Contact') }}</label>

                            <div class="">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ (int)old('phone', $student->phone) }}" required autocomplete="phone">
                                    
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4  mb-3">
                            <label for="department_id" class=" col-form-label text-md-end">{{ __('School/Department') }}</label>

                            <div class="">
                            @foreach($departments as $department)
                                @if($student->department_id == $department->department_id)
                                <input type="text" class="form-control @error('department_id') is-invalid @enderror" value="{{ $department->department_name }}" disabled>
                                <input type="hidden" name="department_id" value="{{ old('department_id', $student->department_id) }}">
                                @endif
                            @endforeach
                            </div>
                        </div> 

                        <div class="col-md-4  mb-3">
                            <label for="program_id" class="col-form-label text-md-end">{{ __('Program') }}</label>

                            <div class="">
                            @foreach($programs as $program)
                                @if($student->program_id == $program->program_id)
                                <input type="text" class="form-control @error('program_id') is-invalid @enderror" value="{{ $program->program_name }}" disabled>
                                <input type="hidden" name="program_id" value="{{ old('program_id', $student->program_id) }}">
                                @endif
                            @endforeach
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="guardianPhone" class="col-form-label text-md-end">{{ __('Guardian Contacts') }}</label>

                            <div class="">
                                <input type="text" class="form-control @error('guardianPhone') is-invalid @enderror" name="guardianPhone" value="{{ (int)old('guardianPhone', $student->guardianPhone) }}" required>
                                    
                                @error('guardianPhone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="admissionNumber" class="col-form-label text-md-end">{{ __('Admission Number') }}</label>

                            <div class="">
                                <input type="text" class="form-control @error('admissionNumber') is-invalid @enderror" name="admissionNumber" value="{{ old('admissionNumber', $student->admissionNumber) }}" required>
                                    
                                @error('admissionNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="col-md-4 mb-3">
                            <label for="yearOfAdmission" class="col-form-label text-md-end">{{ __('Year of Admission') }}</label>

                            <div class="">
                                <input type="text" class="form-control @error('yearOfAdmission') is-invalid @enderror" value="{{ old('yearOfAdmission', $student->yearOfAdmission) }}" disabled>
                                <input type="hidden" name="yearOfAdmission" value="{{ old('yearOfAdmission', $student->yearOfAdmission) }}" required>
                                    
                                @error('yearOfAdmission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        
                        
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil"></i> &nbsp
                                    {{ __('Update Student') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
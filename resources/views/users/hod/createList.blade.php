@extends('users.hod.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Graduating Student for {{ $department->department_name }}</h1>
</div>
<div class="container-fluid mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user-plus"></i>&nbsp
                    {{ __('Add New Student') }} &nbsp
                    <a href="{{url()->previous()}}" class="float-right btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Go Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.saveStudent') }}">
                        @csrf

                        <div class="row">
                        <div class="col-md-4 mb-3">

                            <label for="first_name" class="col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="middle_name" class="col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="last_name" class=" col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

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
                                <input id="national_id" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "8" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="phone" class="col-form-label text-md-end">{{ __('Student Contacts') }}</label>

                            <div class="">
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                                    
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="department_id" class="col-form-label text-md-end">{{ __('School/Department') }}</label>

                            <div class="">
                                <input type="text" class="form-control @error('department_id') is-invalid @enderror"  value="{{ $department->department_name }}" disabled>
                                <input type="hidden" name="department_id" value="{{ $department->department_id }}">
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="program_id" class="col-form-label text-md-end">{{ __('Program') }}</label>

                            <div class="">
                                <select class="form-control @error('program_id') is-invalid @enderror" name="program_id" required>
                                    <option>--SELECT--</option>
                                    @foreach($programs as $program)
                                    <option value="{{ $program->program_id }}">{{ $program->program_name }}</option>
                                    @endforeach
                                </select>
                                @error('program_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="guardianPhone" class="col-form-label text-md-end">{{ __('Guardian Contacts') }}</label>

                            <div class="">
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" class="form-control @error('guardianPhone') is-invalid @enderror" name="guardianPhone" value="{{ old('guardianPhone') }}" required>
                                    
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
                                <input type="text" class="form-control @error('admissionNumber') is-invalid @enderror" name="admissionNumber" value="{{ old('admissionNumber') }}" required>
                                    
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
                                <input type="date" class="form-control @error('yearOfAdmission') is-invalid @enderror" name="yearOfAdmission" value="{{ old('yearOfAdmission') }}" required>
                                    
                                @error('yearOfAdmission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        

                    <div class="row">
                        <div class="col-12 mb-0">
                            <div class="">
                                <input type="hidden" name="save" value="create">
                                <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> &nbsp
                                    {{ __('Save Student Data') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('users.hod.app')

@section('content')

<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <i class="fa fa-eye"></i>
                    {{ __('View student') }}
                    
                    <a href="{{url('viewAll')}}" class="float-right btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="first_name" class="col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="">
                                <input id="first_name" type="text" disabled="disabled" class="form-control @error('first_name') is-invalid @enderror"  value="{{ old('first_name', $student->first_name) }}" required autocomplete="first_name" autofocus>

                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="middle_name" class=" col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="">
                                <input id="middle_name" type="text" disabled="disabled" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name', $student->middle_name) }}" required autocomplete="middle_name" autofocus>

                                
                            </div>
                        </div>

                        
                        <div class="col-md-4 mb-3">
                            <label for="last_name" class="col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="">
                                <input id="last_name" type="text" disabled="disabled" class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name', $student->last_name) }}" required autocomplete="last_name" autofocus>

                                
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="user_name" class=" col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="">
                                <input id="user_name" type="text" disabled="disabled" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name', $student->user_name) }}" required autocomplete="user_name" autofocus>

                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="national_id" class="col-form-label text-md-end">{{ __('National ID') }}</label>

                            <div class="">
                                <input id="national_id" type="text" disabled="disabled" class="form-control @error('national_id') is-invalid @enderror"  value="{{ old('national_id', $student->national_id) }}" required autocomplete="national_id" autofocus>

                            </div>
                        </div>
                        



                        <div class="col-md-4 mb-3">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" disabled="disabled" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email', $student->email) }}" required autocomplete="email">

                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4  mb-3">
                            <label for="phone" class="col-form-label text-md-end">{{ __('Student Contact') }}</label>

                            <div class="">
                                <input id="phone" type="text" disabled="disabled" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $student->phone) }}" required autocomplete="phone">
                                    
                            </div>
                        </div>

                        <div class="col-md-4  mb-3">
                            <label for="department_id" class=" col-form-label text-md-end">{{ __('School/Department') }}</label>

                            <div class="">
                                <select disabled="disabled" class="form-control @error('department_id') is-invalid @enderror" name="department_id" value="{{ old('department_id', $student->department_id) }}" required>
                                
                                    @foreach($departments as $department)
                                        @if($student->department_id == $department->department_id)
                                            <option value="{{ old('department_id', $student->department_id) }}">
                                                {{ $department->department_name }}
                                            </option>
                                        @endif
                                    @endforeach

                                    @foreach($departments as $department)
                                        <option value="{{ $department->department_id }}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="col-md-4  mb-3">
                            <label for="program_id" class="col-form-label text-md-end">{{ __('Program') }}</label>

                            <div class="">
                                <select disabled="disabled" class="form-control @error('program_id') is-invalid @enderror" name="program_id" required>
                                
                                        @foreach($programs as $program)
                                            @if($student->program_id == $program->program_id)
                                            <option value="{{ old('program_id', $student->program_id) }}">
                                                {{ $program->program_name }}
                                            </option>
                                            @endif
                                        @endforeach
                                        @foreach($programs as $program)
                                            <option value="{{ $program->program_id }}">{{$program->program_name}}</option>
                                        @endforeach
                                </select>
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
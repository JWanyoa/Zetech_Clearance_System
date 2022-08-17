@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Program</h1>
</div>
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus-circle"></i>
                    {{ __('Add New Program') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('programs.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="program_name" class="col-md-4 col-form-label text-md-end">{{ __('Program Name') }}</label>

                            <div class="col-md-6">
                                <input id="program_name" type="text" class="form-control @error('program_name') is-invalid @enderror" name="program_name" value="{{ old('program_name') }}" required autocomplete="program_name" autofocus>

                                @error('program_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="program_code" class="col-md-4 col-form-label text-md-end">{{ __('Program Code') }}</label>

                            <div class="col-md-6">
                                <input id="program_code" type="text" class="form-control @error('program_code') is-invalid @enderror" name="program_code" value="{{ old('program_code') }}" required autocomplete="program_code" autofocus>

                                @error('program_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="program_type" class="col-md-4 col-form-label text-md-end">{{ __('Program Type') }}</label>

                            <div class="col-md-6">
                                <select id="program_type" class="form-control @error('program_type') is-invalid @enderror" name="program_type" value="{{ old('program_type') }}" required autocomplete="program_type" autofocus>
                                    <option>--SELECT--</option>
                                    <option value="artisan">Artisan</option>
                                    <option value="certificate">Certificate</option>
                                    <option value="diploma">Diploma</option>
                                    <option value="degree">Degree</option>
                                    <option value="masters">Masters</option>
                                    <option value="phd">PHD</option>
                                </select>
                                @error('program_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('School/Department') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
                                    <option>--SELECT--</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->department_id }}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Create Program') }}
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
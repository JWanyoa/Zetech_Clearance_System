@extends('layouts.main')

@section('content')
<div class="container mb-4">
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mb-2" department="alert">
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
                        <div class="col-md-8">
                            <i class="fa fa-pencil-square"></i>
                            {{ __('Update Department') }}
                        </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                    <a href="{{url()->previous()}}" class="float-right btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.update', $department->department_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="department_name" class="col-form-label text-md-end">{{ __('Department Name') }}</label>

                            <div class="">
                                <input id="department_name" type="text" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('department_name', $department->department_name) }}" required autocomplete="department_name" autofocus>

                                @error('department_name')
                                    <span class="invalid-feedback" department="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-0">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil"></i> &nbsp
                                    {{ __('Update Department') }}
                                </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
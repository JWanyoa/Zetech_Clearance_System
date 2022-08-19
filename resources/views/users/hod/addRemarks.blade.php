@extends('users.hod.app')

@section('content')
<!-- Dropdown - Messages -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Send Remarks</h1>
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

    <div class=" container">
        <div class="card mx-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-commenting"></i>
                        &nbsp Send Remarks to {{ $studentData->first_name .' '.$studentData->last_name}}
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <form method="GET" action="{{route('users.hod.addRemarks', ['department_id' => Auth::User()->department_id, 'student_id' => $studentData->student_id])}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search Remarks" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
            <form method="POST" action="{{route('users.hod.addRemarks', ['department_id' => Auth::User()->department_id, 'student_id' => $studentData->student_id])}}">
                        @csrf

                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                        <input type="hidden" name="remark_to" value="{{$studentData->student_id}}">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class=" col-form-label text-md-end">{{ __('Issue') }}</label>

                                <div class="">
                                    <input id="issue" type="text" class="form-control @error('issue') is-invalid @enderror" name="issue" value="{{ old('issue') }}" required autocomplete="issue" autofocus>

                                    @error('issue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="remark" class=" col-form-label text-md-end">{{ __('Remark') }}</label>

                                <div class="">
                                    <textarea id="remark" type="text" class="form-control @error('remark') is-invalid @enderror" rows="5" name="remark" value="{{ old('remark') }}" required autocomplete="remark" autofocus>
                                    </textarea>

                                    @error('remark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-3">
                                <button type="submit" name="save" class="btn btn-primary btn-sm">
                                    <i class="fas fa-paper-plane"></i> &nbsp
                                    {{ __('Send Remark') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
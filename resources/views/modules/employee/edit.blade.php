@extends('layouts.dashmix')
@section('breadcrumbs')
{{ Breadcrumbs::render('employee.edit', $employee) }}
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">Edit Employee</h2>
    <div class="row">
        <div class="col-xl-8">
            <div class="block block-rounded block-bordered">
                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-personal-information">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-employment-details">Employment Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-documents">Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-schedules">Schedules</a>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="tab-personal-information" role="tabpanel">
                        <h4 class="font-w400">Personal Information</h4>
                        <p>...</p>
                    </div>
                    <div class="tab-pane" id="tab-employment-details" role="tabpanel">
                        <h4 class="font-w400">Employment Details</h4>
                        <p>...</p>
                    </div>
                    <div class="tab-pane" id="tab-documents" role="tabpanel">
                        <h4 class="font-w400">Documents</h4>
                        <p>...</p>
                    </div>
                    <div class="tab-pane" id="tab-schedules" role="tabpanel">
                        <h4 class="font-w400">Schedules</h4>
                        <p>...</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="block block-rounded block-bordered">
                <div class="block-content block-content-full">
                    <div class="row push">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <img class="mx-auto d-block img-thumbnai img-fluid mb-4" src="{{ asset($employee->profile_picture) }}" alt="">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture">
                                  <label class="custom-file-label" for="profile_picture">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection

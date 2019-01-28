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
                        @include('employee::includes._form_personal_information')
                    </div>
                    <div class="tab-pane" id="tab-employment-details" role="tabpanel">
                        @include('employee::includes._form_employment_details')
                    </div>
                    <div class="tab-pane" id="tab-documents" role="tabpanel">
                        @include('employee::includes._form_documents')
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
                    <div class="row">
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
<link rel="stylesheet" href="{{ asset('themes/dashmix/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('themes/dashmix/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    $('#is_hired').change(function() {
        var val = $(this).val();
        if(val == 0) {
            $('#date_hired').attr('disabled', true);
            $('#date_hired').val('');
        } else {
            $('#date_hired').removeAttr('disabled');
        }
    });
    $('#is_regular').change(function() {
        var val = $(this).val();
        if(val == 0) {
            $('#date_regular').attr('disabled', true);
            $('#date_regular').val('');
        } else {
            $('#date_regular').removeAttr('disabled');
        }
    });
    $('#is_retirement').change(function() {
        var val = $(this).val();
        if(val == 0) {
            $('#date_retirement').attr('disabled', true);
            $('#date_retirement').val('');
        } else {
            $('#date_retirement').removeAttr('disabled');
        }
    });
    $('#employment-details-form').submit(function() {
        $("#date_hired").prop('disabled', false);
        $("#date_regular").prop('disabled', false);
        $("#date_retirement").prop('disabled', false);
    });
</script>
@endsection

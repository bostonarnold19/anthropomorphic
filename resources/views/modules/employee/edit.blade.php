@extends('layouts.dashmix')
@section('breadcrumbs')
{{ Breadcrumbs::render('employee.edit', $employee) }}
@endsection
@section('content')
<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Employee</h3>
        </div>
        <div class="block-content block-content-full">

        </div>
    </div>
</div>
@endsection
@section('styles')

@endsection
@section('scripts')

@endsection

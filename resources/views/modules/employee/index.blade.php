@extends('layouts.dashmix')
@section('breadcrumbs')
{{ Breadcrumbs::render('employee.index') }}
@endsection
@section('content')
<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Employee</h3>
            {{-- @ability('Admin', 'add_employee') --}}
            <button type="button" class="btn btn-outline-primary push" data-toggle="modal" data-target="#add-modal">Add New Employee</button>
            {{-- @endability --}}
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter" id="datatable">
                <thead>
                    <tr>
                        <th><i class="far fa-user"></i></th>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Salary</th>
                        <th>Branch</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@include('employee::includes._modal_add')
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('themes/dashmix/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('themes/dashmix/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('themes/dashmix/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/dashmix/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    jQuery("#datatable").dataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('employee.index') }}',
        columns : [
            {data: 'profile_picture', orderable: false, searchable: false},
            {data: 'name'},
            {data: 'birthdate'},
            {data: 'gender'},
            {data: 'salary'},
            {data: 'branch'},
            {data: 'department'},
            {data: 'designation'},
            {data: 'action', orderable: false, searchable: false}
        ],
        columnDefs: [
            {targets: 0, className: "text-center", width: "10%" },
        ],
        order: [
            [ 1, "desc" ]
        ],
        pageLength: 5,
        lengthMenu: [
            [5, 10, 20],
            [5, 10, 20]
        ],
        autoWidth: !1,
    });
</script>
@endsection

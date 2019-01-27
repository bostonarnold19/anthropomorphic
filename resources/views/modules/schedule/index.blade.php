@extends('layouts.dashmix')
@section('breadcrumbs')
{{ Breadcrumbs::render('schedule.index') }}
@endsection
@section('content')
<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Schedule</h3>
            {{-- @ability('Admin', 'add_schedule') --}}
            <button type="button" class="btn btn-outline-primary push" data-toggle="modal" data-target="#add-modal">Add New Schedule</button>
            {{-- @endability --}}
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter" id="datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Time-In</th>
                        <th>Time-Out</th>
                        <th>Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@include('schedule::includes._modal_edit')
@include('schedule::includes._modal_add')
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('css/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/dashmix/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('themes/dashmix/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('themes/dashmix/assets/js/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('js/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('themes/dashmix/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/dashmix/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    jQuery("#datatable").dataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('schedule.index') }}',
        columns : [
            {data: 'name'},
            {data: 'time_in'},
            {data: 'time_out'},
            {data: 'days'},
            {data: 'action', orderable: false, searchable: false}
        ],
        pageLength: 5,
        lengthMenu: [
            [5, 10, 20],
            [5, 10, 20]
        ],
        autoWidth: !1,
    });
    $(document).on('click', '[id=btn-edit]', function(){
        var id = $(this).data('id');
        var show_route = '{{ route('schedule.show', ':id') }}';
        var update_route = '{{ route('schedule.update', ':id') }}';
        show_route = show_route.replace(':id', id);
        update_route = update_route.replace(':id', id);
        if (id) {
            $.ajax({
                method: 'get',
                url: show_route,
                jsonp: false,
                success: function(result) {
                    $('[id=id]').val(result.id);
                    $('[id=key]').val(result.key);
                    $('[id=name]').val(result.value.name);
                    $('[data-target="#time_in"]').val(result.value.time_in);
                    $('[data-target="#time_out"]').val(result.value.time_out);
                    $('[id=days]').val(result.value.days);
                    $("[id=update-form]").attr("action", update_route);
                    $('[id=edit-modal]').modal();
                }
            });
        }
    });
    $(function () {
        $('.time-picker').datetimepicker({
            format: 'LT'
        });
    });
</script>
@endsection

<?php

namespace Modules\Employee\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Employee\Interfaces\EmployeeSettingRepositoryInterface;
use Modules\Employee\Services\EmployeeService;

class ScheduleController extends Controller
{
    protected $employee_setting_repository;
    protected $employee_service;

    public function __construct(
        EmployeeSettingRepositoryInterface $employee_setting_repository,
        EmployeeService $employee_service
    ) {
        $this->employee_setting_repository = $employee_setting_repository->model;
        $this->employee_service = $employee_service;
        // $this->middleware('permission:download-document', ['only' => ['show']]);
        // $this->middleware('permission:delete-document', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        // if ($request->ajax()) {
        //     $employee = $this->employee_setting_repository->where('employee_id', $id)
        //         ->where('key', 'schedule')
        //         ->latest('created_at')
        //         ->first();
        //     return response()->json($employee, 200);
        // } else {
        //     return;
        // }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        //
    }
}

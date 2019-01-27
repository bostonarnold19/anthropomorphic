<?php

namespace Modules\Employee\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\Employee\Interfaces\EmployeeRepositoryInterface;
use Modules\Employee\Interfaces\EmployeeSettingRepositoryInterface;
use Modules\Employee\Services\EmployeeService;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    protected $employee_repository;
    protected $employee_setting_repository;
    protected $employee_service;

    public function __construct(
        EmployeeRepositoryInterface $employee_repository,
        EmployeeSettingRepositoryInterface $employee_setting_repository,
        EmployeeService $employee_service
    ) {
        $this->employee_repository = $employee_repository->model;
        $this->employee_setting_repository = $employee_setting_repository->model;
        $this->employee_service = $employee_service;
        $this->middleware('permission:manage-employee', ['only' => ['index']]);
        $this->middleware('permission:add-employee', ['only' => ['store']]);
        $this->middleware('permission:edit-employee', ['only' => ['update']]);
        $this->middleware('permission:delete-employee', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = $this->employee_repository->select(['id', 'first_name', 'last_name', 'birthdate', 'gender', 'profile_picture'])->get();
            return Datatables::of($employees)
                ->editColumn('profile_picture', function ($employee) {
                    return view('employee::includes._profile_picture', compact('employee'))->render();
                })
                ->addColumn('name', function ($employee) {
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->addColumn('branch', function ($employee) {
                    return $this->employee_service->getBranch($employee->id);
                })
                ->addColumn('designation', function ($employee) {
                    return $this->employee_service->getDesignation($employee->id);
                })
                ->addColumn('department', function ($employee) {
                    return $this->employee_service->getDepartment($employee->id);
                })
                ->addColumn('action', function ($employee) {
                    return view('employee::includes._index_action', compact('employee'))->render();
                })
                ->rawColumns(['profile_picture', 'action'])
                ->toJson();
        } else {
            return view('employee::index');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['created_by'] = auth()->id();
            $employee = $this->employee_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Employee has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('employee.index')->with($status, $message);
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = $this->employee_repository->find($id);
            $user->roles = $user->roles()->pluck('id')->toArray();
            return response()->json($user, 200);
        } else {
            return;
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // try {
        //     DB::beginTransaction();
        //     $user = $this->employee_repository->findOrFail($id);
        //     $user->update($data);
        //     $user->roles()->sync($data['roles']);
        //     DB::commit();
        //     $status = 'success';
        //     $message = 'User has been updated.';
        // } catch (\Exception $e) {
        //     $status = 'error';
        //     $message = 'Internal Server Error. Try again later.';
        //     DB::rollBack();
        // }
        // return redirect()->route('user.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->employee_repository->destroy($id);
            $status = 'success';
            $message = 'Employee has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('employee.index')->with($status, $message);
    }
}

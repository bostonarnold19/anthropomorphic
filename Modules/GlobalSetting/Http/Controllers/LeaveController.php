<?php

namespace Modules\GlobalSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\GlobalSetting\Interfaces\GlobalSettingRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class LeaveController extends Controller
{
    protected $global_setting_repository;

    public function __construct(GlobalSettingRepositoryInterface $global_setting_repository)
    {
        $this->global_setting_repository = $global_setting_repository->model;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = $this->global_setting_repository->select(['id', 'value'])->where('key', 'department')->get();
            return Datatables::of($departments)
                ->addColumn('name', function ($department) {
                    return $department->value;
                })
                ->addColumn('action', function ($department) {
                    return view('department::includes._index_action', compact('department'))->render();
                })->toJson();
        } else {
            return view('department::index');
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
            $data['key'] = 'department';
            $this->global_setting_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Department has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('department.index')->with($status, $message);
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $department = $this->global_setting_repository->find($id);
            return response()->json($department, 200);
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
        $data = $request->all();
        try {
            DB::beginTransaction();
            $department = $this->global_setting_repository->findOrFail($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Department has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('department.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->global_setting_repository->destroy($id);
            $status = 'success';
            $message = 'Department has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('department.index')->with($status, $message);
    }
}

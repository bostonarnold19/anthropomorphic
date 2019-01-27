<?php

namespace Modules\GlobalSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\GlobalSetting\Interfaces\GlobalSettingRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class EmploymentTypeController extends Controller
{
    protected $global_setting_repository;

    public function __construct(GlobalSettingRepositoryInterface $global_setting_repository)
    {
        $this->global_setting_repository = $global_setting_repository->model;
        $this->middleware('permission:manage-employment-type', ['only' => ['index']]);
        $this->middleware('permission:add-employment-type', ['only' => ['store']]);
        $this->middleware('permission:edit-employment-type', ['only' => ['update']]);
        $this->middleware('permission:delete-employment-type', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employment_types = $this->global_setting_repository->select(['id', 'value'])->where('key', 'employment_type')->get();
            return Datatables::of($employment_types)
                ->addColumn('name', function ($employment_type) {
                    return json_decode($employment_type->value)->name;
                })
                ->addColumn('description', function ($employment_type) {
                    return json_decode($employment_type->value)->description;
                })
                ->addColumn('action', function ($employment_type) {
                    return view('employment_type::includes._index_action', compact('employment_type'))->render();
                })->toJson();
        } else {
            return view('employment_type::index');
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
            $data['key'] = 'employment_type';
            $data['value'] = json_encode($data['value']);
            $this->global_setting_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Employment Type has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('employment-type.index')->with($status, $message);
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $employment_type = $this->global_setting_repository->find($id);
            $employment_type->value = json_decode($employment_type->value);
            return response()->json($employment_type, 200);
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
            $data['value'] = json_encode($data['value']);
            $employment_type = $this->global_setting_repository->findOrFail($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Employment Type has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('employment-type.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->global_setting_repository->destroy($id);
            $status = 'success';
            $message = 'Employment Type has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('employment-type.index')->with($status, $message);
    }
}

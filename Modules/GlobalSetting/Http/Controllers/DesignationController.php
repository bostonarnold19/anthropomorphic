<?php

namespace Modules\GlobalSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\GlobalSetting\Interfaces\GlobalSettingRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class DesignationController extends Controller
{
    protected $global_setting_repository;

    public function __construct(GlobalSettingRepositoryInterface $global_setting_repository)
    {
        $this->global_setting_repository = $global_setting_repository->model;
        $this->middleware('permission:manage-designation', ['only' => ['index']]);
        $this->middleware('permission:add-designation', ['only' => ['store']]);
        $this->middleware('permission:edit-designation', ['only' => ['update']]);
        $this->middleware('permission:delete-designation', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $designations = $this->global_setting_repository->select(['id', 'value'])->where('key', 'designation')->get();
            return Datatables::of($designations)
                ->addColumn('name', function ($designation) {
                    return json_decode($designation->value)->name;
                })
                ->addColumn('description', function ($designation) {
                    return json_decode($designation->value)->description;
                })
                ->addColumn('action', function ($designation) {
                    return view('designation::includes._index_action', compact('designation'))->render();
                })->toJson();
        } else {
            return view('designation::index');
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
            $data['key'] = 'designation';
            $data['value'] = json_encode($data['value']);
            $this->global_setting_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Designation has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('designation.index')->with($status, $message);
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $designation = $this->global_setting_repository->find($id);
            $designation->value = json_decode($designation->value);
            return response()->json($designation, 200);
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
            $designation = $this->global_setting_repository->findOrFail($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Designation has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('designation.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->global_setting_repository->destroy($id);
            $status = 'success';
            $message = 'Designation has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('designation.index')->with($status, $message);
    }
}

<?php

namespace Modules\GlobalSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\GlobalSetting\Interfaces\GlobalSettingRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    protected $global_setting_repository;

    public function __construct(GlobalSettingRepositoryInterface $global_setting_repository)
    {
        $this->global_setting_repository = $global_setting_repository->model;
        $this->middleware('permission:manage-branch', ['only' => ['index']]);
        $this->middleware('permission:add-branch', ['only' => ['store']]);
        $this->middleware('permission:edit-branch', ['only' => ['update']]);
        $this->middleware('permission:delete-branch', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $branches = $this->global_setting_repository->select(['id', 'value'])->where('key', 'branch')->get();
            return Datatables::of($branches)
                ->addColumn('name', function ($branch) {
                    return json_decode($branch->value)->name;
                })
                ->addColumn('description', function ($branch) {
                    return json_decode($branch->value)->description;
                })
                ->addColumn('action', function ($branch) {
                    return view('branch::includes._index_action', compact('branch'))->render();
                })->toJson();
        } else {
            return view('branch::index');
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
            $data['key'] = 'branch';
            $data['value'] = json_encode($data['value']);
            $this->global_setting_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Branch has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('branch.index')->with($status, $message);
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $branch = $this->global_setting_repository->find($id);
            $branch->value = json_decode($branch->value);
            return response()->json($branch, 200);
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
            $branch = $this->global_setting_repository->findOrFail($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Branch has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('branch.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->global_setting_repository->destroy($id);
            $status = 'success';
            $message = 'Branch has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('branch.index')->with($status, $message);
    }
}

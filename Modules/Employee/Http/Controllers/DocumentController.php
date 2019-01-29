<?php

namespace Modules\Employee\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Employee\Interfaces\EmployeeSettingRepositoryInterface;
use Modules\Employee\Services\EmployeeService;

class DocumentController extends Controller
{
    protected $employee_setting_repository;
    protected $employee_service;

    public function __construct(
        EmployeeSettingRepositoryInterface $employee_setting_repository,
        EmployeeService $employee_service
    ) {
        $this->employee_setting_repository = $employee_setting_repository->model;
        $this->employee_service = $employee_service;
        $this->middleware('permission:download-document', ['only' => ['show']]);
        $this->middleware('permission:delete-document', ['only' => ['destroy']]);
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
        return Storage::download($request->link);
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
        try {
            DB::beginTransaction();
            $this->employee_setting_repository->destroy($id);
            Storage::delete($request->link);
            $status = 'success';
            $message = 'Document has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->back()->with($status, $message);
    }
}

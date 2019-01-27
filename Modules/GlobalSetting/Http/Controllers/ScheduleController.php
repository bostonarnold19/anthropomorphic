<?php

namespace Modules\GlobalSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\GlobalSetting\Interfaces\GlobalSettingRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    protected $global_setting_repository;

    public function __construct(GlobalSettingRepositoryInterface $global_setting_repository)
    {
        $this->global_setting_repository = $global_setting_repository->model;
        $this->middleware('permission:manage-schedule', ['only' => ['index']]);
        $this->middleware('permission:add-schedule', ['only' => ['store']]);
        $this->middleware('permission:edit-schedule', ['only' => ['update']]);
        $this->middleware('permission:delete-schedule', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $schedules = $this->global_setting_repository->select(['id', 'value'])->where('key', 'schedule')->get();
            return Datatables::of($schedules)
                ->addColumn('name', function ($schedule) {
                    return json_decode($schedule->value)->name;
                })
                ->addColumn('time_in', function ($schedule) {
                    return json_decode($schedule->value)->time_in;
                })
                ->addColumn('time_out', function ($schedule) {
                    return json_decode($schedule->value)->time_out;
                })
                ->addColumn('days', function ($schedule) {
                    return config('hr_settings.schedule_days.' . @json_decode($schedule->value)->days);
                })
                ->addColumn('action', function ($schedule) {
                    return view('schedule::includes._index_action', compact('schedule'))->render();
                })->toJson();
        } else {
            return view('schedule::index');
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
            $data['key'] = 'schedule';
            $data['value'] = json_encode($data['value']);
            $this->global_setting_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Schedule has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('schedule.index')->with($status, $message);
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $schedule = $this->global_setting_repository->find($id);
            $schedule->value = json_decode($schedule->value);
            return response()->json($schedule, 200);
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
            $schedule = $this->global_setting_repository->findOrFail($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Schedule has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('schedule.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->global_setting_repository->destroy($id);
            $status = 'success';
            $message = 'Schedule has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('schedule.index')->with($status, $message);
    }
}

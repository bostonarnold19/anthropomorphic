<?php

namespace Modules\Employee\Services;

use Modules\Employee\Interfaces\EmployeeSettingRepositoryInterface;
use Modules\GlobalSetting\Interfaces\GlobalSettingRepositoryInterface;

class EmployeeService
{
    protected $employee_setting_repository;
    protected $global_setting_repository;

    public function __construct(
        EmployeeSettingRepositoryInterface $employee_setting_repository,
        GlobalSettingRepositoryInterface $global_setting_repository
    ) {
        $this->employee_setting_repository = $employee_setting_repository->model;
        $this->global_setting_repository = $global_setting_repository->model;
    }

    public function getDesignation($id)
    {
        $employee_designation = $this->employee_setting_repository
            ->where('employee_id', $id)
            ->where('key', 'designation')
            ->latest('created_at')
            ->first();
        $designation = $this->global_setting_repository->find(@$employee_designation->id);
        return @json_decode($designation->value)->name;
    }

    public function getDepartment($id)
    {
        $employee_department = $this->employee_setting_repository
            ->where('employee_id', $id)
            ->where('key', 'department')
            ->latest('created_at')
            ->first();
        $department = $this->global_setting_repository->find(@$employee_department->id);
        return @json_decode($department->value)->name;
    }

    public function getBranch($id)
    {
        $employee_branch = $this->employee_setting_repository
            ->where('employee_id', $id)
            ->where('key', 'branch')
            ->latest('created_at')
            ->first();
        $branch = $this->global_setting_repository->find(@$employee_branch->id);
        return @json_decode($branch->value)->name;
    }
}

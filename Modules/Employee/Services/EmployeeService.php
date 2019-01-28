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

    public function saveAllEmployeeSettings($data, $employee_id)
    {
        $fields = [
            'salary' => @$data['salary'],
            'branch' => @$data['branch'],
            'department' => @$data['department'],
            'designation' => @$data['designation'],
            'document' => @$data['document'],
        ];
        foreach ($fields as $key => $value) {
            $this->saveEmployeeSettings($key, $value, $employee_id);
        }
    }

    public function saveEmployeeSettings($key, $value, $employee_id)
    {
        if (isset($value) && !empty($value)) {
            $data = [
                'employee_id' => $employee_id,
                'key' => $key,
                'value' => json_encode($value),
            ];
            return $employee_setting = $this->employee_setting_repository->firstOrCreate($data);
        }
    }
}

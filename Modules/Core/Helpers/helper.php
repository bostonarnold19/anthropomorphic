<?php

use Modules\GlobalSetting\Entities\GlobalSetting;

function getAllBranch()
{
    $data = [];
    $branches = GlobalSetting::where('key', 'branch')->get();
    foreach ($branches as $branch) {
        $data[$branch->id] = json_decode($branch->value)->name;
    }
    return $data;
}

function getAllDepartment()
{
    $data = [];
    $departments = GlobalSetting::where('key', 'department')->get();
    foreach ($departments as $department) {
        $data[$department->id] = json_decode($department->value)->name;
    }
    return $data;
}

function getAllDesignation()
{
    $data = [];
    $designations = GlobalSetting::where('key', 'designation')->get();
    foreach ($designations as $designation) {
        $data[$designation->id] = json_decode($designation->value)->name;
    }
    return $data;
}

<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\GlobalSetting\Http\Controllers'], function () {

    Route::resource('branch', 'BranchController');
    Route::resource('department', 'DepartmentController');
    Route::resource('designation', 'DesignationController');
    Route::resource('leave-type', 'LeaveTypeController');
    Route::resource('schedule', 'ScheduleController');

});

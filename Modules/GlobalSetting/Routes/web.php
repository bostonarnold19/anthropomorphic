<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\GlobalSetting\Http\Controllers'], function () {

    Route::resource('branch', 'BranchController');
    Route::resource('department', 'DepartmentController');
    Route::resource('section', 'SectionController');
    Route::resource('designation', 'DesignationController');
    Route::resource('employment-type', 'EmploymentTypeController');
    Route::resource('holiday-type', 'HolidayTypeController');
    Route::resource('leave', 'LeaveController');
    Route::resource('schedule', 'ScheduleController');

});

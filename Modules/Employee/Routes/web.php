<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Employee\Http\Controllers'], function () {

    Route::resource('employee', 'EmployeeController');

});

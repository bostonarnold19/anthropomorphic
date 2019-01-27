<?php

Breadcrumbs::for ('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

//------------ Branch ------------//
Breadcrumbs::for ('branch.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Branch', route('branch.index'));
});

//------------ Department ------------//
Breadcrumbs::for ('department.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Department', route('department.index'));
});

//------------ Designation ------------//
Breadcrumbs::for ('designation.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Designation', route('designation.index'));
});

//------------ Employee Type ------------//
Breadcrumbs::for ('employment-type.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Employment Type', route('employment-type.index'));
});

//------------ Holdiday Type ------------//
Breadcrumbs::for ('holiday-type.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Holiday Type', route('holiday-type.index'));
});

//------------ Schedule ------------//
Breadcrumbs::for ('schedule.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Schedule', route('schedule.index'));
});

//------------ User ------------//
Breadcrumbs::for ('user.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
});

//------------ Role ------------//
Breadcrumbs::for ('role.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Role', route('role.index'));
});

//------------ Permission ------------//
Breadcrumbs::for ('permission.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Permission', route('permission.index'));
});

//------------ Employee ------------//
Breadcrumbs::for ('employee.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Employee', route('employee.index'));
});

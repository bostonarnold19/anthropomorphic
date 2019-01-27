<?php

namespace Modules\Employee\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\EmployeeSetting;
use Modules\Employee\Repositories\EmployeeRepository;
use Modules\Employee\Repositories\EmployeeSettingRepository;

class EmployeeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerViews();
    }

    public function register()
    {
        $this->providers();
        $this->eventProviders();
    }

    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
    }

    public function registerViews()
    {
        $this->loadViewsFrom(resource_path('views/modules/employee'), 'employee');
    }

    public function providers()
    {
        $this->app->bind('Modules\Employee\Interfaces\EmployeeSettingRepositoryInterface', function ($app) {
            return new EmployeeSettingRepository(new EmployeeSetting());
        });

        $this->app->bind('Modules\Employee\Interfaces\EmployeeRepositoryInterface', function ($app) {
            return new EmployeeRepository(new Employee());
        });
    }

    public function eventProviders()
    {
        $this->app->register("Modules\Employee\Providers\EventProviders\EmployeeEventServiceProvider");
    }

    public function registerConfig()
    {
        //
    }
}

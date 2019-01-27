<?php

namespace Modules\Employee\Providers\EventProviders;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EmployeeEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Modules\Employee\Events\SomeEvent' => [
            'Modules\Employee\Listeners\EventListener',
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
